<?php
header('Content-Type: application/json');
require_once '../config/database.php';

/* Page sections */
$sections = [];
$stmt = $pdo->query("SELECT section_key, title, content FROM faq_page");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $sections[$row['section_key']] = [
    'title' => $row['title'],
    'content' => $row['content']
  ];
}

/* FAQs */
$faqs = $pdo->query("
  SELECT question, answer
  FROM faqs
  WHERE is_active = 1
  ORDER BY sort_order ASC
")->fetchAll(PDO::FETCH_ASSOC);

/* Sidebar links */
$links = $pdo->query("
  SELECT label, url, is_primary
  FROM faq_links
")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
  'sections' => $sections,
  'faqs' => $faqs,
  'links' => $links
]);
