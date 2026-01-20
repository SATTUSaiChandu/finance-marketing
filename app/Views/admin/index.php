<?php
// app/Views/Admin/index.php
//  - Centered container layout version (full page)
//  - Adjust $assetsBase if your public assets are served from a different path.
$assetsBase = '/finance-marketing/public/assets/admin';

/* Header variables */
$pageTitle     = 'Admin Dashboard';
$pageSubtitle  = 'Admin';
$todayKPI      = '23';
$totalVerified = '12,847';


/* User info for header */
$userName  = 'Admin';
$userEmail = 'admin@finance.com';
$accountMenu = [
  ['label' => 'Home', 'href' => '/finance-marketing/app/Views/Dashboard/index.php'],
  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];

/* Sidebar links (pointing to file locations inside project for now) */
$sidebarLinks = [
  ['key' => 'dashboard',     'label' => 'Dashboard',     'icon' => '📊', 'href' => '/finance-marketing/app/Views/Admin/index.php'],
  ['key' => 'users',         'label' => 'Users',         'icon' => '👥', 'href' => '/finance-marketing/app/Views/Admin/users.php'],
  ['key' => 'settings',      'label' => 'Settings',      'icon' => '⚙️', 'href' => '/finance-marketing/app/Views/Admin/settings.php'],
];
$active = 'dashboard';


/* KPI data */
$kpis = [
  ['label' => 'Total Users',          'value' => '12,847',  'delta' => '+12%', 'deltaSign' => '+', 'icon' => '👥', 'meta' => '+12% from last month'],
  ['label' => 'Pending Verifications', 'value' => '23',      'delta' => '-8%',  'deltaSign' => '-', 'icon' => '📋', 'meta' => '-8% from last month'],
  ['label' => 'Active Loans',         'value' => '1,562',   'delta' => '+23%', 'deltaSign' => '+', 'icon' => '💲', 'meta' => '+23% from last month'],
  ['label' => 'Revenue (MTD)',        'value' => '$145,320', 'delta' => '+18%', 'deltaSign' => '+', 'icon' => '📈', 'meta' => '+18% from last month'],
];


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle . ' — FinanceHub') ?></title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- Page CSS -->
  <!-- GLOBAL LAYOUT -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/admin-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/admin/admin-dashboard.css">

  <!-- SHARED UI COMPONENTS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">



</head>

<body>

  <!-- SIDEBAR (shared partial) -->
  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <!-- PAGE WRAP: two columns (main + right widgets) -->
  <div class="page-wrap">

    <!-- MAIN COLUMN -->
    <div class="main-column">

      <!-- TOPBAR (shared partial) -->
      <?php include __DIR__ . '/../common/header.php'; ?>

      <!-- KPI row inside centered container -->
      <div class="container">
        <?php include __DIR__ . '/../common/kpis.php'; ?>
      </div>

      <!-- Main content area (centered) -->
      <main class="main-content">
        <div class="container">

          <!-- Recent Users block -->
          <section class="content-block" aria-labelledby="recent-users-title">
            <div class="content-header">
              <h3 id="recent-users-title">Recent Users</h3>
              <div class="controls">
                <input type="text" placeholder="Search users..." class="search-input" aria-label="Search users" />
                <button class="btn-outline" aria-label="Search">🔍</button>
              </div>
            </div>

            <div class="table-wrap">
              <table class="user-table" cellspacing="0" cellpadding="0" role="table" aria-label="Recent users">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Loans</th>
                    <th scope="col">Joined</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">JS</div>
                        <div>
                          <div class="user-name">John Smith</div>
                          <div class="user-email">john@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Borrower</td>
                    <td><span class="badge badge-green">Verified</span></td>
                    <td>3</td>
                    <td>2 hours ago</td>
                    <td class="more">…</td>
                  </tr>

                  <tr>
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">SJ</div>
                        <div>
                          <div class="user-name">Sarah Johnson</div>
                          <div class="user-email">sarah@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Financier</td>
                    <td><span class="badge badge-amber">Pending</span></td>
                    <td>0</td>
                    <td>4 hours ago</td>
                    <td class="more">…</td>
                  </tr>

                  <tr>
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">MW</div>
                        <div>
                          <div class="user-name">Mike Wilson</div>
                          <div class="user-email">mike@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Borrower</td>
                    <td><span class="badge badge-green">Verified</span></td>
                    <td>1</td>
                    <td>Yesterday</td>
                    <td class="more">…</td>
                  </tr>

                  <tr>
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">EB</div>
                        <div>
                          <div class="user-name">Emma Brown</div>
                          <div class="user-email">emma@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Financier</td>
                    <td><span class="badge badge-red">Suspended</span></td>
                    <td>12</td>
                    <td>2 days ago</td>
                    <td class="more">…</td>
                  </tr>

                  <tr>
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">AC</div>
                        <div>
                          <div class="user-name">Alex Chen</div>
                          <div class="user-email">alex@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Borrower</td>
                    <td><span class="badge badge-green">Verified</span></td>
                    <td>2</td>
                    <td>2 days ago</td>
                    <td class="more">…</td>
                  </tr>
                </tbody>
              </table>

            </div>
            <br>
            <a href="/finance-marketing/app/Views/admin/users.php" class="btn-primary manage-link">
              Manage Users

            </a>

          </section>

          <br>
          <section class="modules" aria-label="Admin modules">
            <div class="module-card">
              <h4>Security Settings</h4>
              <p>Manage platform security and authentication settings.</p>
              <button class="btn-primary">Open</button>
            </div>

            <div class="module-card">
              <h4>Subscription Plans</h4>
              <p>Manage pricing, tiers and user subscriptions.</p>
              <button class="btn-primary">Open</button>
            </div>

            <div class="module-card">
              <h4>System Settings</h4>
              <p>Configure platform behaviour, roles & permissions.</p>
              <button class="btn-primary">Open</button>
            </div>
          </section>

        </div>
      </main>

    </div>




  </div>


  <?php

  ?>

</body>

</html>