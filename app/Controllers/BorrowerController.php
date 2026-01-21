<?php

require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/LoanRequest.php';
require_once __DIR__ . '/../Models/Profile.php';
require_once __DIR__ . '/../Models/Document.php';

class BorrowerController
{
  private string $base = '/finance-marketing/public';

  /* ================= AUTH GUARD ================= */
  private function guard(): void
  {
    if (!Auth::check() || Auth::role() !== 'borrower') {
      header("Location: {$this->base}/auth/signin");
      exit;
    }
  }
  // private function requireVerified(): void
  // {
  //   if (Auth::user()['status'] !== 'verified') {
  //     $_SESSION['error'] = 'Your account must be verified to access this feature.';
  //     header("Location: {$this->base}/financier/dashboard");
  //     exit;
  //   }
  // }


  /* ================= PROFILE + DOCUMENT GUARD ================= */
  private function requireCompletedProfile(): void
  {
    $sessionUser = Auth::user();

    if (!User::hasCompletedProfile($sessionUser['id'], 'borrower')) {
      $_SESSION['error'] = 'Please complete your profile before applying for a loan.';
      header("Location: {$this->base}/borrower/profile?tab=profile");
      exit;
    }

    if (!Document::isComplete($sessionUser['id'], 'borrower')) {
      $_SESSION['error'] = 'Please upload all required documents before applying for a loan.';
      header("Location: {$this->base}/borrower/profile?tab=documents");
      exit;
    }
  }

  /* ================= DASHBOARD ================= */
  public function dashboard(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $user = User::findById($sessionUser['id']); // ✅ FIX

    $stats        = LoanRequest::statsForBorrower($user['id']);
    $applications = LoanRequest::recentByBorrower($user['id']);

    $profileCompletion  = Profile::completion($user['id'], 'borrower');
    $documentCompletion = Document::completion($user['id'], 'borrower');

    $overallCompletion = round(
      ($profileCompletion * 0.6) + ($documentCompletion * 0.4)
    );
    $canApplyLoan = (
      Profile::isComplete($user['id'], 'borrower')
      && Document::isComplete($user['id'], 'borrower')
    );


    require __DIR__ . '/../Views/borrower/dashboard.php';
  }

  /* ================= APPLY LOAN ================= */
  public function applyLoan(): void
  {
    $this->guard();
    $this->requireCompletedProfile();

    $sessionUser = Auth::user();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      LoanRequest::create([
        'borrower_id'       => $sessionUser['id'],
        'amount'            => (float) ($_POST['amount'] ?? 0),
        'term'              => (int) ($_POST['term'] ?? 0),
        'purpose'           => $_POST['purpose'] ?? null,
        'monthly_income'    => $_POST['monthly_income'] ?? null,
        'employment_status' => $_POST['employment_status'] ?? null,
        'company_name'      => $_POST['company_name'] ?? null,
        'experience_years'  => $_POST['experience_years'] ?? null,
        'description'       => $_POST['description'] ?? null,
      ]);

      header("Location: {$this->base}/borrower/my-applications");
      exit;
    }

    $user = User::findById($sessionUser['id']); // ✅ FIX
    require __DIR__ . '/../Views/borrower/apply-loan.php';
  }

  /* ================= APPLICATIONS ================= */
  public function applications(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $user        = User::findById($sessionUser['id']);

    $applications = LoanRequest::byBorrower($user['id']);
    $stats        = LoanRequest::statsForBorrower($user['id']);

    // ✅ ADD THESE TWO LINES (THIS IS THE FIX)
    $profileCompletion  = Profile::completion($user['id'], 'borrower');
    $documentCompletion = Document::completion($user['id'], 'borrower');

    $overallCompletion = round(
      ($profileCompletion * 0.6) + ($documentCompletion * 0.4)
    );

    // ✅ SINGLE SOURCE OF TRUTH
    $canApplyLoan = (
      Profile::isComplete($user['id'], 'borrower')
      && Document::isComplete($user['id'], 'borrower')
    );


    require __DIR__ . '/../Views/borrower/my-applications.php';
  }
  // Delete Application
  public function deleteApplication(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $loanId = (int)($_GET['id'] ?? 0);

    if ($loanId <= 0) {
      header("Location: {$this->base}/borrower/my-applications");
      exit;
    }

    LoanRequest::deleteIfNoMatch($loanId, $sessionUser['id']);

    header("Location: {$this->base}/borrower/my-applications");
    exit;
  }


  /* ================= LOANS ================= */
  public function loans(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $user        = User::findById($sessionUser['id']); // ✅ FIX
    $loans       = LoanRequest::approvedLoans($user['id']);
    $stats       = LoanRequest::statsForBorrower($user['id']);

    require __DIR__ . '/../Views/borrower/my-loans.php';
  }

  /* ================= PROFILE ================= */
  public function profile(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $user = User::findById($sessionUser['id']); // ✅ already correct
    $role = 'borrower';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $action = $_POST['_action'] ?? 'save_profile';

      if ($action === 'change_password') {

        $current = $_POST['current_password'] ?? '';
        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (!password_verify($current, $user['password_hash'])) {
          $_SESSION['error'] = 'Current password is incorrect.';
          header("Location: {$this->base}/borrower/profile?tab=security");
          exit;
        }

        if ($new !== $confirm) {
          $_SESSION['error'] = 'New passwords do not match.';
          header("Location: {$this->base}/borrower/profile?tab=security");
          exit;
        }

        if (strlen($new) < 8) {
          $_SESSION['error'] = 'Password must be at least 8 characters.';
          header("Location: {$this->base}/borrower/profile?tab=security");
          exit;
        }

        User::updatePassword($user['id'], $new);

        $_SESSION['success'] = 'Password updated successfully.';
        header("Location: {$this->base}/borrower/profile?tab=security");
        exit;
      }

      User::updateName(
        $user['id'],
        $_POST['first_name'] ?? '',
        $_POST['last_name'] ?? ''
      );

      Profile::save($user['id'], $role, $_POST);

      $_SESSION['success'] = 'Profile updated successfully.';
      header("Location: {$this->base}/borrower/profile");
      exit;
    }

    $profile   = Profile::get($user['id'], $role);
    $documents = Document::byUser($user['id']);

    require __DIR__ . '/../Views/borrower/profile.php';
  }

  /* ================= DOCUMENT UPLOAD ================= */
  public function uploadDocument(): void
  {
    $this->guard();

    $sessionUser = Auth::user();
    $user = User::findById($sessionUser['id']); // ✅ FIX

    if (empty($_FILES['document']) || $_FILES['document']['error'] !== UPLOAD_ERR_OK) {
      $_SESSION['error'] = 'File upload failed';
      header("Location: {$this->base}/borrower/profile?tab=documents");
      exit;
    }

    $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed, true)) {
      $_SESSION['error'] = 'Invalid file type';
      header("Location: {$this->base}/borrower/profile?tab=documents");
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
      "/finance-marketing/public/uploads/{$user['id']}/{$name}"
    );


    $_SESSION['success'] = 'Document uploaded successfully';
    header("Location: {$this->base}/borrower/profile?tab=documents");
    exit;
  }
}
