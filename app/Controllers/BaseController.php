<?php

class BaseController
{
  protected function view(string $view, array $data = [])
  {
    extract($data);

    $path = __DIR__ . '/../Views/' . $view . '.php';

    if (!file_exists($path)) {
      die("View not found: " . $path);
    }

    require $path;
  }

  protected function requireCompletedProfile()
  {
    $user = Auth::user();

    if (!User::hasCompletedProfile($user['id'], $user['role'])) {
      $_SESSION['error'] = 'Please complete your profile before continuing.';
      header("Location: /finance-marketing/public/{$user['role']}/profile");
      exit;
    }
  }
}
