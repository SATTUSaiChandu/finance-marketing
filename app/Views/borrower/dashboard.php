<?php
// ================= Page Meta =================
$pageTitle    = "Dashboard";
$pageSubtitle = "Borrower";

$userName  = "Borrower";
$userEmail = "borrower@finance.com";

// Sidebar links (Borrower – cleaned)
$sidebarLinks = [
  ['key' => 'dashboard',     'label' => 'Dashboard',        'icon' => '📊', 'href' => '/finance-marketing/app/Views/borrower/dashboard.php'],
  ['key' => 'applications',  'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/borrower/my-applications.php'],
  ['key' => 'loans',         'label' => 'My Loans',         'icon' => '💰', 'href' => '/finance-marketing/app/Views/borrower/my-loans.php'],
];

$active = 'dashboard';

// KPI data (reuses common/kpis.php)
$kpis = [
  [
    'label' => 'Active Applications',
    'value' => '2',

    'icon' => '📄'
  ],
  [
    'label' => 'Pending Review',
    'value' => '1',

    'icon' => '⏳'
  ],
  [
    'label' => 'Approved Loans',
    'value' => '3',

    'icon' => '✅'
  ],
  [
    'label' => 'Total Borrowed',
    'value' => '$45,000',

    'icon' => '💵'
  ],
];
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/borrower/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Borrower Dashboard</title>

  <!-- Shared layout -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">

  <!-- Page specific -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/dashboard.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- Welcome Card -->
      <section class="welcome-card">
        <div class="welcome-text">
          <h2>Welcome back, Borrower!</h2>
          <p>Your credit score is excellent. You're eligible for premium rates.</p>
        </div>

        <a href="/finance-marketing/app/Views/borrower/apply-loan.php" class="btn-primary">
          + New Application
        </a>
      </section>

      <!-- KPIs -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- My Applications -->
      <section class="section-card">
        <div class="section-header">
          <h3>My Applications</h3>
          <a href="/finance-marketing/app/Views/borrower/my-applications.php" class="link-arrow">
            View All →
          </a>
        </div>

        <table class="data-table">
          <thead>
            <tr>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Status</th>

              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>
                <strong>Business Expansion</strong>
                <div class="muted">2025-12-05</div>
              </td>
              <td>
                <strong>$25,000</strong>
                <div class="muted">8.5% APR</div>
              </td>
              <td>
                <span class="badge badge-amber">Under Review</span>
              </td>

              <td>
                <a href="#" class="icon-btn">👁</a>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Equipment Purchase</strong>
                <div class="muted">2025-11-28</div>
              </td>
              <td>
                <strong>$15,000</strong>
                <div class="muted">7.2% APR</div>
              </td>
              <td>
                <span class="badge badge-green">Approved</span>
              </td>

              <td>
                <a href="#" class="icon-btn">👁</a>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

    </main>
  </div>

</body>

</html>