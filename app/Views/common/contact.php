<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact • Financement Faciele</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />

  <style>
    /* page-specific helpers — unchanged */
    .contact-hero {
      background: #fff;
      padding: 56px 0 26px;
    }

    .contact-inner {
      display: flex;
      gap: 32px;
      align-items: flex-start;
      justify-content: center;
      flex-wrap: wrap;
    }

    .contact-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, .04);
      padding: 26px;
      max-width: 720px;
      width: 100%;
      border: 1px solid #e6eef9;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 28px;
    }

    form.contact-form label {
      display: block;
      margin: 10px 0 6px;
      font-weight: 600;
    }

    form.contact-form input,
    textarea,
    select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #e6eef9;
    }

    textarea {
      min-height: 140px;
    }

    .contact-info {
      background: linear-gradient(180deg, #fafaff, #f5f9ff);
      padding: 18px;
      border-radius: 10px;
      border: 1px solid #eaeffc;
    }

    .map-embed {
      width: 100%;
      height: 200px;
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #e6eef9;
    }

    .map-embed img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .submit-row {
      display: flex;
      gap: 12px;
      margin-top: 14px;
      flex-wrap: wrap;
    }

    .success-msg {
      display: none;
      background: #ecfdf3;
      border: 1px solid #bbf7d0;
      padding: 10px 12px;
      border-radius: 8px;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <!-- NAV -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <!-- ROUTE FIXED -->
          <a href="/dashboard">
            <img src="/finance-marketing/public/assets/images/Application Logo.png" alt="Application Logo" />
          </a>
        </div>
      </div>

      <div class="nav-actions">
        <a class="btn" href="/auth/signin">Login</a>
        <a class="btn primary" href="/auth/signup">Get Started</a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="contact-hero">
    <div class="container">

      <div style="text-align:center; max-width:820px; margin:auto">
        <h1 class="hero-top-title">Contact Us</h1>
        <p class="lead">
          Have questions, feedback or need support? Our team at Nouverely is here to help.
        </p>
      </div>

      <div class="contact-inner" style="margin-top:20px">
        <div class="contact-card">

          <div class="contact-grid">

            <!-- FORM -->
            <div>
              <h3>Send us a message</h3>

              <form class="contact-form" id="contactForm" novalidate>
                <label>Full name</label>
                <input name="name" required>

                <label>Email</label>
                <input name="email" type="email" required>

                <label>Phone</label>
                <input name="phone">

                <label>Subject</label>
                <input name="subject" required>

                <label>Message</label>
                <textarea name="message" required></textarea>

                <label>Preferred contact</label>
                <select name="contact-method">
                  <option>Email</option>
                  <option>Phone</option>
                </select>

                <div class="submit-row">
                  <button class="btn primary">Send Message</button>
                  <button type="reset" class="btn">Reset</button>
                  <div id="success" class="success-msg">
                    Thanks — we received your request.
                  </div>
                </div>
              </form>
            </div>

            <!-- INFO -->
            <aside class="contact-info">
              <h4>Contact details</h4>
              <p><strong>Company:</strong> Nouverely</p>
              <p><strong>Email:</strong> <a href="mailto:support@nouverely.io">support@nouverely.io</a></p>
              <p><strong>Phone:</strong> <a href="tel:+911234567890">+91 1234 567 890</a></p>

              <div class="map-embed">
                <img src="/finance-marketing/public/assets/images/map-placeholder.png" alt="Office map">
              </div>
            </aside>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section style="padding:18px 0">
    <div class="container" style="text-align:center">
      <a class="btn primary" href="/auth/signin">Sign In</a>
      <a class="btn" href="/auth/signup">Create Account</a>
    </div>
  </section>

  <!-- FOOTER -->
  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    fetch('/finance-marketing/public/model/faq.php')
      .then(res => res.json())
      .then(res => {
        const s = res.sections;

        heroTitle.textContent = s.hero_title.title;
        heroText.textContent = s.hero_text.content;

        loginBtn.textContent = s.login_btn.content;
        signupBtn.textContent = s.signup_btn.content;

        quickTitle.textContent = s.quick_links_title.title;
        helpTitle.textContent = s.need_help_title.title;
        helpBtn.textContent = s.need_help_title.content;
        helpBtn.href = "/contact";

        ctaPrimary.textContent = s.cta_primary.content;
        ctaPrimary.href = "/contact";

        ctaSecondary.textContent = s.cta_secondary.content;
        ctaSecondary.href = "/auth/signin";

        /* FAQs */
        faqAccordion.innerHTML = res.faqs.map((f, i) => `
      <article class="accordion-item">
        <input id="faq${i}" class="accordion-input" type="checkbox">
        <label class="accordion-header" for="faq${i}">
          <h3>${f.question}</h3>
        </label>
        <div class="accordion-panel">
          <p>${f.answer}</p>
        </div>
      </article>
    `).join('');

        /* Sidebar links */
        quickLinks.innerHTML = res.links.map(l => `
      <a class="btn ${l.is_primary ? 'primary' : ''}" href="${l.url}">
        ${l.label}
      </a>
    `).join('');
      });
  </script>
</body>

</html>