import sys
import re
from bs4 import BeautifulSoup

path = sys.argv[1]
html = open(path, encoding="utf-8", errors="ignore").read()
soup = BeautifulSoup(html, "html.parser")
for tag in soup(["script", "style"]):
    tag.decompose()
text = soup.get_text("\n")
lines = [l.strip() for l in text.splitlines()]
lines = [l for l in lines if l]
out = sys.argv[2] if len(sys.argv) > 2 else None
result = "\n".join(lines)
if out:
    with open(out, "w", encoding="utf-8") as f:
        f.write(result)
else:
    sys.stdout.buffer.write(result.encode("utf-8"))

