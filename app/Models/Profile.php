<?php

require_once __DIR__ . '/../Core/Database.php';

class Profile
{
  /**
   * Get profile data for borrower / financier
   */
  public static function get(int $userId, string $role): ?array
  {
    $db = Database::get();

    if ($role === 'borrower') {
      $stmt = $db->prepare("
                SELECT *
                FROM borrower_profiles
                WHERE user_id = ?
                LIMIT 1
            ");
    } elseif ($role === 'financier') {
      $stmt = $db->prepare("
                SELECT *
                FROM financier_profiles
                WHERE user_id = ?
                LIMIT 1
            ");
    } else {
      return null;
    }

    $stmt->execute([$userId]);
    return $stmt->fetch() ?: null;
  }

  /**
   * Save / update profile
   */
  public static function save(int $userId, string $role, array $data): void
  {
    $db = Database::get();

    $table = $role === 'borrower'
      ? 'borrower_profiles'
      : 'financier_profiles';

    $stmt = $db->prepare("
            INSERT INTO {$table} (user_id, address, city, state, zip, phone)
            VALUES (:user_id, :address, :city, :state, :zip, :phone)
            ON DUPLICATE KEY UPDATE
                address = VALUES(address),
                city    = VALUES(city),
                state   = VALUES(state),
                zip     = VALUES(zip),
                phone   = VALUES(phone)
        ");

    $stmt->execute([
      'user_id' => $userId,
      'address' => trim($data['address'] ?? ''),
      'city'    => trim($data['city'] ?? ''),
      'state'   => trim($data['state'] ?? ''),
      'zip'     => trim($data['zip'] ?? ''),
      'phone'   => trim($data['phone'] ?? ''),
    ]);
  }

  /**
   * Check if profile is fully completed
   */
  public static function isComplete(int $userId, string $role): bool
  {
    $profile = self::get($userId, $role);

    if (!$profile) {
      return false;
    }

    $requiredFields = self::requiredFields($role);

    foreach ($requiredFields as $field) {
      if (empty($profile[$field])) {
        return false;
      }
    }

    return true;
  }

  /**
   * Calculate profile completion percentage
   */
  public static function completion(int $userId, string $role): int
  {
    $profile = self::get($userId, $role);

    if (!$profile) {
      return 0;
    }

    $required = ['phone', 'address', 'city', 'state', 'zip'];

    $filled = 0;

    foreach ($required as $field) {
      if (
        isset($profile[$field]) &&
        trim((string)$profile[$field]) !== '' &&
        $profile[$field] !== 'Sélectionnez un pays'
      ) {
        $filled++;
      }
    }

    return (int) round(($filled / count($required)) * 100);
  }


  /**
   * Required fields per role
   */
  private static function requiredFields(string $role): array
  {
    // Same for now, extend later if needed
    return [
      'address',
      'city',
      'state',
      'zip',
      'phone'
    ];
  }
}
