<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/database.php';

$users = $pdo->query("
  SELECT 
    u.id,
    u.name,
    u.email,
    u.role,
    u.status,
    u.created_at,
    COUNT(l.id) AS loans
  FROM users u
  LEFT JOIN loans l ON l.user_id = u.id
  GROUP BY u.id
  ORDER BY u.created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
