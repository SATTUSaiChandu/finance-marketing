<?php
// ================= PAGE META =================
$pageTitle    = "Profile";
$pageSubtitle = "Settings";

$userName  = $user['first_name'];
$userEmail = $user['email'];
$base      = '/finance-marketing/public';
$role      = 'financier';

// Sidebar (Financier)
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',    'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist',     'label' => 'Wishlist',     'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments',  'label' => 'Investments',  'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];

// Account menu (header dropdown)
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php']
];

$active = 'profile';

// Active tab inside profile (Profile / Security / Documents)
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