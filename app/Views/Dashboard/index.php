<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Financement Faciele</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">
</head>

<body>

  <!-- ================= NAVBAR ================= -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <a href="/finance-marketing/public/dashboard">
            <img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="Application Logo" />
          </a>
        </div>
      </div>

      <div class="nav-actions">
        <a class="btn" href="/finance-marketing/public/auth/signin">Login</a>
        <a class="btn primary" href="/finance-marketing/public/auth/signup">Get Started</a>
      </div>
    </div>
  </header>

  <!-- ================= HERO ================= -->
  <section class="hero" id="home">
    <h1 class="hero-top-title" style="text-align:center;">
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

        <div class="buttons hero-ctas" role="group" aria-label="Primary actions">
          <a class="btn primary" href="/finance-marketing/public/auth/signup">I Need a Loan →</a>
          <a class="btn" href="/finance-marketing/public/auth/signup">I Want to Invest →</a>
        </div>

        <div class="trust-row" aria-hidden="true">
          <span class="trust-item">Trusted by 8,000+ users</span>
          <span class="trust-item">Secure KYC</span>
          <span class="trust-item">Encrypted data</span>
        </div>
      </div>

      <div class="hero-mockup">
        <img
          src="/finance-marketing/public/assets/images/pictures/indexImg.png"
          alt="Platform mockup" />
      </div>
    </div>
  </section>

  <!-- ================= FEATURES ================= -->
  <section class="container">
    <div class="features">
      <div class="card">
        <div class="icon">🔐</div>
        <h3>Secure & Verified</h3>
        <p>All users undergo thorough KYC verification for safety.</p>
      </div>

      <div class="card">
        <div class="icon">📈</div>
        <h3>Competitive Rates</h3>
        <p>Transparent matching ensures fair interest rates.</p>
      </div>

      <div class="card">
        <div class="icon">🤝</div>
        <h3>Trusted Network</h3>
        <p>Join thousands of verified borrowers and financiers.</p>
      </div>
    </div>
  </section>

  <!-- ================= HOW IT WORKS ================= -->
  <section class="container section">
    <h2 class="section-title">How It Works</h2>

    <div class="how-columns">
      <div class="how-block borrowers">
        <h3>For Borrowers</h3>
        <ul>
          <li>Create account & complete KYC</li>
          <li>Submit loan application</li>
          <li>Get matched with financiers</li>
          <li>Receive funding</li>
        </ul>
      </div>

      <div class="how-block financiers">
        <h3>For Financiers</h3>
        <ul>
          <li>Register and verify identity</li>
          <li>Browse loan applications</li>
          <li>Review borrower documents</li>
          <li>Fund loans and earn returns</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= SUBSCRIPTION PLANS ================= -->
  <section class="container section light" id="plans">
    <h2 class="section-title">Subscription Plans for Financiers</h2>

    <div class="plans-grid" role="list">

      <div class="plan card-plan" role="listitem">
        <div class="plan-tag">Starter</div>
        <h3 class="plan-price">Free</h3>
        <p class="plan-sub">Perfect for new financiers</p>
        <ul class="plan-features">
          <li>Browse loan listings</li>
          <li>Basic portfolio tracking</li>
          <li>Email support</li>
        </ul>
        <a class="btn primary" href="../Auth/signup.php">Get Started</a>
      </div>

      <div class="plan card-plan featured" role="listitem">
        <div class="plan-tag">Growth</div>
        <h3 class="plan-price">$49 / mo</h3>
        <p class="plan-sub">Best for active financiers</p>
        <ul class="plan-features">
          <li>Vetted borrower leads</li>
          <li>Advanced analytics</li>
          <li>Priority support</li>
          <li>Custom alerts</li>
        </ul>
        <a class="btn primary" href="/finance-marketing/public/auth/signup">Start Free Trial</a>
      </div>

      <div class="plan card-plan" role="listitem">
        <div class="plan-tag">Pro</div>
        <h3 class="plan-price">$199 / mo</h3>
        <p class="plan-sub">For institutions</p>
        <ul class="plan-features">
          <li>API access</li>
          <li>Dedicated manager</li>
          <li>White-glove onboarding</li>
        </ul>
        <a class="btn" href="/finance-marketing/public/auth/contact">Contact Sales</a>
      </div>

    </div>

    <div class="plan-note" style="text-align:center;margin-top:12px;color:#667085;">
      All prices shown are illustrative. Annual discounts available.
    </div>
  </section>

  <!-- ================= CTA ================= -->
  <section class="container section">
    <div class="cta">
      <h2>Ready to Get Started?</h2>
      <p>Join today and experience seamless lending.</p>

      <div class="cta-actions">
        <a class="btn primary" href="/finance-marketing/public/auth/signup">Create Account</a>
        <a class="btn" href="/finance-marketing/public/contact">Talk to Sales</a>
      </div>

      <p class="small-note">
        Already have an account? <a href="/finance-marketing/public/auth/signin">Sign in</a>
      </p>
    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <?php include __DIR__ . '/../common/footer.php'; ?>

  <script>
    const yearEl = document.getElementById("year");
    if (yearEl) {
      yearEl.textContent = new Date().getFullYear();
    }
  </script>

</body>

</html>