<?php

require_once 'BaseController.php';
require_once __DIR__ . '/../Core/Auth.php';

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Profile.php';
require_once __DIR__ . '/../Models/Document.php';

class AgentController extends BaseController
{
  private string $base = '/finance-marketing/public';

  /* ================= AUTH GUARD ================= */
  private function guard(): void
  {
    if (!Auth::check() || Auth::role() !== 'agent') {
      header("Location: {$this->base}/auth/signin");
      exit;
    }
  }

  /* ================= DASHBOARD ================= */
  public function index(): void
  {
    $this->guard();

    $db = Database::get();

    // Borrowers + Financiers waiting for verification
    $stmt = $db->prepare("
            SELECT 
                id,
                first_name,
                last_name,
                email,
                role,
                status,
                created_at
            FROM users
            WHERE role IN ('borrower', 'financier')
              AND status IN ('pending', 'under_review')
            ORDER BY created_at ASC
        ");
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require __DIR__ . '/../Views/agent/index.php';
  }

  /* ================= VIEW USER ================= */
  public function viewUser(): void

  {
    $this->guard();

    $userId = (int)($_GET['id'] ?? 0);
    if (!$userId) {
      header("Location: {$this->base}/agent");
      exit;
    }

    $user = User::findById($userId);
    if (!$user) {
      header("Location: {$this->base}/agent");
      exit;
    }

    // Load correct profile based on role
    $profile = Profile::get($user['id'], $user['role']);
    $documents = Document::byUser($user['id']);

    require __DIR__ . '/../Views/agent/view-user.php';
  }

  /* ================= VERIFY USER ================= */
  public function verify(): void
  {
    $this->guard();

    $userId = (int)$_POST['user_id'];
    $action = $_POST['action']; // verified | rejected

    if (!in_array($action, ['verified', 'rejected'], true)) {
      header("Location: {$this->base}/agent");
      exit;
    }

    User::updateStatus($userId, $action);

    $_SESSION['success'] = "User has been {$action}.";
    header("Location: {$this->base}/agent");
    exit;
  }
}
