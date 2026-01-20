<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>FinanceHub — Verification Dashboard</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/agent/agent-dashboard.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css" />
</head>

<body>

  <?php
  /* ================= SIDEBAR (ROUTE BASED) ================= */
  $sidebarLinks = [
    [
      'key'   => 'dashboard',
      'label' => 'Dashboard',
      'icon'  => '🏠',
      'href'  => '/agent',
    ],
    [
      'key'   => 'history',
      'label' => 'History',
      'icon'  => '📊',
      'href'  => '/agent/history',
    ],
  ];

  $active = 'dashboard';

  include __DIR__ . '/../common/sidebar.php';
  ?>

  <div class="page-wrap">

    <?php
    /* ================= HEADER ================= */
    $pageTitle    = "Verification Dashboard";
    $pageSubtitle = "Agent";

    $userName  = "Agent";
    $userEmail = "agent@finance.com";

    $accountMenu = [
      ['label' => 'Home',   'href' => '/dashboard'],
      ['label' => 'Logout', 'href' => '/auth/signin', 'class' => 'menu-logout'],
    ];

    include __DIR__ . '/../common/header.php';
    ?>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="main-content">

      <!-- Tabs + time filter -->
      <section class="controls">
        <div class="tabs" role="tablist" aria-label="Application status">
          <button class="tab active" data-status="pending" role="tab">Pending</button>
          <button class="tab" data-status="inprogress" role="tab">In Progress</button>
          <button class="tab" data-status="completed" role="tab">Completed</button>
        </div>

        <div class="time-filter">
          <label for="timeFilter">Filter by time</label>
          <select id="timeFilter">
            <option value="all">All</option>
            <option value="24h">Last 24 hours</option>
            <option value="7d">Last 7 days</option>
            <option value="older">Older</option>
          </select>
        </div>
      </section>

      <!-- Cards list -->
      <section class="list-block">
        <div id="reviewList" class="list">

          <!-- SAMPLE CARD -->
          <article class="review-card" data-status="pending" data-time="2025-12-09T22:00:00Z">
            <div class="avatar-sm">AC</div>
            <div class="meta">
              <div class="name">Alice Cooper</div>
              <div class="submitted">Submitted 2 hours ago</div>
              <div class="summary">
                New borrower application — check ID &amp; employment proof.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <!-- Other sample cards unchanged -->

        </div>

        <!-- Pagination -->
        <div class="pagination" id="pagination">
          <button class="page-btn" id="prevPage">Prev</button>
          <div id="pageNumbers" class="page-numbers"></div>
          <button class="page-btn" id="nextPage">Next</button>
        </div>
      </section>

    </main>

    <!-- Right column -->
    <aside class="rightcol">
      <div class="guidelines">
        <h3>Quick Guidelines</h3>
        <ul>
          <li>Verify photo ID matches profile</li>
          <li>Check document dates are current</li>
          <li>Ensure income matches bank statements</li>
        </ul>
        <button id="openGuidelines" class="btn-outline full">
          View Full Guidelines
        </button>
      </div>
    </aside>
  </div>

  <!-- Guidelines Panel + JS (UNCHANGED) -->
  <script>
    /* your existing JS exactly as-is */
  </script>

</body>

</html>