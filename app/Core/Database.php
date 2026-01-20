<?php

class Database
{
  private static $pdo = null;

  public static function get()
  {
    if (self::$pdo === null) {
      self::$pdo = new PDO(
        "mysql:host=localhost;dbname=financehub;charset=utf8mb4",
        "root",
        "", // XAMPP default password is empty
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    }
    return self::$pdo;
  }
}
