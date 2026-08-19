from playwright.sync_api import sync_playwright

pages = ["index", "about", "pile-lifter", "product", "gallery", "certifications", "location", "contact"]
base = "http://localhost:8299"

with sync_playwright() as p:
    browser = p.chromium.launch()
    ctx = browser.new_context(viewport={"width": 375, "height": 812})
    page = ctx.new_page()
    for name in pages:
        page.goto(f"{base}/{name}.html", wait_until="networkidle")
        page.screenshot(path=f"scripts/shots/mobile-{name}.png", full_page=True)
    ctx.close()
    browser.close()
print("done")
