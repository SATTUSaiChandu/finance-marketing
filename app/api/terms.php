<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/database.php';

/* Sections */
$sections = $pdo->query("
  SELECT section_key, title, content
  FROM terms_page
  ORDER BY sort_order ASC
")->fetchAll(PDO::FETCH_ASSOC);

/* Bullets */
$bullets = $pdo->query("
  SELECT section_key, bullet
  FROM terms_bullets
")->fetchAll(PDO::FETCH_ASSOC);

$groupedBullets = [];
foreach ($bullets as $b) {
  $groupedBullets[$b['section_key']][] = $b['bullet'];
}

echo json_encode([
  'sections' => $sections,
  'bullets' => $groupedBullets
]);
