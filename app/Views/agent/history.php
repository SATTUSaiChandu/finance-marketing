<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verified Applications — FinanceHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/agent-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/agent/agent-history.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css" />


</head>

<body>

  <!-- ========================= SIDEBAR ========================= -->
  <?php
  $sidebarLinks = [
    [
      'key'   => 'dashboard',
      'label' => 'Dashboard',
      'icon'  => '🏠',
      'href'  => '/finance-marketing/app/Views/agent/index.php',
    ],
    [
      'key'   => 'history',
      'label' => 'History',
      'icon'  => '📊',
      'href'  => '/finance-marketing/app/Views/agent/history.php',
    ],

  ];

  $active = 'history';

  include __DIR__ . '/../common/sidebar.php';
  ?>

  <!-- ========================= PAGE WRAP ========================= -->
  <div class="page-wrap">

    <!-- Fixed Header -->
    <?php
    $pageTitle     = "History";
    $pageSubtitle  = "Agent History";


    $userName  = "Agent";
    $userEmail = "agent@finance.com";
    $accountMenu = [
      ['label' => 'Home', 'href' => '/finance-marketing/app/Views/Dashboard/index.php'],
      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];

    include __DIR__ . '/../common/header.php';
    ?>


    <!-- ========================= VERIFIED LIST ========================= -->
    <main>
      <section class="list-block">

        <div id="verifiedList" class="list">

          <!-- VERIFIED CARD 1 -->
          <article class="review-card">
            <div class="avatar-sm">DL</div>
            <div class="meta">
              <div class="name">David Lee</div>
              <div class="submitted">Verified on: 1 Dec 2025</div>
              <div class="summary">Income and documents matched successfully.</div>
            </div>
            <div class="actions">
              <button class="btn-outline">View</button>
            </div>
          </article>

          <!-- VERIFIED CARD 2 -->
          <article class="review-card">
            <div class="avatar-sm">MS</div>
            <div class="meta">
              <div class="name">Maria Sanchez</div>
              <div class="submitted">Verified on: 30 Nov 2025</div>
              <div class="summary">All details confirmed and approved.</div>
            </div>
            <div class="actions">
              <button class="btn-outline">View</button>
            </div>
          </article>

          <!-- VERIFIED CARD 3 -->
          <article class="review-card">
            <div class="avatar-sm">JR</div>
            <div class="meta">
              <div class="name">James Roy</div>
              <div class="submitted">Verified on: 29 Nov 2025</div>
              <div class="summary">KYC and employment verification successful.</div>
            </div>
            <div class="actions">
              <button class="btn-outline">View</button>
            </div>
          </article>

        </div>

        <!-- Pagination -->
        <div class="pagination">
          <button class="page-btn">Prev</button>
          <div class="page-numbers">
            <button class="page-num active">1</button>
            <button class="page-num">2</button>
            <button class="page-num">3</button>
          </div>
          <button class="page-btn">Next</button>
        </div>

      </section>
    </main>

  </div>

</body>

</html>