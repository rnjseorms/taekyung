import glob
import re

files = glob.glob("public/*.html") + ["public/assets/js/main.js"]

replacements = [
    (r"tel:1661-5350", "tel:1599-7457"),
    (r"1661-5350", "1599-7457"),
    (r"tel:031-297-1249", "tel:1599-7457"),
    (r"031-297-1249", "1599-7457"),
    (r"tk5448@naver\.com", "rnjseorms26@naver.com"),
    (r"031-227-4715", "031-227-4175"),
    (r"경기도 화성시 봉담읍 왕림리 532", "경기도 화성시 봉담읍 생수길 26"),
    (r"대표번호", "대표전화"),
]

# Only the topbar occurrence of "대표 이동국" (immediately followed by the phone link)
# becomes the contact-person line; the footer-bottom occurrence stays as the CEO credit.
topbar_pattern = re.compile(r"(<span>)대표 이동국(</span>\s*\n\s*<a href=\"tel:)")

for path in files:
    with open(path, encoding="utf-8") as f:
        text = f.read()
    original = text
    for pattern, repl in replacements:
        text = re.sub(pattern, repl, text)
    text = topbar_pattern.sub(r"\g<1>담당자 권대근 이사\g<2>", text)
    if text != original:
        with open(path, "w", encoding="utf-8") as f:
            f.write(text)
        print("updated", path)
