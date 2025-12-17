<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Financement Faciele</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">

</head>

<body>
  <!-- NAVBAR -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="Application Logo" /></a>
        </div>
      </div>

      <div class="nav-actions">
        <a class="btn" href="../Auth/signin.php">Login</a>
        <a class="btn primary" href="../Auth/signup.php">Get Started</a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero" id="home">
    <h1 class="hero-top-title" style="text-align: center">
      Connect. Fund. Grow.
    </h1>
    <div class="container center hero-inner">
      <div class="hero-content">
        <div class="hero-subtitle">
          Connect borrowers with responsible financiers
        </div>

        <p class="lead">
          LendConnect brings borrowers and financiers together on a secure,
          transparent platform powered by verified identities.
        </p>

        <div class="buttons hero-ctas" role="group" aria-label="Primary CTAs">
          <a class="btn primary" href="../Auth/signup.php">I Need a Loan →</a>
          <a class="btn" href="../Auth/signup.php">I Want to Invest →</a>
        </div>

        <div class="trust-row" aria-hidden="true">
          <span class="trust-item">Trusted by 8,000+ users</span>
          <span class="trust-item">Secure KYC</span>
          <span class="trust-item">Encrypted data</span>
        </div>
      </div>

      <div class="hero-mockup">
        <img src="/finance-marketing/public/assets/images/pictures/indexImg.png" alt="App mockup" />
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="container">
    <div class="features">
      <div class="card">
        <div class="icon">🔐</div>
        <h3>Secure & Verified</h3>
        <p>All users undergo thorough KYC verification for your safety.</p>
      </div>

      <div class="card">
        <div class="icon">📈</div>
        <h3>Competitive Rates</h3>
        <p>
          Get the best interest rates with our transparent matching system.
        </p>
      </div>

      <div class="card">
        <div class="icon">🤝</div>
        <h3>Trusted Network</h3>
        <p>Join thousands of verified borrowers and financiers.</p>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section class="container section">
    <h2 class="section-title">How It Works</h2>

    <div class="how-columns" aria-hidden="false">
      <div class="how-block borrowers">
        <h3>For Borrowers</h3>
        <ul>
          <li>Create account & complete KYC verification</li>
          <li>Submit loan application & documents</li>
          <li>Get matched with interested financiers</li>
          <li>Receive funding and start your journey</li>
        </ul>
      </div>

      <div class="how-block financiers">
        <h3>For Financiers</h3>
        <ul>
          <li>Register and verify identity</li>
          <li>Browse verified loan applications</li>
          <li>Review borrower profiles and documents</li>
          <li>Fund loans and manage returns</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- FINANCIER SUBSCRIPTION PLANS -->
  <section class="container section light" id="plans">
    <h2 class="section-title">Subscription Plans for Financiers</h2>

    <div class="plans-grid" role="list">
      <div class="plan card-plan" role="listitem" aria-label="Starter Plan">
        <div class="plan-tag">Starter</div>
        <h3 class="plan-price">Free</h3>
        <p class="plan-sub">Perfect for new financiers</p>
        <ul class="plan-features">
          <li>Browse public loan listings</li>
          <li>Basic portfolio tracking</li>
          <li>Email support</li>
        </ul>
        <a class="btn primary" href="../Auth/signup.php">Get Started</a>
      </div>

      <div
        class="plan card-plan featured"
        role="listitem"
        aria-label="Growth Plan">
        <div class="plan-tag">Growth</div>
        <h3 class="plan-price">$49 / mo</h3>
        <p class="plan-sub">Best for active financiers</p>
        <ul class="plan-features">
          <li>Access to vetted borrower leads</li>
          <li>Advanced analytics & scoring</li>
          <li>Priority support</li>
          <li>Custom alerts & filters</li>
        </ul>
        <a class="btn primary" href="../Auth/signup.php">Start Free Trial</a>
      </div>

      <div class="plan card-plan" role="listitem" aria-label="Pro Plan">
        <div class="plan-tag">Pro</div>
        <h3 class="plan-price">$199 / mo</h3>
        <p class="plan-sub">For institutional investors</p>
        <ul class="plan-features">
          <li>Full API access & bulk funding tools</li>
          <li>Dedicated account manager</li>
          <li>White-glove onboarding</li>
        </ul>
        <a class="btn" href="../Auth/signup.php">Contact Sales</a>
      </div>
    </div>

    <marquee>
      <p class="plan-note">
        All prices shown are illustrative. Annual billing discounts available.
        Cancel anytime.
      </p>
    </marquee>

  </section>

  <!-- CTA -->
  <section class="container section">
    <div class="cta">
      <h2>Ready to Get Started?</h2>
      <p>Join our platform today and experience seamless lending.</p>

      <div class="cta-actions">
        <a class="btn primary" href="../Auth/signup.php">Create Account</a>
        <a class="btn" href="../common/contact.php">Talk to Sales</a>
      </div>

      <p class="small-note">
        Already have an account? <a href="../Auth/signin.php">Sign in</a>
      </p>
    </div>
  </section>

  <!-- FOOTER (heavy, full feature) -->
  <?php include __DIR__ . '/../common/footer.php'; ?>

  <script>
    // small helper to fill copyright year
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>

</html>