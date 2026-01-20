<?php

class Auth
{
  public static function login(array $user): void
  {
    $_SESSION['user'] = [
      'id'    => $user['id'],
      'name'  => $user['name'],
      'email' => $user['email'],
      'role'  => $user['role']
    ];
  }

  public static function user(): ?array
  {
    return $_SESSION['user'] ?? null;
  }

  public static function check(): bool
  {
    return isset($_SESSION['user']);
  }

  public static function role(): ?string
  {
    return $_SESSION['user']['role'] ?? null;
  }

  public static function logout(): void
  {
    session_destroy();
  }
}
