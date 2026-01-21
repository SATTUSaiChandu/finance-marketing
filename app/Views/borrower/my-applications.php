<?php
// ================= Page Meta =================
$pageTitle    = "My Applications";
$pageSubtitle = "Borrower";

$userName  = $user['first_name'] ?? '';
$userEmail = $user['email'] ?? '';

// ================= Sidebar =================
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',        'icon' => '📊', 'href' => '/finance-marketing/public/borrower'],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/public/borrower/my-applications'],
  ['key' => 'loans',        'label' => 'My Loans',         'icon' => '💰', 'href' => '/finance-marketing/public/borrower/loans'],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/public/borrower/profile'],
];

$active = 'applications';

// ================= KPI DATA =================
$kpis = [
  ['label' => 'Total Applications', 'value' => $stats['total']    ?? 0, 'icon' => '📄'],
  ['label' => 'Approved',           'value' => $stats['approved'] ?? 0, 'icon' => '✅'],
  ['label' => 'Under Review',       'value' => $stats['pending']  ?? 0, 'icon' => '⏳'],
];

// ================= Status → Badge =================
$statusBadge = [
  'open'     => 'badge badge-amber',
  'approved' => 'badge badge-green',
];



// ================= APPLY GUARD =================

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>My Applications — Borrower</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/my-applications.css">
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
            <select disabled>
              <option>All Status</option>
            </select>

            <?php if ($canApplyLoan): ?>
              <a href="/finance-marketing/public/borrower/apply-loan" class="btn-primary">
                + New Application
              </a>
            <?php else: ?>
              <a href="/finance-marketing/public/borrower/profile" class="btn-primary">
                Complete profile to apply
              </a>
            <?php endif; ?>

          </div>
        </div>

        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Term</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php if (!empty($applications)): ?>
              <?php foreach ($applications as $app): ?>
                <?php
                $status = $app['status'] ?? 'pending';
                $badge  = $statusBadge[$status] ?? 'badge';
                ?>
                <tr>
                  <td>APP-<?= str_pad((int)$app['id'], 3, '0', STR_PAD_LEFT) ?></td>

                  <td>
                    <strong><?= htmlspecialchars($app['purpose'] ?: 'Loan Application') ?></strong>
                    <div class="muted">
                      <?= !empty($app['interest_rate']) ? $app['interest_rate'] . '% APR' : '— APR' ?>
                    </div>
                  </td>

                  <td>$<?= number_format((float)$app['amount']) ?></td>
                  <td><?= (int)$app['term'] ?> months</td>

                  <td>
                    <span class="<?= $badge ?>">
                      <?= ucfirst($status) ?>
                    </span>
                  </td>

                  <td><?= date('Y-m-d', strtotime($app['created_at'])) ?></td>

                  <td>
                    <?php if ($status === 'open'): ?>
                      <a href="/finance-marketing/public/borrower/my-application/delete?id=<?= (int)$app['id'] ?>"
                        class="link-view"
                        onclick="return confirm('Delete this application?')">
                        delete
                      </a>
                    <?php else: ?>
                      —
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="muted" style="text-align:center;padding:20px;">
                  <?php if ($canApplyLoan): ?>
                    No applications yet. You can apply for a loan now.
                  <?php else: ?>
                    No applications yet. Complete your profile to apply.
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