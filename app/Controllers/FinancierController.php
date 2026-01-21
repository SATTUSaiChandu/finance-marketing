<?php

require_once 'BaseController.php';
require_once __DIR__ . '/../Core/Auth.php';

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Profile.php';
require_once __DIR__ . '/../Models/Document.php';
require_once __DIR__ . '/../Models/LoanRequest.php';
require_once __DIR__ . '/../Models/Financier.php';
require_once __DIR__ . '/../Models/Wishlist.php';
require_once __DIR__ . '/../Models/Investment.php';

class FinancierController extends BaseController
{
  private string $base = '/finance-marketing/public';

  /* ================= AUTH GUARD ================= */
  private function guard(): void
  {
    if (!Auth::check() || Auth::role() !== 'financier') {
      header("Location: {$this->base}/auth/signin");
      exit;
    }
  }



  /* ================= ROOT ================= */
  public function index(): void
  {
    $this->guard();
    header("Location: {$this->base}/financier/dashboard");
    exit;
  }

  /* ================= DASHBOARD ================= */
  public function dashboard(): void
  {
    $this->guard();

    $user = User::findById(Auth::user()['id']);

    $stats = Financier::dashboardStats($user['id']);
    $recentApplications = LoanRequest::recentVerified(5);

    require __DIR__ . '/../Views/financier/index.php';
  }

  /* ================= APPLICATIONS ================= */
  public function applications(): void
  {
    $this->guard();


    $applications = LoanRequest::openVerifiedBorrowers();

    require __DIR__ . '/../Views/financier/applications.php';
  }

  /* ================= WISHLIST ================= */
  public function wishlist(): void
  {
    $this->guard();

    $wishlist = Wishlist::all(Auth::user()['id']);
    require __DIR__ . '/../Views/financier/wishlist.php';
  }

  public function addWishlist(): void
  {
    $this->guard();


    Wishlist::add(Auth::user()['id'], (int)$_POST['loan_request_id']);

    header("Location: {$this->base}/financier/applications");
    exit;
  }

  public function removeWishlist(): void
  {
    $this->guard();


    Wishlist::remove(Auth::user()['id'], (int)$_POST['loan_request_id']);

    header("Location: {$this->base}/financier/wishlist");
    exit;
  }

  /* ================= INVEST ================= */
  public function invest(): void
  {
    $this->guard();


    Investment::create(
      Auth::user()['id'],
      (int)$_POST['loan_request_id']
    );

    $_SESSION['success'] = 'Investment successful.';
    header("Location: {$this->base}/financier/investments");
    exit;
  }

  /* ================= INVESTMENTS ================= */
  public function investments(): void
  {
    $this->guard();


    $investments = Investment::byFinancier(Auth::user()['id']);

    require __DIR__ . '/../Views/financier/investments.php';
  }

  /* ================= PROFILE ================= */
  public function profile(): void
  {
    $this->guard();

    $user = User::findById(Auth::user()['id']);
    $role = 'financier';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $action = $_POST['_action'] ?? 'save_profile';

      if ($action === 'change_password') {

        if (!password_verify($_POST['current_password'], $user['password_hash'])) {
          $_SESSION['error'] = 'Current password is incorrect.';
          header("Location: {$this->base}/financier/profile?tab=security");
          exit;
        }

        if ($_POST['new_password'] !== $_POST['confirm_password']) {
          $_SESSION['error'] = 'Passwords do not match.';
          header("Location: {$this->base}/financier/profile?tab=security");
          exit;
        }

        User::updatePassword($user['id'], $_POST['new_password']);
        $_SESSION['success'] = 'Password updated successfully.';
        header("Location: {$this->base}/financier/profile?tab=security");
        exit;
      }

      User::updateName(
        $user['id'],
        $_POST['first_name'] ?? '',
        $_POST['last_name'] ?? ''
      );

      Profile::save($user['id'], $role, $_POST);

      if ($user['status'] === 'pending') {
        User::updateStatus($user['id'], 'under_review');
      }

      $_SESSION['success'] = 'Profile submitted for verification.';
      header("Location: {$this->base}/financier/profile");
      exit;
    }

    $profile   = Profile::get($user['id'], $role);
    $documents = Document::byUser($user['id']);

    require __DIR__ . '/../Views/financier/profile.php';
  }

  /* ================= DOCUMENT UPLOAD ================= */
  public function uploadDocument(): void
  {
    $this->guard();

    $user = Auth::user();

    $ext = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['pdf', 'jpg', 'jpeg', 'png'], true)) {
      $_SESSION['error'] = 'Invalid file type.';
      header("Location: {$this->base}/financier/profile?tab=documents");
      exit;
    }

    $dir = __DIR__ . '/../../public/uploads/' . $user['id'];
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }

    $name = uniqid('doc_', true) . '.' . $ext;
    move_uploaded_file($_FILES['document']['tmp_name'], "{$dir}/{$name}");

    Document::upload(
      $user['id'],
      null,
      $_POST['doc_type'],
      ucfirst($_POST['doc_type']) . ' Proof',
      "/uploads/{$user['id']}/{$name}"
    );


    $_SESSION['success'] = 'Document uploaded successfully.';
    header("Location: {$this->base}/financier/profile?tab=documents");
    exit;
  }
}
