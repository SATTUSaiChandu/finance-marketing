<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About • Financement Faciele</title>
</head>

<body>
  <!-- NAVBAR -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="App Logo" /></a>
        </div>
      </div>
    </div>
  </header>

  <!-- ABOUT HERO -->
  <section class="hero" style="padding-top: 50px; padding-bottom: 30px">
    <div class="container center">
      <h1 class="hero-top-title" style="text-align: center">About Us</h1>
      <p
        class="lead"
        style="text-align: center; max-width: 800px; margin: auto">
        Financement Faciele is a digital lending ecosystem designed to bring
        **borrowers** and **responsible financiers** together — securely,
        transparently, and efficiently.
      </p>
    </div>
  </section>

  <!-- ABOUT BODY -->
  <section class="container section" style="margin-top: 20px">
    <div
      class="about-block"
      style="
          background: #ffffff;
          padding: 28px;
          border-radius: 14px;
          border: 1px solid #e6eef9;
          box-shadow: 0 12px 36px rgba(15, 23, 42, 0.04);
          max-width: 900px;
          margin: auto;
        ">
      <h2 class="section-title" style="margin-top: 0">Who We Are</h2>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        Financement Faciele is a modern peer-to-peer financial platform
        designed to simplify the lending experience. Our goal is to empower
        individuals and organizations to access capital quickly while enabling
        financiers to invest with confidence.
      </p>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        This product is **owned, developed, and managed by Nouverely**, a
        technology-driven company focused on building smart, secure, and
        innovative digital solutions for financial accessibility.
      </p>

      <h2 class="section-title" style="margin-top: 40px">What We Do</h2>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        We connect borrowers seeking financial support with verified
        financiers interested in funding genuine loan requests. The platform
        ensures:
      </p>

      <ul
        style="
            color: #475569;
            line-height: 1.8;
            padding-left: 20px;
            font-size: 16px;
          ">
        <li>✔ Safe and verified onboarding using KYC</li>
        <li>✔ Matching borrowers with suitable financiers</li>
        <li>✔ Transparent loan request process</li>
        <li>✔ Secure data handling and encrypted communication</li>
        <li>✔ Reliable portfolio and repayment tracking tools</li>
      </ul>

      <h2 class="section-title" style="margin-top: 40px">
        How the System Works
      </h2>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        Financement Faciele uses a streamlined process to guarantee smooth
        communication and safe transactions between all parties:
      </p>

      <ol
        style="
            color: #475569;
            line-height: 1.8;
            padding-left: 20px;
            font-size: 16px;
          ">
        <li>
          <strong>Borrowers</strong> create an account and complete KYC
          verification.
        </li>
        <li>They submit their loan requirements and necessary documents.</li>
        <li>
          <strong>Financiers</strong> browse through verified loan
          applications.
        </li>
        <li>
          Financiers choose borrowers they want to fund based on credibility
          and interest.
        </li>
        <li>
          Once matched, both parties proceed with further communication and
          funding steps.
        </li>
      </ol>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        Our system ensures full transparency, accurate loan tracking, and
        seamless user experience — from application to funding.
      </p>

      <h2 class="section-title" style="margin-top: 40px">Our Mission</h2>

      <p style="color: #475569; line-height: 1.7; font-size: 16px">
        At Nouverely, our mission is to bridge the financial gap for
        individuals and small businesses by using technology to create trust,
        security, and accessibility in the lending market.
      </p>
    </div>
  </section>

  <!-- FOOTER -->
  <?php include __DIR__ . '/footer.php'; ?>
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>

</html>