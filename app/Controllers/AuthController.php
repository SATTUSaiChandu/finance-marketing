<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Core/Auth.php';

class AuthController
{
  private string $base = '/finance-marketing/public';

  /* ================= SIGN IN ================= */
  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $email    = trim($_POST['email'] ?? '');
      $password = $_POST['password'] ?? '';

      $user = User::findByEmail($email);

      if (!$user || !password_verify($password, $user['password_hash'])) {
        $_SESSION['error'] = 'Invalid email or password';
        header("Location: {$this->base}/auth/signin");
        exit;
      }

      if ($user['status'] !== 'active') {
        $_SESSION['error'] = 'Account is blocked';
        header("Location: {$this->base}/auth/signin");
        exit;
      }

      Auth::login($user);

      $redirects = [
        'admin'     => "{$this->base}/admin",
        'borrower'  => "{$this->base}/borrower",
        'financier' => "{$this->base}/financier",
        'agent'     => "{$this->base}/agent",
      ];

      header("Location: " . ($redirects[$user['role']] ?? "{$this->base}/dashboard"));
      exit;
    }

    require __DIR__ . '/../Views/auth/signin.php';
  }

  /* ================= SIGN UP ================= */
  public function signup()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if ($_POST['password'] !== $_POST['confirm_password']) {
        $_SESSION['error'] = 'Passwords do not match';
        header("Location: {$this->base}/auth/signup");
        exit;
      }

      if (User::findByEmail($_POST['email'])) {
        $_SESSION['error'] = 'Email already registered';
        header("Location: {$this->base}/auth/signup");
        exit;
      }

      User::create([

        'email'    => $_POST['email'],
        'password' => $_POST['password'],
        'dob'      => $_POST['dob'],
        'pin'      => $_POST['pin'],
        'role'     => $_POST['role'],
      ]);

      // ✅ CORRECT REDIRECT
      header("Location: {$this->base}/auth/signin");
      exit;
    }

    require __DIR__ . '/../Views/auth/signup.php';
  }

  /* ================= FORGOT PASSWORD ================= */
  public function forgot()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $user = User::verifyForReset(
        $_POST['email'],
        $_POST['dob'],
        $_POST['pin']
      );

      if (!$user) {
        $_SESSION['error'] = 'Verification failed';
        header("Location: {$this->base}/auth/forgot");
        exit;
      }

      $_SESSION['password_reset_user'] = $user['id'];
      header("Location: {$this->base}/auth/generate");
      exit;
    }

    require __DIR__ . '/../Views/auth/forgot.php';
  }

  /* ================= GENERATE NEW PASSWORD ================= */
  public function generate()
  {
    if (!isset($_SESSION['password_reset_user'])) {
      header("Location: {$this->base}/auth/forgot");
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if ($_POST['password'] !== $_POST['confirm_password']) {
        $_SESSION['error'] = 'Passwords do not match';
        header("Location: {$this->base}/auth/generate");
        exit;
      }

      User::updatePassword(
        $_SESSION['password_reset_user'],
        $_POST['password']
      );

      unset($_SESSION['password_reset_user']);

      header("Location: {$this->base}/auth/signin");
      exit;
    }

    require __DIR__ . '/../Views/auth/generate.php';
  }

  /* ================= LOGOUT ================= */
  public function logout(): void
  {
    // Start session if not started
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    // Unset all session variables
    $_SESSION = [];

    // Destroy session cookie
    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
      );
    }

    // Destroy session
    session_destroy();

    // Extra safety
    session_regenerate_id(true);

    // Redirect to login
    header("Location: /finance-marketing/public/auth/signin");
    exit;
  }
}
