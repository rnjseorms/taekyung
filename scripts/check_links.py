import os
import re
import glob

root = "public"
pages = glob.glob(os.path.join(root, "*.html"))

missing = []
for page in pages:
    html = open(page, encoding="utf-8").read()
    srcs = re.findall(r'(?:src|href)="([^"]+)"', html)
    for s in srcs:
        if s.startswith(("http://", "https://", "mailto:", "tel:", "data:", "#")):
            continue
        path = os.path.normpath(os.path.join(root, s))
        if not os.path.exists(path):
            missing.append((page, s))

if missing:
    for p, s in missing:
        print(f"MISSING: {p} -> {s}")
else:
    print("All local asset references resolved OK across", len(pages), "pages.")
