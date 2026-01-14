<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Financier Dashboard — FinanceHub</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/financier-dashboard.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
</head>

<body>

  <?php
  $sidebarLinks = [
    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
    ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
    ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
    ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],

  ];
  $active = 'dashboard';
  include __DIR__ . '/../common/sidebar.php';
  ?>

  <div class="page-wrap">

    <?php
    $pageTitle = "Dashboard";
    $pageSubtitle = "Financier";
    $userName = "Financier";
    $userEmail = "financier@finance.com";
    $accountMenu = [
      ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php'],

      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];
    include __DIR__ . '/../common/header.php';
    ?>

    <main class="main-content">

      <!-- Page intro -->

      <?php
      $kpis = [
        [
          'label' => 'Available Applications',
          'value' => '128',
          'delta' => '+12',
          'deltaSign' => '+',
          'meta' => 'this week',
          'icon' => '👥'
        ],
        [
          'label' => 'Wishlist',
          'value' => '8',
          'delta' => '+4',
          'deltaSign' => '+',
          'meta' => 'new matches',
          'icon' => '❤️'
        ],
        [
          'label' => 'Active Loans',
          'value' => '12',
          'delta' => '98%',
          'deltaSign' => '+',
          'meta' => 'on-time',
          'icon' => '💰'
        ],
        [
          'label' => 'Total Invested',
          'value' => '$580K',
          'delta' => '+15%',
          'deltaSign' => '+',
          'meta' => 'returns',
          'icon' => '📈'
        ],
      ];

      include __DIR__ . '/../common/kpis.php';
      ?>



      <!-- Simple content (NO charts) -->
      <section class="section-card">

        <table class="data-table">
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
            <tr>
              <td>John Doe</td>
              <td>$25,000</td>
              <td><span class="badge badge-green">Active</span></td>
              <td>12%</td>
              <td class="actions-cell">
                <a href="application.php?id=1" class="btn-view">View</a>
                <button class="btn-like" aria-label="Add to wishlist">♡</button>
              </td>
            </tr>

            <tr>
              <td>Jane Smith</td>
              <td>$15,000</td>
              <td><span class="badge badge-amber">Pending</span></td>
              <td>10%</td>
              <td class="actions-cell">
                <a href="application.php?id=2" class="btn-view">View</a>
                <button class="btn-like" aria-label="Add to wishlist">♡</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Load more -->
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