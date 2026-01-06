<?php
$pageTitle    = "My Applications";
$pageSubtitle = "Borrower";

$userName  = "Borrower";
$userEmail = "borrower@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/borrower/dashboard.php'],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/borrower/my-applications.php'],
  ['key' => 'loans', 'label' => 'My Loans', 'icon' => '💰', 'href' => '/finance-marketing/app/Views/borrower/my-loans.php'],
];
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/borrower/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];


$kpis = [
  [
    'label' => 'Total Applications',
    'value' => 3,

    'meta' => 'this month',
    'icon' => '📄'
  ],
  [
    'label' => 'Approved',
    'value' => 1,

    'meta' => 'approved',
    'icon' => '✅'
  ],
  [
    'label' => 'Under Review',
    'value' => 2,

    'meta' => 'pending',
    'icon' => '⏳'
  ],

];

$active = 'applications';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>My Applications — Borrower</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/my-applications.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- KPIs -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- Applications -->
      <section class="section-card">

        <div class="section-header">
          <h2>All Applications</h2>

          <div class="section-actions">

            <select>
              <option>All Status</option>
              <option>Approved</option>
              <option>Under Review</option>
            </select>

            <a href="/finance-marketing/app/Views/borrower/apply-loan.php" class="btn-primary">
              + New Application
            </a>
          </div>
        </div>

        <table class="data-table">
          <thead>
            <tr>
              <th>Application ID</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Term</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>APP-001</td>
              <td>
                <strong>Business Expansion</strong>
                <div class="muted">8.5% APR</div>
              </td>
              <td>$25,000</td>
              <td>24 months</td>
              <td><span class="badge badge-amber">Under Review</span></td>


              <td>2025-12-05</td>
              <td><a href="#" class="link-view">delete</a></td>
            </tr>

            <tr>
              <td>APP-002</td>
              <td>
                <strong>Equipment Purchase</strong>
                <div class="muted">7.2% APR</div>
              </td>
              <td>$15,000</td>
              <td>12 months</td>
              <td><span class="badge badge-green">Approved</span></td>


              <td>2025-11-28</td>

            </tr>

            <tr>
              <td>APP-004</td>
              <td>
                <strong>Property Investment</strong>
                <div class="muted">— APR</div>
              </td>
              <td>$50,000</td>
              <td>36 months</td>
              <td><span class="badge badge-amber">Under Review</span></td>


              <td>2025-10-15</td>
              <td><a href="#" class="link-view">delete</a></td>
            </tr>
          </tbody>
        </table>

      </section>

    </main>
  </div>

</body>

</html>