<?php
require_once __DIR__ . '/../Core/Database.php';

class Investment
{
  public static function create(int $financierId, int $loanId): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      INSERT INTO investments (financier_id, loan_request_id, status)
      VALUES (?, ?, 'pending')
    ");
    $stmt->execute([$financierId, $loanId]);
  }

  public static function byFinancier(int $financierId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        lr.amount,
        lr.term,
        lr.interest_rate,
        i.status,
        u.first_name,
        u.last_name
      FROM investments i
      JOIN loan_requests lr ON lr.id = i.loan_request_id
      JOIN users u ON u.id = lr.borrower_id
      WHERE i.financier_id = ?
      ORDER BY i.created_at DESC
    ");
    $stmt->execute([$financierId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function activeCount(int $financierId): int
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT COUNT(*) FROM investments
      WHERE financier_id = ? AND status = 'active'
    ");
    $stmt->execute([$financierId]);

    return (int) $stmt->fetchColumn();
  }

  public static function totalInvested(int $financierId): float
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT SUM(lr.amount)
      FROM investments i
      JOIN loan_requests lr ON lr.id = i.loan_request_id
      WHERE i.financier_id = ? AND i.status = 'active'
    ");
    $stmt->execute([$financierId]);

    return (float) ($stmt->fetchColumn() ?? 0);
  }
}
