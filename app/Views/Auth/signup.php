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
  <title>Sign Up</title>

  <link rel="stylesheet" href="<?= $BASE ?>/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card" aria-label="Sign Up form">

        <!-- LOGO -->
        <div class="logo-box">
          <a href="<?= $BASE ?>/dashboard">
            <img
              src="<?= $BASE ?>/assets/images/Application Logo.png"
              alt="App Logo" />
          </a>
        </div>

        <h3>Create Account</h3>
        <div class="divider"></div>

        <!-- ERROR MESSAGE -->
        <?php if ($error): ?>
          <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- SIGNUP FORM -->
        <form method="POST" action="<?= $BASE ?>/auth/signup">


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

          <label>Confirm Password</label>
          <input
            type="password"
            name="confirm_password"
            required />

          <label>Date of Birth</label>
          <input
            type="date"
            name="dob"
            required />

          <label>4-Digit PIN (for password recovery)</label>
          <input
            type="number"
            name="pin"
            inputmode="numeric"
            pattern="\d{4}"
            maxlength="4"
            required
            placeholder="1234" />

          <label>Register As</label>
          <select name="role" required>
            <option value="borrower">Borrower</option>
            <option value="financier">Financier</option>
          </select>

          <button type="submit" class="btn">
            CREATE ACCOUNT
          </button>
        </form>

        <!-- LINKS -->
        <div class="terms">
          <a class="link" href="<?= $BASE ?>/terms">Terms &amp; Conditions</a>
          <a class="link" href="<?= $BASE ?>/privacy">Privacy Policy</a>
          <a class="link" href="<?= $BASE ?>/auth/signin">Already have an account?</a>
        </div>

      </section>
    </div>
  </main>

  <footer>
    <div class="footer-bottom">
      <div>
        © <span id="year"></span> Financement Faciele · Powered by Nouverely
      </div>
    </div>
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>

</html>