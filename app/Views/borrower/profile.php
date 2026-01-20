<?php
$pageTitle    = "Profile";
$pageSubtitle = "Settings";

/**
 * REQUIRED FROM CONTROLLER:
 * $user    → Auth::user()
 * $profile → Profile::get($user['id'], 'borrower')
 */

$userName  = $user['first_name'];
$userEmail = $user['email'];
$role      = 'borrower';
$base      = '/finance-marketing/public';

/* SIDEBAR ROUTES */
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',        'icon' => '📊', 'href' => "{$base}/borrower"],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => "{$base}/borrower/my-applications"],
  ['key' => 'loans',        'label' => 'My Loans',         'icon' => '💰', 'href' => "{$base}/borrower/loans"],
];
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/public/borrower/profile']
];

$active = 'profile';

/* TAB HANDLING */
$activeTab = $_GET['tab'] ?? 'profile';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Borrower Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="<?= $base ?>/assets/css/layout/layout.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/common/header.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/common/profile.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">
      <?php
      /**
       * VARIABLES REQUIRED BY common/profile.php
       * DO NOT REMOVE
       */
      require __DIR__ . '/../common/profile.php';
      ?>
    </main>

  </div>

</body>

</html>