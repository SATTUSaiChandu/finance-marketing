<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Terms &amp; Conditions</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">

  <style>
    /* Page reset / base */
    * {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
      color: #222;
      background: #f7f9fb;
    }

    /* Centering main area (vertical + horizontal) */
    main {
      min-height: calc(100vh - 76px);
      /* leave room for footer */
      display: flex;
      align-items: center;
      /* vertical centering on large screens */
      justify-content: center;
      /* horizontal centering */
      padding: 40px 20px;
    }

    /* When the viewport is narrow or content is tall, anchor to top */
    @media (max-width: 900px) {
      main {
        align-items: flex-start;
        padding-top: 28px;
      }
    }

    /* Card (terms) */
    .terms-card {
      width: 760px;
      max-width: 95%;
      padding: 28px;
      border-radius: 10px;
      background: #ffffff;
      box-shadow: 0 6px 20px rgba(15, 15, 15, 0.06);
      border: 1px solid #e2e2e2;
      line-height: 1.7;
      animation: fadeIn 0.4s ease-in-out;
    }

    .terms-card .brand {
      display: flex;
      justify-content: center;
      margin-bottom: 12px;
    }

    .terms-card .brand img {
      width: 150px;
      height: auto;
      object-fit: contain;
    }

    h2 {
      text-align: center;
      margin: 4px 0 12px;
      font-size: 26px;
      font-weight: 700;
      color: #0f1724;
    }

    .divider {
      height: 4px;
      width: 64px;
      background: linear-gradient(90deg, #e6f4ff, #f3fbff);
      margin: 12px auto 22px;
      border-radius: 3px;
    }

    .lead {
      text-align: center;
      color: #3b3f46;
      max-width: 860px;
      margin: 0 auto 18px;
      font-size: 15px;
    }

    .section-title {
      margin-top: 26px;
      font-size: 18px;
      font-weight: 700;
      color: #1688ff;
    }

    p {
      margin: 10px 0 0;
      color: #333;
      font-size: 15px;
    }

    ul {
      margin: 8px 0 0 18px;
      color: #333;
    }

    li {
      margin: 8px 0;
    }

    /* small actions */
    .group-sep {
      height: 1px;
      background: #eef6ff;
      margin: 20px 0;
      border-radius: 2px;
    }

    .actions {
      display: flex;
      gap: 12px;
      align-items: center;
      justify-content: center;
      margin-top: 16px;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-block;
      padding: 10px 18px;
      border-radius: 8px;
      background: #4aa6ff;
      color: #fff;
      font-weight: 700;
      text-decoration: none;
      box-shadow: 0 3px 0 rgba(0, 0, 0, 0.04);
    }

    .btn.ghost {
      background: transparent;
      color: #1688ff;
      border: 1px solid #dbeeff;
      box-shadow: none;
    }

    /* subtle footnote */
    .footnote {
      font-size: 13px;
      color: #666;
      margin-top: 18px;
      text-align: center;
    }

    /* animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* responsiveness */
    @media (max-width: 600px) {
      .terms-card {
        padding: 20px;
      }

      h2 {
        font-size: 22px;
      }

      .lead {
        font-size: 14px;
        padding: 0 6px;
      }
    }

    /* footer */
    footer {
      height: 76px;
      border-top: 1px solid #e6e9ee;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #444;
      font-size: 14px;
    }

    footer .inner {
      max-width: 1100px;
      width: 100%;
      padding: 12px 20px;
      display: flex;
      justify-content: center;
    }
  </style>

</head>

<body>
  <main>
    <section class="terms-card" role="article" aria-labelledby="terms-title">
      <div class="brand">
        <!-- place your logo file (logo.png) in same folder -->
        <a href="../Dashboard/index.php"><img src="/finance-marketing/public/assets/images/Application Logo.png" alt="App Logo" /></a>
      </div>

      <h2 id="terms-title">Terms &amp; Conditions</h2>
      <div class="divider" aria-hidden="true"></div>

      <p class="lead">
        Welcome to our application. By accessing or using this platform, you
        acknowledge that you have read, understood, and agree to be bound by
        these Terms &amp; Conditions. This document ensures transparency,
        trust, and a safe experience for all users of our service.
      </p>

      <h3 class="section-title">1. Acceptance of Terms</h3>
      <p>
        By creating an account or using the services provided, you agree to
        comply with all terms, policies, and guidelines. If you do not agree,
        please discontinue using the platform immediately.
      </p>

      <h3 class="section-title">2. User Responsibilities</h3>
      <ul>
        <li>You must provide accurate and updated information.</li>
        <li>
          You are responsible for maintaining the confidentiality of your
          login credentials.
        </li>
        <li>
          You agree not to misuse or attempt to exploit system
          vulnerabilities.
        </li>
      </ul>

      <h3 class="section-title">3. Privacy &amp; Data Usage</h3>
      <p>
        We value your privacy. Any data collected is used strictly to enhance
        user experience, improve services, and ensure system security.
        Personal information is protected and never sold to third parties.
      </p>

      <h3 class="section-title">4. Account Suspension</h3>
      <p>
        We reserve the right to temporarily or permanently suspend accounts
        involved in suspicious behavior, fraud, or violation of these terms.
      </p>

      <h3 class="section-title">5. Service Limitations</h3>
      <p>
        While we strive for uninterrupted service, there may be times when
        maintenance or unforeseen issues cause delays. We do not guarantee
        24/7 availability.
      </p>

      <h3 class="section-title">6. Modification of Terms</h3>
      <p>
        We may update these terms occasionally. Users will be notified
        whenever significant changes occur. Continued usage implies acceptance
        of updated terms.
      </p>

      <h3 class="section-title">7. Contact &amp; Support</h3>
      <p>
        If you have questions or concerns, feel free to reach out to our
        support team anytime. We're committed to helping you with a smooth
        experience.
      </p>

      <div class="group-sep" aria-hidden="true"></div>

      <div class="actions">
        <a class="btn" href="../Auth/signin.php">Back to Sign In</a>
        <a class="btn ghost" href="../common/privacy.php">Privacy Policy</a>
      </div>

      <p class="footnote">Last updated: <span id="terms-year"></span></p>
    </section>
  </main>

  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    document.getElementById("terms-year").textContent =
      new Date().getFullYear();
    document.getElementById("copy-year").textContent =
      new Date().getFullYear();
  </script>
</body>

</html>