<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FAQ • Financement Faciele</title>

  <style>
    /* Page-specific CSS (static-only accordion) */
    .faq-hero {
      padding: 56px 0 36px;
      background: linear-gradient(rgba(255, 255, 255, 0.6),
          rgba(255, 255, 255, 0.6));
    }

    .faq-hero .hero-inner {
      align-items: center;
      gap: 20px;
    }

    .faq-hero .hero-mockup img {
      max-width: 360px;
      border-radius: 12px;
    }

    .faq-container {
      max-width: 980px;
      margin: 18px auto 40px;
      padding: 0 16px;
    }

    .faq-grid {
      display: grid;
      grid-template-columns: 1fr 320px;
      gap: 24px;
      align-items: start;
    }

    /* CSS-only accordion */
    .accordion {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid #e6eef9;
      box-shadow: 0 8px 30px rgba(15, 23, 42, 0.04);
      background: #fff;
    }

    .accordion-item {
      display: block;
    }

    .accordion-input {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .accordion-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 18px;
      cursor: pointer;
      background: linear-gradient(180deg, #fff, #fbfcff);
    }

    .accordion-header h3 {
      margin: 0;
      font-size: 16px;
      font-weight: 700;
      color: #0f172a;
    }

    .accordion-header .meta {
      color: #667085;
      font-size: 13px;
    }

    /* panel collapsed by default */
    .accordion-panel {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.32s cubic-bezier(0.2, 0.9, 0.3, 1),
        padding 0.24s;
      padding: 0 18px;
    }

    /* when the associated checkbox is checked, expand the panel */
    .accordion-input:checked+.accordion-header+.accordion-panel {
      max-height: 1000px;
      /* large enough for content */
      padding: 14px 18px 20px;
    }

    .accordion-panel p {
      margin: 0;
      color: #475569;
      line-height: 1.7;
    }

    /* small helpers */
    .muted {
      color: #667085;
    }

    .quick-box {
      background: #fff;
      border-radius: 12px;
      padding: 16px;
      border: 1px solid #e6eef9;
      box-shadow: 0 8px 20px rgba(15, 23, 42, 0.03);
    }

    @media (max-width: 880px) {
      .faq-grid {
        grid-template-columns: 1fr;
      }

      .faq-hero .hero-mockup img {
        max-width: 260px;
        display: none;
      }
    }
  </style>
</head>

<body>
  <!-- NAV -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <a href="../Dashboard/index.php"><img src="/finance-marketing/public/assets/images/Application Logo.png" alt="App Logo" /></a>
        </div>
      </div>

      <div class="nav-actions">
        <a class="btn" href="../Auth/signin.php">Login</a>
        <a class="btn primary" href="../Auth/signup.php">Get Started</a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero faq-hero">
    <div class="container hero-inner">
      <div class="hero-content">
        <h1 class="hero-top-title">Frequently Asked Questions</h1>
        <p class="lead">
          Browse commonly asked questions about accounts, KYC, security,
          financing and how the platform connects borrowers with financiers.
        </p>

        <p class="muted" style="margin-top: 12px">
          Tip: Use Tab to navigate headings and press Space / Enter to toggle
          each item.
        </p>
      </div>

      <div class="hero-mockup">
        <img src="/finance-marketing/public/assets/images/pictures/ImgFaqs.png" alt="App mockup" />
      </div>
    </div>
  </section>

  <!-- FAQ LIST + SIDEBAR -->
  <main class="faq-container">
    <div class="faq-grid">
      <!-- LEFT: Accordion (static) -->
      <div>
        <div
          class="accordion"
          role="list"
          aria-label="Frequently asked questions">
          <!-- Item 1 -->
          <article class="accordion-item">
            <input id="faq1" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq1"
              tabindex="0"
              role="button"
              aria-controls="panel1"
              aria-expanded="false">
              <h3>How do I create an account?</h3>
              <div class="meta muted">Account</div>
            </label>
            <div
              id="panel1"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                Creating an account is simple: click
                <strong>Get Started</strong> in the top-right, complete the
                signup form and verify your email. Financiers must also
                complete KYC verification to access financing tools.
              </p>
            </div>
          </article>

          <!-- Item 2 -->
          <article class="accordion-item">
            <input id="faq2" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq2"
              tabindex="0"
              role="button"
              aria-controls="panel2"
              aria-expanded="false">
              <h3>What is KYC and why is it required?</h3>
              <div class="meta muted">Security & Trust</div>
            </label>
            <div
              id="panel2"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                KYC (Know Your Customer) verifies user identity to reduce
                fraud and increase trust. We require ID documents and basic
                verification for both borrowers and financiers to participate
                in funding and transactions.
              </p>
            </div>
          </article>

          <!-- Item 3 -->
          <article class="accordion-item">
            <input id="faq3" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq3"
              tabindex="0"
              role="button"
              aria-controls="panel3"
              aria-expanded="false">
              <h3>Are there any fees for using the platform?</h3>
              <div class="meta muted">Fees</div>
            </label>
            <div
              id="panel3"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                Basic account features are free. Transaction or service fees
                can vary by plan (see Financier Subscription Plans). Any fee
                is disclosed before you confirm a transaction.
              </p>
            </div>
          </article>

          <!-- Item 4 -->
          <article class="accordion-item">
            <input id="faq4" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq4"
              tabindex="0"
              role="button"
              aria-controls="panel4"
              aria-expanded="false">
              <h3>How is my data protected?</h3>
              <div class="meta muted">Privacy</div>
            </label>
            <div
              id="panel4"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                We use industry-standard encryption and strict access controls
                to protect user data. Personal data is used only for
                verification and improving services; we do not sell personal
                information.
              </p>
            </div>
          </article>

          <!-- Item 5 -->
          <article class="accordion-item">
            <input id="faq5" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq5"
              tabindex="0"
              role="button"
              aria-controls="panel5"
              aria-expanded="false">
              <h3>
                How does matching between borrowers and financiers work?
              </h3>
              <div class="meta muted">How it works</div>
            </label>
            <div
              id="panel5"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                Borrowers submit loan requests with details. Financiers review
                verified requests and select loans to fund. Matching is based
                on suitability, credit criteria, and financier preferences.
              </p>
            </div>
          </article>

          <!-- Item 6 -->
          <article class="accordion-item">
            <input id="faq6" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq6"
              tabindex="0"
              role="button"
              aria-controls="panel6"
              aria-expanded="false">
              <h3>How can I contact support?</h3>
              <div class="meta muted">Support</div>
            </label>
            <div
              id="panel6"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                Reach support at
                <a href="mailto:support@nouverely.io">support@nouverely.io</a>, or call +91 1234 567 890. Use the Contact page for
                non-urgent requests.
              </p>
            </div>
          </article>

          <!-- Item 7 -->
          <article class="accordion-item">
            <input id="faq7" class="accordion-input" type="checkbox" />
            <label
              class="accordion-header"
              for="faq7"
              tabindex="0"
              role="button"
              aria-controls="panel7"
              aria-expanded="false">
              <h3>Where can I read the Terms & Conditions?</h3>
              <div class="meta muted">Legal</div>
            </label>
            <div
              id="panel7"
              class="accordion-panel"
              role="region"
              aria-hidden="true">
              <p>
                We link Terms & Conditions in the footer and during signup.
                Visit the Terms & Conditions page for a full legal overview of
                rights and responsibilities.
              </p>
            </div>
          </article>
        </div>
      </div>

      <!-- RIGHT: Sidebar -->
      <aside>
        <div class="quick-box">
          <h4 style="margin-top: 0">Quick links</h4>
          <div style="margin-top: 10px">
            <a
              class="btn primary"
              href="../Auth/signup.php"
              style="display: inline-block; margin-bottom: 8px">Create Account</a>
            <a
              class="btn"
              href="../common/about.php"
              style="display: inline-block; margin-bottom: 8px">About Us</a>
            <a
              class="btn"
              href="../common/contact.php"
              style="display: inline-block">Contact Support</a>
          </div>
        </div>

        <div style="margin-top: 18px" class="quick-box">
          <h4 style="margin: 0 0 8px">Still need help?</h4>
          <p class="muted" style="margin: 0 0 10px">
            Our support team replies within 1–2 business days.
          </p>
          <a class="btn primary" href="../common/contact.php">Contact Support</a>
        </div>
      </aside>
    </div>
  </main>

  <!-- CTA + footer -->
  <section style="padding-bottom: 20px">
    <div class="container">
      <div class="cta" style="max-width: 900px; margin: 0 auto">
        <h2 style="margin: 0 0 8px">
          Didn't find what you were looking for?
        </h2>
        <p style="margin: 0 0 12px; color: #667085">
          Reach out to our team and we'll help you personally.
        </p>
        <div style="text-align: center">
          <a class="btn primary" href="../common/contact.php">Contact Support</a>
          <a class="btn" href="../Auth/signin.php" style="margin-left: 8px">Sign In</a>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER (same structure as your site) -->
  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    // No logic required — but keep year filling purely HTML-only fallback:
    (function() {
      var y = new Date().getFullYear();
      var el = document.getElementById("year");
      if (el) el.textContent = y;
    })();
  </script>
</body>

</html>