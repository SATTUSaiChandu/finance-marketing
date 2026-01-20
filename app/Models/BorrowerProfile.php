<?php

require_once __DIR__ . '/../Core/Database.php';

class BorrowerProfile
{
  public static function getByUser(int $userId): ?array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM borrower_profiles
      WHERE user_id = ?
      LIMIT 1
    ");
    $stmt->execute([$userId]);

    return $stmt->fetch() ?: null;
  }

  public static function save(int $userId, array $data): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      INSERT INTO borrower_profiles (user_id, address)
      VALUES (:user_id, :address)
      ON DUPLICATE KEY UPDATE
        address = VALUES(address)
    ");

    $stmt->execute([
      'user_id' => $userId,
      'address' => trim($data['address'] ?? '')
    ]);
  }
}
