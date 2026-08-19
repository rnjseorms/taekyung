import os
import re
import time
import urllib.parse as up

import requests
from bs4 import BeautifulSoup

BASE = "http://www.tk114.co.kr"
OUT = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "site")

session = requests.Session()
session.verify = False
session.headers.update({
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) TaekyungSiteMirror/1.0"
})

import urllib3
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

visited = set()
queue = []
asset_cache = {}

SKIP_QS_KEYS = {"sca", "sfl", "stx"}  # search-ish params we don't want to explode into infinite variants

SEED_BOARDS = ["a_01", "a_02", "b_01", "c_01", "cu01", "cu02", "d_01", "e_01"]


def norm_url(url, base=BASE):
    url = url.strip()
    if not url or url.startswith("javascript:") or url.startswith("mailto:") or url.startswith("#"):
        return None
    absu = up.urljoin(base, url)
    parsed = up.urlsplit(absu)
    if parsed.netloc and parsed.netloc != up.urlsplit(BASE).netloc:
        return None  # external, skip
    # strip fragment
    parsed = parsed._replace(fragment="")
    return up.urlunsplit(parsed)


def local_path_for(url):
    parsed = up.urlsplit(url)
    path = parsed.path
    if path == "" or path == "/":
        path = "/index.html"
    if path.endswith("/"):
        path = path + "index.html"

    query = parsed.query
    if query:
        qs = up.parse_qsl(query, keep_blank_values=True)
        qs.sort()
        safe_q = "_".join(f"{k}-{v}" for k, v in qs if k not in ("PHPSESSID",))
        safe_q = re.sub(r"[^A-Za-z0-9_\-.]", "_", safe_q)
        root, ext = os.path.splitext(path)
        if not ext:
            ext = ".html"
            path = root
        path = f"{path}__{safe_q}{ext}" if safe_q else f"{path}{ext}"
    else:
        root, ext = os.path.splitext(path)
        if not ext:
            path = path + ".html" if not path.endswith(".html") else path

    path = path.lstrip("/")
    return os.path.join(OUT, path)


def rel_link(from_url, to_url):
    from_local = local_path_for(from_url)
    to_local = local_path_for(to_url)
    from_dir = os.path.dirname(from_local)
    rel = os.path.relpath(to_local, from_dir)
    return rel.replace("\\", "/")


def fetch(url):
    if url in asset_cache:
        return asset_cache[url]
    try:
        resp = session.get(url, timeout=20)
        asset_cache[url] = resp
        return resp
    except Exception as e:
        print("FAIL", url, e)
        return None


def is_html(resp, url):
    ctype = resp.headers.get("Content-Type", "")
    return "html" in ctype or url.endswith(".html") or url.endswith(".php") or "board.php" in url


def save_bytes(path, content):
    os.makedirs(os.path.dirname(path), exist_ok=True)
    with open(path, "wb") as f:
        f.write(content)


def process_html(url, resp, depth):
    soup = BeautifulSoup(resp.content, "html.parser")

    tag_attrs = [
        ("a", "href"), ("link", "href"), ("script", "src"), ("img", "src"),
        ("form", "action"), ("iframe", "src"), ("source", "src"),
    ]
    discovered = []

    for tag_name, attr in tag_attrs:
        for tag in soup.find_all(tag_name):
            val = tag.get(attr)
            if not val:
                continue
            target = norm_url(val, url)
            if not target:
                continue
            discovered.append(target)
            tag[attr] = rel_link(url, target)

    # inline style url(...) refs in <style> tags and style attrs (basic)
    for tag in soup.find_all(style=True):
        def repl(m):
            v = m.group(1).strip("'\" ")
            t = norm_url(v, url)
            if t:
                discovered.append(t)
                return f"url('{rel_link(url, t)}')"
            return m.group(0)
        tag["style"] = re.sub(r"url\(([^)]+)\)", repl, tag["style"])

    path = local_path_for(url)
    save_bytes(path, soup.encode("utf-8"))
    return discovered


def process_css(url, resp):
    text = resp.content.decode("utf-8", errors="ignore")
    discovered = []

    def repl(m):
        v = m.group(1).strip("'\" ")
        if v.startswith("data:"):
            return m.group(0)
        t = norm_url(v, url)
        if t:
            discovered.append(t)
            return f"url('{rel_link(url, t)}')"
        return m.group(0)

    text = re.sub(r"url\(([^)]+)\)", repl, text)
    path = local_path_for(url)
    save_bytes(path, text.encode("utf-8"))
    return discovered


def crawl():
    start_urls = [f"{BASE}/index.html"]
    for b in SEED_BOARDS:
        start_urls.append(f"{BASE}/bbs/board.php?bo_table={b}")

    for u in start_urls:
        nu = norm_url(u)
        if nu and nu not in visited:
            queue.append((nu, 0))
            visited.add(nu)

    page_count = 0
    max_pages = 600

    while queue and page_count < max_pages:
        url, depth = queue.pop(0)
        page_count += 1
        print(f"[{page_count}] depth={depth} {url}")
        resp = fetch(url)
        if resp is None or resp.status_code >= 400:
            print("  -> skip (status)", None if resp is None else resp.status_code)
            continue

        if is_html(resp, url):
            try:
                discovered = process_html(url, resp, depth)
            except Exception as e:
                print("  parse error", e)
                discovered = []
        else:
            ctype = resp.headers.get("Content-Type", "")
            if "css" in ctype or url.endswith(".css"):
                discovered = process_css(url, resp)
            else:
                path = local_path_for(url)
                save_bytes(path, resp.content)
                discovered = []

        for d in discovered:
            if d in visited:
                continue
            # avoid write/login/admin dynamic action pages that mutate state or need auth
            lower = d.lower()
            if any(x in lower for x in ["write.php", "login.php", "logout.php", "admin/", "member_confirm",
                                          "password.php", "register.php", "qa_", "?", "&"] if x not in ("?", "&")):
                pass
            if any(x in lower for x in ["write.php", "login.php", "logout.php", "/admin/", "register.php"]):
                continue
            visited.add(d)
            queue.append((d, depth + 1))

        time.sleep(0.05)

    print(f"Done. Pages processed: {page_count}, total discovered urls: {len(visited)}")


if __name__ == "__main__":
    crawl()
