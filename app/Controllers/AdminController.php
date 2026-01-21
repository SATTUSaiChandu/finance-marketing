<?php

require_once 'BaseController.php';
require_once __DIR__ . '/../Core/Auth.php';

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Profile.php';
require_once __DIR__ . '/../Models/Document.php';

class AdminController extends BaseController
{
  private string $base = '/finance-marketing/public';

  /* ================= AUTH GUARD ================= */
  private function guard(): void
  {
    if (!Auth::check() || Auth::role() !== 'admin') {
      header("Location: {$this->base}/auth/signin");
      exit;
    }
  }

  /* ================= DASHBOARD ================= */
  public function index(): void
  {
    $this->guard();
    require __DIR__ . '/../Views/admin/index.php';
  }

  /* ================= USERS LIST ================= */
  public function users(): void
  {
    $this->guard();
    require __DIR__ . '/../Views/admin/users.php';
  }

  /* ================= SETTINGS ================= */
  public function settings(): void
  {
    $this->guard();
    require __DIR__ . '/../Views/admin/settings.php';
  }

  /* ================= VIEW USER ================= */
  public function viewUser(): void
  {
    $this->guard();

    $userId = (int)($_GET['id'] ?? 0);
    if (!$userId) {
      header("Location: {$this->base}/admin/users");
      exit;
    }

    $user = User::findById($userId);
    if (!$user) {
      header("Location: {$this->base}/admin/users");
      exit;
    }

    $profile   = Profile::get($user['id'], $user['role']);
    $documents = Document::byUser($user['id']);

    require __DIR__ . '/../Views/admin/view-user.php';
  }

  /* ================= EDIT USER ================= */
  public function editUser(): void
  {
    $this->guard();

    $userId = (int)($_GET['id'] ?? 0);
    if (!$userId) {
      header("Location: {$this->base}/admin/users");
      exit;
    }

    $user = User::findById($userId);
    if (!$user) {
      header("Location: {$this->base}/admin/users");
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      User::updateName(
        $userId,
        $_POST['first_name'] ?? '',
        $_POST['last_name'] ?? ''
      );

      if (!empty($_POST['status'])) {
        User::updateStatus($userId, $_POST['status']);
      }

      $_SESSION['success'] = 'User updated successfully.';
      header("Location: {$this->base}/admin/users");
      exit;
    }

    require __DIR__ . '/../Views/admin/edit-user.php';
  }

  /* ================= USER ACTIONS ================= */
  public function action(): void
  {
    $this->guard();

    $userId = (int)($_POST['user_id'] ?? 0);
    $action = $_POST['action'] ?? '';

    if (!$userId) {
      http_response_code(400);
      exit('Invalid user');
    }

    switch ($action) {
      case 'suspend':
        User::updateStatus($userId, 'suspended');
        break;

      case 'unsuspend':
        User::updateStatus($userId, 'pending');
        break;



      default:
        http_response_code(400);
        exit('Invalid action');
    }

    echo json_encode(['success' => true]);
  }
}
