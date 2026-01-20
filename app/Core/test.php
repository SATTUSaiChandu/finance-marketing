<?php
require_once __DIR__ . '/../app/Core/Database.php';

try {
  Database::get();
  echo "DATABASE CONNECTED ✅";
} catch (Throwable $e) {
  echo $e->getMessage();
}
