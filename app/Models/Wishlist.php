<?php
require_once __DIR__ . '/../Core/Database.php';

class Wishlist
{
  public static function all(int $financierId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        w.loan_request_id,
        lr.amount,
        lr.description,
        lr.status,
        u.first_name,
        u.last_name
      FROM wishlists w
      JOIN loan_requests lr ON lr.id = w.loan_request_id
      JOIN users u ON u.id = lr.borrower_id
      WHERE w.financier_id = ?
      ORDER BY w.created_at DESC
    ");
    $stmt->execute([$financierId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function add(int $financierId, int $loanId): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      INSERT IGNORE INTO wishlists (financier_id, loan_request_id)
      VALUES (?, ?)
    ");
    $stmt->execute([$financierId, $loanId]);
  }

  public static function remove(int $financierId, int $loanId): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      DELETE FROM wishlists
      WHERE financier_id = ? AND loan_request_id = ?
    ");
    $stmt->execute([$financierId, $loanId]);
  }

  public static function count(int $financierId): int
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT COUNT(*) FROM wishlists WHERE financier_id = ?
    ");
    $stmt->execute([$financierId]);

    return (int) $stmt->fetchColumn();
  }
}
