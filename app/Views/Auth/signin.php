<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sign In</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Sign In form">
        <div class="logo-box">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="App Logo" /></a>
        </div>
        <h3>Sign In</h3>
        <div class="divider" aria-hidden></div>

        <label>User Name:</label>
        <input type="text" value="" placeholder="johndoe" />

        <label>Password:</label>
        <input type="password" />

        <button class="btn" onclick="alert('fake sign in')">SIGN IN</button>
        <a class="link" href="forgot.php">Forgot Password?</a>

        <div class="group-sep"></div>
        <div class="small">New here?</div>
        <a
          class="btn"
          href="signup.php"
          style="
              display: inline-block;
              margin-top: 8px;
              text-decoration: none;
            ">SIGN UP</a>
        <div class="terms">
          <a class="link" href="../common/terms.php">Terms &amp; Conditions</a>
          <a class="link" href="../common/privacy.php">Privacy Policy</a>
        </div>
      </section>
    </div>
  </main>

  <footer>
    <div class="footer-bottom">
      <div>
        © <span id="year"></span> Financement Faciele. All rights reserved. ·
        Powered By Nouverely
      </div>
      <div class="small-links">
        <a href="../common/privacy.php">Privacy</a> ·
        <a href="../common/terms.php">Terms</a> ·
        <a href="../common/contact.php">Support</a>
      </div>
    </div>
  </footer>
</body>

</html>