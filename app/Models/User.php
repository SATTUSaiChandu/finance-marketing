<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/Document.php';

class User
{
  /* ================= FIND ================= */
  public static function findByEmail(string $email): ?array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM users
      WHERE email = ?
      LIMIT 1
    ");
    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
  }

  public static function findById(int $id): ?array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM users
      WHERE id = ?
      LIMIT 1
    ");
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
  }

  /* ================= CREATE ================= */
  public static function create(array $data): bool
  {
    $db = Database::get();

    $stmt = $db->prepare("
      INSERT INTO users (
        first_name,
        last_name,
        email,
        password_hash,
        dob,
        pin_hash,
        role,
        status
      )
      VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')
    ");

    return $stmt->execute([
      $data['first_name'] ?? '',
      $data['last_name'] ?? '',
      $data['email'],
      password_hash($data['password'], PASSWORD_DEFAULT),
      $data['dob'],
      password_hash($data['pin'], PASSWORD_DEFAULT),
      $data['role']
    ]);
  }

  /* ================= UPDATE NAME ================= */
  public static function updateName(int $userId, string $first, string $last): bool
  {
    $db = Database::get();

    $stmt = $db->prepare("
      UPDATE users
      SET first_name = ?, last_name = ?
      WHERE id = ?
    ");

    return $stmt->execute([$first, $last, $userId]);
  }

  /* ================= UPDATE STATUS (✅ ADDED) ================= */
  public static function updateStatus(int $userId, string $status): bool
  {
    $db = Database::get();

    $stmt = $db->prepare("
      UPDATE users
      SET status = ?
      WHERE id = ?
    ");

    return $stmt->execute([$status, $userId]);
  }

  /* ================= PASSWORD RESET ================= */
  public static function verifyForReset(string $email, string $dob, string $pin): ?array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM users
      WHERE email = ? AND dob = ?
      LIMIT 1
    ");
    $stmt->execute([$email, $dob]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
      return null;
    }

    if (!password_verify($pin, $user['pin_hash'])) {
      return null;
    }

    return $user;
  }

  public static function updatePassword(int $userId, string $newPassword): bool
  {
    $db = Database::get();

    $stmt = $db->prepare("
      UPDATE users
      SET password_hash = ?
      WHERE id = ?
    ");

    return $stmt->execute([
      password_hash($newPassword, PASSWORD_DEFAULT),
      $userId
    ]);
  }

  /* ================= PROFILE COMPLETION (HARD CHECK) ================= */
  public static function hasCompletedProfile(int $userId, string $role): bool
  {
    $db = Database::get();

    if ($role === 'borrower') {
      $stmt = $db->prepare("
        SELECT 1
        FROM borrower_profiles
        WHERE user_id = ?
          AND address IS NOT NULL
          AND address <> ''
        LIMIT 1
      ");
    } elseif ($role === 'financier') {
      $stmt = $db->prepare("
        SELECT 1
        FROM financier_profiles
        WHERE user_id = ?
          AND address IS NOT NULL
          AND address <> ''
        LIMIT 1
      ");
    } else {
      return true;
    }

    $stmt->execute([$userId]);
    return (bool) $stmt->fetchColumn();
  }

  /* ================= PROFILE COMPLETION % ================= */
  public static function profileCompletion(int $userId, string $role): int
  {
    $db = Database::get();

    if (!in_array($role, ['borrower', 'financier'], true)) {
      return 100;
    }

    $table = $role === 'borrower'
      ? 'borrower_profiles'
      : 'financier_profiles';

    $stmt = $db->prepare("
      SELECT address, city, state, zip, phone
      FROM {$table}
      WHERE user_id = ?
      LIMIT 1
    ");
    $stmt->execute([$userId]);

    $profile = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$profile) {
      return 0;
    }

    $fields = ['address', 'city', 'state', 'zip', 'phone'];
    $filled = 0;

    foreach ($fields as $field) {
      if (!empty($profile[$field])) {
        $filled++;
      }
    }

    return (int) round(($filled / count($fields)) * 100);
  }

  /* ================= OVERALL COMPLETION ================= */
  public static function overallCompletion(int $userId, string $role): int
  {
    if (!in_array($role, ['borrower', 'financier'], true)) {
      return 100;
    }

    $profilePercent  = self::profileCompletion($userId, $role);
    $documentPercent = Document::completion($userId, $role);

    return (int) round(($profilePercent + $documentPercent) / 2);
  }
}
