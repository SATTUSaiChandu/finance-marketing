<?php
$pageTitle    = "Investments";
$pageSubtitle = "Your active and completed investments";

$userName  = "Financier";
$userEmail = "financier@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];
$active = 'investments';

$kpis = [
  [
    'label' => 'Total Invested',
    'value' => '$580K',
    'delta' => '+12%',
    'deltaSign' => '+',
    'meta' => 'this year',
    'icon' => '💼'
  ],
  [
    'label' => 'Active Investments',
    'value' => '12',
    'delta' => '+2',
    'deltaSign' => '+',
    'meta' => 'new this month',
    'icon' => '📈'
  ],
  [
    'label' => 'Total Returns',
    'value' => '$38.5K',
    'delta' => '+15%',
    'deltaSign' => '+',
    'meta' => 'ROI',
    'icon' => '💰'
  ],
  [
    'label' => 'Defaulted Loans',
    'value' => '1',
    'delta' => '-1',
    'deltaSign' => '-',
    'meta' => 'recovered',
    'icon' => '⚠️'
  ]
];
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Investments — Financier</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/investments.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- Page Header -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>


      <!-- Investment Table -->
      <section class="section-card">
        <table class="data-table">
          <thead>
            <tr>
              <th>Borrower</th>
              <th>Loan Amount</th>
              <th>Interest</th>
              <th>Duration</th>
              <th>Status</th>
              <th>Returns</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>
                <strong>John Doe</strong>
                <div class="muted">Business Expansion</div>
              </td>
              <td>$25,000</td>
              <td>12%</td>
              <td>24 months</td>
              <td><span class="badge badge-green">Active</span></td>
              <td class="positive">+$3,200</td>
            </tr>

            <tr>
              <td>
                <strong>Jane Smith</strong>
                <div class="muted">Home Renovation</div>
              </td>
              <td>$15,000</td>
              <td>10%</td>
              <td>18 months</td>
              <td><span class="badge badge-green">Active</span></td>
              <td class="positive">+$1,450</td>
            </tr>

            <tr>
              <td>
                <strong>Emily Davis</strong>
                <div class="muted">Debt Consolidation</div>
              </td>
              <td>$30,000</td>
              <td>11%</td>
              <td>36 months</td>
              <td><span class="badge badge-gray">Completed</span></td>
              <td class="positive">+$5,900</td>
            </tr>

            <tr>
              <td>
                <strong>Robert Johnson</strong>
                <div class="muted">Equipment Purchase</div>
              </td>
              <td>$20,000</td>
              <td>9%</td>
              <td>12 months</td>
              <td><span class="badge badge-red">Defaulted</span></td>
              <td class="negative">−$4,200</td>
            </tr>
          </tbody>
        </table>
      </section>

    </main>
  </div>

</body>

</html>