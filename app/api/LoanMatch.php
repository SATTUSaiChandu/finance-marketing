<?php
session_start();

require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Core/Database.php';

header('Content-Type: application/json');

/* ================= AUTH CHECK ================= */
if (!Auth::check() || Auth::role() !== 'financier') {
  http_response_code(403);
  echo json_encode(['error' => 'Unauthorized']);
  exit;
}

$financier = Auth::user();

/* ================= INPUT ================= */
$loanId     = (int) ($_POST['loan_id'] ?? 0);
$borrowerId = (int) ($_POST['borrower_id'] ?? 0);

if ($loanId <= 0 || $borrowerId <= 0) {
  http_response_code(400);
  echo json_encode(['error' => 'Invalid request']);
  exit;
}

$db = Database::get();

/* ================= CHECK LOAN ================= */
$stmt = $db->prepare("
  SELECT id, borrower_id, status
  FROM loan_requests
  WHERE id = ?
  LIMIT 1
");
$stmt->execute([$loanId]);

$loan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$loan) {
  http_response_code(404);
  echo json_encode(['error' => 'Loan not found']);
  exit;
}

/* ================= ONLY VERIFIED LOANS ================= */
if ($loan['status'] !== 'verified') {
  http_response_code(403);
  echo json_encode(['error' => 'Loan not available for investment']);
  exit;
}

/* ================= PREVENT DUPLICATE MATCH ================= */
$stmt = $db->prepare("
  SELECT id
  FROM loan_matches
  WHERE loan_request_id = ? AND financier_id = ?
  LIMIT 1
");
$stmt->execute([$loanId, $financier['id']]);

if ($stmt->fetch()) {
  echo json_encode(['message' => 'Already requested']);
  exit;
}

/* ================= CREATE MATCH ================= */
$stmt = $db->prepare("
  INSERT INTO loan_matches (loan_request_id, financier_id, borrower_id)
  VALUES (?, ?, ?)
");

$stmt->execute([
  $loanId,
  $financier['id'],
  $borrowerId
]);

echo json_encode([
  'success' => true,
  'message' => 'Investment request sent'
]);
