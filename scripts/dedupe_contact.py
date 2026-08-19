import glob
import re

files = glob.glob("public/*.html")

footer_pattern = re.compile(
    r"TEL 1599-7457<br>\s*\n\s*FAX 031-227-4175<br>\s*\n\s*대표전화 1599-7457<br>"
)
footer_repl = "대표전화 1599-7457<br>\n          FAX 031-227-4175<br>\n          담당자 권대근 이사<br>"

inline_pattern = re.compile(
    r"TEL 1599-7457<br>FAX 031-227-4175<br>대표전화 1599-7457"
)
inline_repl = "대표전화 1599-7457<br>FAX 031-227-4175<br>담당자 권대근 이사"

for path in files:
    with open(path, encoding="utf-8") as f:
        text = f.read()
    original = text
    text = footer_pattern.sub(footer_repl, text)
    text = inline_pattern.sub(inline_repl, text)
    if text != original:
        with open(path, "w", encoding="utf-8") as f:
            f.write(text)
        print("updated", path)
