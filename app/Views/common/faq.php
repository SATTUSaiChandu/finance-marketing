<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FAQ • Financement Faciele</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/faq.css">
</head>

<body>

  <header class="nav">
    <div class="container nav-inner">
      <a href="/dashboard" class="logo">
        <img src="/finance-marketing/public/assets/images/Application Logo.png" alt="Logo">
      </a>

      <div class="nav-actions">
        <a class="btn" href="/finance-marketing/public/auth/signin" id="loginBtn"></a>
        <a class="btn primary" href="/finance-marketing/public/auth/signup" id="signupBtn"></a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero faq-hero">
    <div class="container hero-inner">
      <div>
        <h1 class="hero-top-title" id="heroTitle"></h1>
        <p class="lead" id="heroText"></p>
      </div>

      <div class="hero-mockup">
        <img id="heroImage">
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <main class="faq-container">
    <div class="faq-grid">

      <!-- ACCORDION -->
      <div class="accordion" id="faqAccordion"></div>

      <!-- SIDEBAR -->
      <aside>
        <div class="quick-box">
          <h4 id="quickTitle"></h4>
          <div id="quickLinks"></div>
        </div>

        <div class="quick-box" style="margin-top:18px">
          <h4 id="helpTitle"></h4>
          <a class="btn primary" id="helpBtn"></a>
        </div>
      </aside>

    </div>
  </main>

  <!-- CTA -->
  <section class="cta">
    <a class="btn primary" id="ctaPrimary"></a>
    <a class="btn" id="ctaSecondary"></a>
  </section>

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