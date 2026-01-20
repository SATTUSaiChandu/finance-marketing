<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/database.php';

/* Subscription plans */
$plans = $pdo->query("
  SELECT id, name, monthly_price, access_details
  FROM subscription_plans
  WHERE is_active = 1
  ORDER BY monthly_price ASC
")->fetchAll(PDO::FETCH_ASSOC);

/* FAQs */
$faqs = $pdo->query("
  SELECT id, question, answer
  FROM admin_faqs
  WHERE is_active = 1
  ORDER BY created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

/* Terms */
$currentTerms = $pdo->query("
  SELECT content
  FROM terms_versions
  WHERE is_active = 1
  LIMIT 1
")->fetchColumn();

$versions = $pdo->query("
  SELECT version_label, created_at
  FROM terms_versions
  ORDER BY created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
  'plans' => $plans,
  'faqs' => $faqs,
  'terms' => $currentTerms,
  'versions' => $versions
]);
