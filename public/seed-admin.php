<?php
require_once __DIR__ . '/../app/Core/Database.php';

$db = Database::get();

$password = password_hash('admin123', PASSWORD_DEFAULT);
$pin = password_hash('1234', PASSWORD_DEFAULT);

$db->prepare("
  INSERT INTO users (first_name, last_name, email, password_hash, dob, pin_hash, role, status)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
")->execute([
  'Super',
  'Admin',
  'admin@financehub.com',
  $password,
  '1990-11-29',
  $pin,
  'admin',
  'active'
]);

echo "Admin created";
