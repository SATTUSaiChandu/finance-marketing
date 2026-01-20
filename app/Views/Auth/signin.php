<?php
$BASE = '/finance-marketing/public';
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sign In</title>

  <link rel="stylesheet" href="<?= $BASE ?>/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Sign In form">

        <div class="logo-box">
          <a href="<?= $BASE ?>/dashboard">
            <img
              src="<?= $BASE ?>/assets/images/Application Logo.png"
              alt="App Logo" />
          </a>
        </div>

        <h3>Sign In</h3>
        <div class="divider" aria-hidden></div>

        <!-- ERROR MESSAGE -->
        <?php if ($error): ?>
          <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- REAL LOGIN FORM -->
        <form method="POST" action="<?= $BASE ?>/auth/signin">

          <label>Email</label>
          <input
            type="email"
            name="email"
            required
            placeholder="john@example.com" />

          <label>Password</label>
          <input
            type="password"
            name="password"
            required />

          <button type="submit" class="btn">
            SIGN IN
          </button>
        </form>

        <a class="link" href="<?= $BASE ?>/auth/forgot">Forgot Password?</a>
        <div class="group-sep"></div>
        <div class="small">New here?</div>

        <a
          class="btn"
          href="<?= $BASE ?>/auth/signup"
          style="display:inline-block;margin-top:8px;text-decoration:none;">
          SIGN UP
        </a>

        <div class="terms">
          <a class="link" href="<?= $BASE ?>/terms">Terms &amp; Conditions</a>
          <a class="link" href="<?= $BASE ?>/privacy">Privacy Policy</a>
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
        <a href="<?= $BASE ?>/privacy">Privacy</a> ·
        <a href="<?= $BASE ?>/terms">Terms</a> ·
        <a href="<?= $BASE ?>/contact">Support</a>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>

</html>