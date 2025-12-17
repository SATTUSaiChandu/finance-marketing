<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Forgot Password</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Forgot Password">
        <div class="logo-box">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="App Logo" /></a>
        </div>
        <h3>Forgot Password</h3>
        <div class="divider" aria-hidden></div>

        <label>User Name:</label>
        <input type="text" value="" />

        <label>Date Of Birth:</label>
        <input type="date" />

        <label>Pin (Enter 4 digit Pin):</label>
        <input type="number" placeholder="1234" />

        <a class="btn" href="generate.php">Generate Password</a>

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