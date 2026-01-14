<?php
$pageTitle    = "Profile";
$pageSubtitle = "Settings";

$userName  = "Financier";
$userEmail = "Financier@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];
$active = 'profile';

/* 🔥 THIS WAS MISSING */
$activeTab = $_GET['tab'] ?? 'profile';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Borrower Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/profile.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">
      <?php include __DIR__ . '/../common/profile.php'; ?>
    </main>

  </div>

</body>

</html>