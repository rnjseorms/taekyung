from playwright.sync_api import sync_playwright
import os

out_dir = "scripts/shots"
os.makedirs(out_dir, exist_ok=True)

pages = ["index", "about", "pile-lifter", "product", "gallery", "certifications", "location", "contact"]
base = "http://localhost:8123"

with sync_playwright() as p:
    browser = p.chromium.launch()

    # Desktop
    ctx = browser.new_context(viewport={"width": 1440, "height": 900})
    page = ctx.new_page()
    errors = []
    page.on("console", lambda msg: errors.append(msg.text) if msg.type == "error" else None)
    page.on("pageerror", lambda exc: errors.append(str(exc)))

    for name in pages:
        page.goto(f"{base}/{name}.html", wait_until="networkidle")
        page.screenshot(path=f"{out_dir}/{name}-desktop.png", full_page=True)
    ctx.close()

    # Mobile
    ctx_m = browser.new_context(viewport={"width": 390, "height": 844})
    page_m = ctx_m.new_page()
    for name in ["index", "product", "gallery"]:
        page_m.goto(f"{base}/{name}.html", wait_until="networkidle")
        page_m.screenshot(path=f"{out_dir}/{name}-mobile.png", full_page=True)
    ctx_m.close()

    browser.close()

print("Console/page errors collected:", errors if errors else "none")
print("Done.")
