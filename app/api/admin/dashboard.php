<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/database.php';

/* ===== KPIs ===== */
$kpis = [
  'users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
  'borrowers' => $pdo->query("SELECT COUNT(*) FROM users WHERE role='Borrower'")->fetchColumn(),
  'financiers' => $pdo->query("SELECT COUNT(*) FROM users WHERE role='Financier'")->fetchColumn(),
  'loans' => $pdo->query("SELECT COUNT(*) FROM loans")->fetchColumn()
];

/* ===== RECENT USERS ===== */
$users = $pdo->query("
  SELECT u.id, u.name, u.email, u.role, u.status,
         COUNT(l.id) AS loans,
         u.created_at
  FROM users u
  LEFT JOIN loans l ON l.user_id = u.id
  GROUP BY u.id
  ORDER BY u.created_at DESC
  LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

/* ===== MODULES ===== */
$modules = [
  [
    'title' => 'Security Settings',
    'description' => 'Manage platform security and authentication settings.',
    'url' => '/admin/settings'
  ],
  [
    'title' => 'Subscription Plans',
    'description' => 'Manage pricing, tiers and user subscriptions.',
    'url' => '/admin/settings'
  ],
  [
    'title' => 'System Settings',
    'description' => 'Configure platform behaviour, roles & permissions.',
    'url' => '/admin/settings'
  ]
];

echo json_encode([
  'kpis' => $kpis,
  'users' => $users,
  'modules' => $modules
]);
