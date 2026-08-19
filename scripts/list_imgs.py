import re
import sys

html = open("site/index.html", encoding="utf-8", errors="ignore").read()
imgs = re.findall(r'<img[^>]+src="([^"]+)"[^>]*>', html)
with open(sys.argv[1], "w", encoding="utf-8") as f:
    for i in imgs:
        f.write(i + "\n")
