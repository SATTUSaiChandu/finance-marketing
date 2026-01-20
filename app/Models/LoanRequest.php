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
        monthly_income,
        employment_status,
        company_name,
        experience_years,
        description
      )
      VALUES
      (
        :borrower_id,
        :amount,
        :term,
        :monthly_income,
        :employment_status,
        :company_name,
        :experience_years,
        :description
      )
    ");

    $stmt->execute([
      'borrower_id'       => $data['borrower_id'],
      'amount'            => $data['amount'],
      'term'              => $data['term'],
      'monthly_income'    => $data['monthly_income'],
      'employment_status' => $data['employment_status'],
      'company_name'      => $data['company_name'],
      'experience_years'  => $data['experience_years'],
      'description'       => $data['description'],
    ]);
  }

  /* ================= STATS (BORROWER) ================= */
  public static function statsForBorrower(int $borrowerId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        COUNT(*) AS total,
        (
          SELECT COUNT(*)
          FROM loan_matches lm
          JOIN loan_requests lr2 ON lr2.id = lm.loan_request_id
          WHERE lr2.borrower_id = ?
            AND lm.status = 'accepted'
        ) AS active_loans,
        IFNULL((
          SELECT SUM(lr3.amount)
          FROM loan_matches lm2
          JOIN loan_requests lr3 ON lr3.id = lm2.loan_request_id
          WHERE lr3.borrower_id = ?
            AND lm2.status = 'accepted'
        ), 0) AS total_borrowed
      FROM loan_requests lr
      WHERE lr.borrower_id = ?
    ");

    $stmt->execute([$borrowerId, $borrowerId, $borrowerId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  /* ================= RECENT (BORROWER) ================= */
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

  /* ================= ALL (BORROWER) ================= */
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

  /* ================= DELETE (ALLOWED IF NO MATCH YET) ================= */
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

  /* ================= FINANCIER: VISIBLE APPLICATIONS ================= */
  public static function verified(): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        lr.id,
        lr.amount,
        lr.monthly_income,
        lr.description,
        u.first_name,
        u.last_name
      FROM loan_requests lr
      JOIN users u ON u.id = lr.borrower_id
      JOIN borrower_profiles bp ON bp.user_id = u.id
      WHERE bp.address IS NOT NULL
        AND bp.address <> ''
      ORDER BY lr.created_at DESC
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /* ================= FINANCIER: RECENT APPLICATIONS ================= */
  public static function recentVerified(int $limit = 5): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
      SELECT
        lr.id,
        lr.amount,
        u.first_name,
        u.last_name
      FROM loan_requests lr
      JOIN users u ON u.id = lr.borrower_id
      JOIN borrower_profiles bp ON bp.user_id = u.id
      WHERE bp.address IS NOT NULL
        AND bp.address <> ''
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
      SELECT
        lr.*,
        u.first_name AS financier_name,
        u.email AS financier_email
      FROM loan_requests lr
      JOIN loan_matches lm ON lm.loan_request_id = lr.id
      JOIN users u ON u.id = lm.financier_id
      WHERE lr.borrower_id = ?
        AND lm.status = 'accepted'
    ");

    $stmt->execute([$borrowerId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
