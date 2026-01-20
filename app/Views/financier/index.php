<?php


/* ================= PAGE META ================= */
$pageTitle    = "Dashboard";
$pageSubtitle = "Financier";

$userName  = $user['first_name'];
$userEmail = $user['email'];

$active = 'dashboard';
$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];
/* ================= KPIs ================= */
$kpis = [
  [
    'label' => 'Available Applications',
    'value' => $stats['available'],
    'icon'  => '👥'
  ],
  [
    'label' => 'Wishlist',
    'value' => $stats['wishlist'],
    'icon'  => '❤️'
  ],
  [
    'label' => 'Active Loans',
    'value' => $stats['active_loans'],
    'icon'  => '💰'
  ],
  [
    'label' => 'Total Invested',
    'value' => '$' . number_format($stats['total_invested']),
    'icon'  => '📈'
  ],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php']
];
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Financier Dashboard — FinanceHub</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/financier-dashboard.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
</head>

<body>

  <!-- ================= SIDEBAR ================= -->
  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <!-- ================= HEADER ================= -->
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- ================= KPIs ================= -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- ================= RECENT APPLICATIONS ================= -->
      <section class="section-card">

        <table class="data-table">
          <caption class="sr-only">Recent borrower applications</caption>

          <thead>
            <tr>
              <th>Borrower</th>
              <th>Loan Amount</th>
              <th>Status</th>
              <th>Return Rate</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

            <?php if (empty($recentApplications)): ?>
              <tr>
                <td colspan="5" class="muted" style="text-align:center;padding:20px;">
                  No verified applications available yet.
                </td>
              </tr>
            <?php endif; ?>

            <?php foreach ($recentApplications as $app): ?>
              <tr>
                <td>
                  <strong>
                    <?= htmlspecialchars($app['first_name'] . ' ' . $app['last_name']) ?>
                  </strong>
                </td>

                <td>
                  $<?= number_format($app['amount']) ?>
                </td>

                <td>
                  <span class="badge badge-green">Verified</span>
                </td>

                <td class="muted">—</td>

                <td class="actions-cell">
                  <a
                    href="/finance-marketing/app/Views/financier/applications.php"
                    class="btn-view">
                    View
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>

        <!-- ================= LOAD MORE ================= -->
        <div class="table-footer">
          <a href="applications.php" class="btn-load-more">
            Load More Applications →
          </a>
        </div>

      </section>

    </main>
  </div>

</body>

</html>