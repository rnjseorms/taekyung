import glob
import re

files = glob.glob("public/*.html")

# 1. Rename the old combined product label everywhere it appears (nav, breadcrumb, title, h1 refs)
rename = [
    (r"제품·안전장치", "부상토제거장치"),
]

# 2. Insert a 파일인양장치 link before every product.html nav/footer link (desktop nav, mobile nav, footer list)
nav_insert = re.compile(
    r'(<a href="about\.html"[^>]*>회사소개</a>\n)(\s*)(<a href="product\.html")'
)
footer_insert = re.compile(
    r'(<li><a href="about\.html">회사소개</a></li>\n)(\s*)(<li><a href="product\.html")'
)

for path in files:
    with open(path, encoding="utf-8") as f:
        text = f.read()
    original = text
    for pattern, repl in rename:
        text = text.replace(pattern, repl)
    text = nav_insert.sub(
        lambda m: m.group(1) + m.group(2) + '<a href="pile-lifter.html">파일인양장치</a>\n' + m.group(2) + m.group(3),
        text,
    )
    text = footer_insert.sub(
        lambda m: m.group(1) + m.group(2) + '<li><a href="pile-lifter.html">파일인양장치</a></li>\n' + m.group(2) + m.group(3),
        text,
    )
    if text != original:
        with open(path, "w", encoding="utf-8") as f:
            f.write(text)
        print("updated", path)
