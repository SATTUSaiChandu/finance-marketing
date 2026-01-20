<?php
$BASE = '/finance-marketing/public';
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forgot Password</title>

  <link rel="stylesheet" href="<?= $BASE ?>/assets/css/auth.css" />
</head>

<body>

  <main>
    <div class="container">
      <section class="card" aria-label="Forgot Password">

        <!-- Logo -->
        <div class="logo-box">
          <a href="<?= $BASE ?>/dashboard">
            <img
              src="<?= $BASE ?>/assets/images/Application Logo.png"
              alt="App Logo" />
          </a>
        </div>

        <h3>Forgot Password</h3>
        <div class="divider" aria-hidden="true"></div>

        <!-- ERROR MESSAGE -->
        <?php if (!empty($error)): ?>
          <p class="error">
            <?= htmlspecialchars($error) ?>
          </p>
        <?php endif; ?>

        <!-- FORM -->
        <form method="POST" action="<?= $BASE ?>/auth/forgot">

          <label>Email</label>
          <input
            type="email"
            name="email"
            required
            placeholder="you@example.com" />

          <label>Date of Birth</label>
          <input
            type="date"
            name="dob"
            required />

          <label>4-Digit PIN</label>
          <input
            type="password"
            name="pin"
            maxlength="4"
            inputmode="numeric"
            placeholder="••••"
            required />

          <button class="btn" type="submit">
            Verify & Continue
          </button>

        </form>

        <div class="group-sep"></div>

        <!-- FIXED LINK -->
        <a href="<?= $BASE ?>/auth/signin">Back to Sign In</a>

      </section>
    </div>
  </main>

  <footer>
    <div class="footer-bottom">
      <div>
        © <span id="year"></span> Financement Faciele. All rights reserved ·
        Powered by Nouverely
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