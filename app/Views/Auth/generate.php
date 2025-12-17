<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Generate New Password</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Generate password">
        <div class="logo-box">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="App Logo" /></a>
        </div>
        <h3>Generate New Password</h3>
        <div class="divider" aria-hidden></div>

        <label>Password</label>
        <input type="password" />

        <label>Confirm Password</label>
        <input type="password" />

        <button class="btn" onclick="alert('password updated')">
          Generate Password
        </button>

        <div class="group-sep"></div>
        <a class="link" href="signin.php">Back to Sign In</a>
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