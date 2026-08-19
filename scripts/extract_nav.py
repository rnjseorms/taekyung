import re

html = open("site/index.html", encoding="utf-8", errors="ignore").read()
for m in re.finditer(r'<a[^>]*href="([^"]+bo_table=[^"]+)"[^>]*>(.*?)</a>', html, re.S):
    href, text = m.groups()
    text = re.sub(r"<[^>]+>", "", text).strip()
    if text:
        print(href, "=>", text)
