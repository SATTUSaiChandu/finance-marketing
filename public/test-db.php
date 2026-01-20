<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/Core/Database.php';

try {
  Database::get();
  echo "DB CONNECTED SUCCESSFULLY";
} catch (Throwable $e) {
  echo "<pre>";
  echo "DB CONNECTION FAILED\n\n";
  echo $e->getMessage();
  echo "</pre>";
}
