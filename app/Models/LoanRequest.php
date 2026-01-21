<?php

require_once __DIR__ . '/../Core/Database.php';

class LoanRequest
{
  /* ================= CREATE ================= */
  public static function create(array $data): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      INSERT INTO loan_requests 
      (
        borrower_id,
        amount,
        term,
        purpose,
        monthly_income,
        employment_status,
        company_name,
        experience_years,
        description,
        status
      )
      VALUES
      (
        :borrower_id,
        :amount,
        :term,
        :purpose,
        :monthly_income,
        :employment_status,
        :company_name,
        :experience_years,
        :description,
        'open'
      )
    ");

    $stmt->execute([
      'borrower_id'       => $data['borrower_id'],
      'amount'            => $data['amount'],
      'term'              => $data['term'],
      'purpose'           => $data['purpose'] ?? null,
      'monthly_income'    => $data['monthly_income'] ?? null,
      'employment_status' => $data['employment_status'] ?? null,
      'company_name'      => $data['company_name'] ?? null,
      'experience_years'  => $data['experience_years'] ?? null,
      'description'       => $data['description'] ?? null,
    ]);
  }

  /* ================= STATS (BORROWER) ================= */
  public static function statsForBorrower(int $borrowerId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        COUNT(*) AS total,
        SUM(CASE WHEN status = 'open' THEN 1 ELSE 0 END) AS open,
        SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) AS approved,
        IFNULL(SUM(CASE WHEN status = 'approved' THEN amount ELSE 0 END), 0) AS total_borrowed
      FROM loan_requests
      WHERE borrower_id = ?
    ");

    $stmt->execute([$borrowerId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  /* ================= BORROWER LISTS ================= */
  public static function recentByBorrower(int $borrowerId, int $limit = 5): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM loan_requests
      WHERE borrower_id = ?
      ORDER BY created_at DESC
      LIMIT ?
    ");

    $stmt->bindValue(1, $borrowerId, PDO::PARAM_INT);
    $stmt->bindValue(2, $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function byBorrower(int $borrowerId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT *
      FROM loan_requests
      WHERE borrower_id = ?
      ORDER BY created_at DESC
    ");

    $stmt->execute([$borrowerId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function deleteIfNoMatch(int $loanId, int $borrowerId): void
  {
    $db = Database::get();

    $stmt = $db->prepare("
      DELETE lr
      FROM loan_requests lr
      LEFT JOIN loan_matches lm ON lm.loan_request_id = lr.id
      WHERE lr.id = ?
        AND lr.borrower_id = ?
        AND lm.id IS NULL
    ");

    $stmt->execute([$loanId, $borrowerId]);
  }

  /* ================= FINANCIER ================= */

  public static function openVerifiedBorrowers(): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        lr.*,
        u.first_name,
        u.last_name
      FROM loan_requests lr
      JOIN users u ON u.id = lr.borrower_id
      WHERE lr.status = 'open'
        AND u.status = 'verified'
      ORDER BY lr.created_at DESC
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function recentVerified(int $limit = 5): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        lr.*,
        u.first_name,
        u.last_name
      FROM loan_requests lr
      JOIN users u ON u.id = lr.borrower_id
      WHERE lr.status = 'open'
        AND u.status = 'verified'
      ORDER BY lr.created_at DESC
      LIMIT ?
    ");

    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /* ================= BORROWER: APPROVED LOANS ================= */
  public static function approvedLoans(int $borrowerId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
    SELECT *
    FROM loan_requests
    WHERE borrower_id = ?
      AND status = 'approved'
  ");

    $stmt->execute([$borrowerId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
