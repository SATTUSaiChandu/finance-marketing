<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Wishlist — Financier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Global layout -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">

  <!-- Page CSS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/financier-wishlist.css">

  <!-- Header & Sidebar -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
</head>

<body>

  <?php
  $sidebarLinks = [
    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
    ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
    ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
    ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],

  ];

  $active = 'wishlist';
  include __DIR__ . '/../common/sidebar.php';
  ?>

  <div class="page-wrap">

    <?php
    $pageTitle = "Wishlist";
    $pageSubtitle = "Saved Applications";

    $userName = "Financier";
    $userEmail = "financier@finance.com";

    $accountMenu = [
      ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php'],

      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];

    include __DIR__ . '/../common/header.php';
    ?>

    <main class="main-content">



      <!-- Wishlist Table -->
      <section class="section-card">

        <table class="data-table">
          <thead>
            <tr>
              <th>Borrower</th>
              <th>Loan Amount</th>
              <th>Credit Score</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>
                <strong>John Doe</strong>
                <div class="sub">Business Expansion</div>
              </td>
              <td>$25,000</td>
              <td class="score good">780</td>
              <td><span class="badge badge-green">Verified</span></td>
              <td class="actions-cell">
                <a href="application.php?id=1" class="btn-view">View</a>
                <button class="btn-remove">✕</button>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Jane Smith</strong>
                <div class="sub">Home Renovation</div>
              </td>
              <td>$15,000</td>
              <td class="score excellent">820</td>
              <td><span class="badge badge-green">Verified</span></td>
              <td class="actions-cell">
                <a href="application.php?id=2" class="btn-view">View</a>
                <button class="btn-remove">✕</button>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Emily Davis</strong>
                <div class="sub">Debt Consolidation</div>
              </td>
              <td>$30,000</td>
              <td class="score average">710</td>
              <td><span class="badge badge-amber">Pending</span></td>
              <td class="actions-cell">
                <a href="application.php?id=3" class="btn-view">View</a>
                <button class="btn-remove">✕</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Footer -->
        <div class="table-footer">
          <a href="/finance-marketing/app/Views/financier/applications.php"
            class="btn-load-more">
            Browse More Applications →
          </a>
        </div>

      </section>

    </main>
  </div>

</body>

</html>