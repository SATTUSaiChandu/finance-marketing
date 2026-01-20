<?php
require_once __DIR__ . '/Auth.php';

class Middleware
{
  public static function auth(): void
  {
    if (!Auth::check()) {
      header("Location: /auth/signin");
      exit;
    }
  }

  public static function role(string $role): void
  {
    self::auth();

    if (Auth::role() !== $role) {
      http_response_code(403);
      exit('403 Forbidden');
    }
  }
}
