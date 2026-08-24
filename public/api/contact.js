const { Resend } = require("resend");

function escapeHtml(str) {
  return String(str)
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#39;");
}

module.exports = async (req, res) => {
  if (req.method !== "POST") {
    res.status(405).json({ error: "Method not allowed" });
    return;
  }

  const { name, phone, email, subject, message } = req.body || {};

  if (!name || !phone || !message) {
    res.status(400).json({ error: "이름, 연락처, 문의내용은 필수 입력 항목입니다." });
    return;
  }

  const resend = new Resend(process.env.RESEND_API_KEY);

  try {
    const html =
      "<p><strong>이름:</strong> " + escapeHtml(name) + "</p>" +
      "<p><strong>연락처:</strong> " + escapeHtml(phone) + "</p>" +
      "<p><strong>이메일:</strong> " + escapeHtml(email || "-") + "</p>" +
      "<p><strong>문의내용:</strong><br>" + escapeHtml(message).replace(/\n/g, "<br>") + "</p>";

    await resend.emails.send({
      from: "태경산업 홈페이지 <onboarding@resend.dev>",
      to: "tk5448@naver.com",
      replyTo: email || undefined,
      subject: "[홈페이지 문의] " + (subject || name),
      html: html,
    });

    res.status(200).json({ ok: true });
  } catch (err) {
    console.error("contact form send failed:", err);
    res.status(500).json({ error: "이메일 전송에 실패했습니다. 잠시 후 다시 시도해주세요." });
  }
};
