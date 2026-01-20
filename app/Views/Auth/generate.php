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
  <title>Reset Password</title>

  <link rel="stylesheet" href="<?= $BASE ?>/assets/css/auth.css" />
</head>

<body>
  <main>
    <div class="container">
      <section class="card">

        <div class="logo-box">
          <a href="<?= $BASE ?>/dashboard">
            <img src="<?= $BASE ?>/assets/images/Application Logo.png" alt="App Logo" />
          </a>
        </div>

        <h3>Set New Password</h3>
        <div class="divider"></div>

        <?php if ($error): ?>
          <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= $BASE ?>/auth/generate">
          <label>New Password</label>
          <input type="password" name="password" required />

          <label>Confirm Password</label>
          <input type="password" name="confirm_password" required />

          <button class="btn" type="submit">
            UPDATE PASSWORD
          </button>
        </form>

        <div class="group-sep"></div>

        <a class="link" href="<?= $BASE ?>/auth/signin">Back to Sign In</a>

      </section>
    </div>
  </main>
</body>

</html>