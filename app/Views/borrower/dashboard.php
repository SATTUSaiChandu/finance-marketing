<?php
// ================= Page Meta =================
$pageTitle    = "Dashboard";
$pageSubtitle = "Borrower";

$userName  = $user['first_name'];
$userEmail = $user['email'];

// Sidebar links
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',        'icon' => '📊', 'href' => '/finance-marketing/public/borrower'],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/public/borrower/my-applications'],
  ['key' => 'loans',        'label' => 'My Loans',         'icon' => '💰', 'href' => '/finance-marketing/public/borrower/loans'],
];

$active = 'dashboard';

// KPI data
$kpis = [
  ['label' => 'Open Applications', 'value' => $stats['open'] ?? 0, 'icon' => '📄'],
  ['label' => 'Approved Loans', 'value' => $stats['approved'] ?? 0, 'icon' => '✅'],
  [
    'label' => 'Total Borrowed',
    'value' => '$' . number_format($stats['total_borrowed'] ?? 0),
    'icon' => '💵'
  ],
];


// Account menu
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/public/borrower/profile']
];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Borrower Dashboard</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/dashboard.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- 🔹 PROFILE COMPLETION CARD -->
      <section class="section-card" style="margin-bottom:20px;">
        <h3>Profile Completion</h3>

        <div class="progress-bar" style="margin-top:10px;">
          <div class="progress-bar">
            <div
              class="progress-fill"
              style="width: <?= (int)$overallCompletion ?>%;">
            </div>
          </div>
        </div>

        <p class="muted" style="margin-top:8px;">
          <?= (int)$overallCompletion ?>% completed
          <?php if (!$canApplyLoan): ?>
            · Complete your profile & documents to apply for loans
          <?php endif; ?>
        </p>

        <?php if ($canApplyLoan): ?>
          <a href="/finance-marketing/public/borrower/apply-loan" class="btn-primary">
            + New Application
          </a>
        <?php else: ?>
          <a href="/finance-marketing/public/borrower/profile" class="btn-disabled">
            Complete profile to apply
          </a>
        <?php endif; ?>

      </section>

      <!-- Welcome Card -->
      <section class="welcome-card">
        <div class="welcome-text">
          <h2>Welcome back, <?= htmlspecialchars($userName) ?>!</h2>
          <p>Track your loan applications and repayments in one place.</p>
        </div>

        <?php if ($canApplyLoan): ?>
          <a href="/finance-marketing/public/borrower/apply-loan" class="btn-primary">
            + New Application
          </a>
        <?php else: ?>
          <a href="/finance-marketing/public/borrower/profile" class="btn-primary">
            Complete profile to apply
          </a>
        <?php endif; ?>
      </section>

      <!-- KPIs -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- My Applications -->
      <section class="section-card">
        <div class="section-header">
          <h3>My Applications</h3>

          <?php if ($canApplyLoan): ?>
            <a href="/finance-marketing/public/borrower/apply-loan" class="link-arrow">
              + New Application →
            </a>
          <?php else: ?>
            <a href="/finance-marketing/public/borrower/profile" class="link-arrow">
              Complete profile →
            </a>
          <?php endif; ?>
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
            <?php if (!empty($applications)): ?>
              <?php foreach ($applications as $app): ?>
                <tr>
                  <td>
                    <strong><?= htmlspecialchars($app['purpose'] ?: 'Loan Application') ?></strong>
                    <div class="muted">
                      <?= date('Y-m-d', strtotime($app['created_at'])) ?>
                    </div>
                  </td>

                  <td>
                    <strong>$<?= number_format($app['amount']) ?></strong>
                    <div class="muted">
                      <?= $app['interest_rate'] ? $app['interest_rate'] . '% APR' : '— APR' ?>
                    </div>
                  </td>

                  <td>
                    <span class="badge badge-<?= $app['status'] === 'approved' ? 'green' : 'amber' ?>">
                      <?= ucfirst($app['status']) ?>
                    </span>
                  </td>

                  <td>
                    <a href="#" class="icon-btn">👁</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="muted" style="text-align:center;padding:20px;">
                  <?php if ($canApplyLoan): ?>
                    No applications yet. You can apply for a loan now.
                  <?php else: ?>
                    No applications yet. Start by completing your profile.
                  <?php endif; ?>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </section>

    </main>
  </div>

</body>

</html>