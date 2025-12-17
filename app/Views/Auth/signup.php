<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Sign Up form">
        <div class="logo-box">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="App Logo" /></a>
        </div>
        <h3>Sign Up</h3>
        <div class="divider" aria-hidden></div>

        <label>User Name:</label>
        <input type="text" value="johndoe" />

        <label>Password:</label>
        <input type="password" />

        <label>Confirm Password:</label>
        <input type="password" />

        <label>D.O.B:</label>
        <input type="date" />

        <label>Pin - 4 Digit (Required for Forget Password)</label>
        <input type="number" placeholder="e.g. 1234" />

        <button class="btn" onclick="alert('fake sign up')">
          SIGN Up As Borrower
        </button>
        <div class="small">Become a Financier:</div>
        <button class="btn" onclick="alert('fake sign up')">
          SIGN Up As Financier
        </button>
        <div class="terms">
          <a class="link" href="../common/terms.php">Terms &amp; Conditions</a>
          <a class="link" href="../common/privacy.php">Privacy Policy</a>
          <a class="link" href="signin.php">Already Have Account</a>
        </div>

        <div class="group-sep"></div>

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