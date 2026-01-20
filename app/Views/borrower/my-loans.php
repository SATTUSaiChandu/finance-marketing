<?php
$pageTitle    = "My Loans";
$pageSubtitle = "Borrower";

/**
 * REQUIRED FROM CONTROLLER:
 * $user
 * $loans
 * $stats
 */

$base = '/finance-marketing/public';

$userName  = $user['first_name'];
$userEmail = $user['email'];

/* SIDEBAR ROUTES */
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',        'icon' => '📊', 'href' => "{$base}/borrower"],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => "{$base}/borrower/my-applications"],
  ['key' => 'loans',        'label' => 'My Loans',         'icon' => '💰', 'href' => "{$base}/borrower/loans"],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => "{$base}/borrower/profile"],

];

$active = 'loans';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>My Loans — Borrower</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="<?= $base ?>/assets/css/layout/layout.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/common/header.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/borrower/my-loans.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- KPI component -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- Loans -->
      <section class="loans-list">

        <?php if (empty($loans)): ?>
          <div class="empty-state">
            <h3>No active loans yet</h3>
            <p>Once your applications are approved, they will appear here.</p>
          </div>
        <?php endif; ?>

        <?php foreach ($loans as $loan): ?>

          <?php
          $paidPercent = $loan['amount'] > 0
            ? min(100, round((($loan['amount'] - ($loan['remaining_amount'] ?? $loan['amount'])) / $loan['amount']) * 100))
            : 0;
          ?>

          <div class="loan-card">

            <!-- SUMMARY -->
            <div class="loan-summary" onclick="toggleLoan(this)">
              <div>
                <strong>LOAN-<?= str_pad($loan['id'], 3, '0', STR_PAD_LEFT) ?></strong>
                <div class="muted">
                  $<?= number_format($loan['amount'], 2) ?> · <?= (int)$loan['term'] ?> months
                </div>
              </div>

              <div class="loan-status active">
                <?= ucfirst($loan['status']) ?>
              </div>

              <div>
                <div class="muted">Next Payment</div>
                <strong>
                  <?= isset($loan['monthly_payment'])
                    ? '$' . number_format($loan['monthly_payment'], 2)
                    : '—'
                  ?>
                </strong>
              </div>

              <div class="loan-progress">
                <div class="progress-bar">
                  <span style="width:<?= $paidPercent ?>%"></span>
                </div>
                <small><?= $paidPercent ?>% paid</small>
              </div>

              <div class="loan-toggle">View details ⌄</div>
            </div>

            <!-- DETAILS -->
            <div class="loan-details">
              <div class="details-grid">

                <div>
                  <h4>Loan Details</h4>
                  <p><strong>Amount:</strong> $<?= number_format($loan['amount'], 2) ?></p>
                  <p><strong>APR:</strong> <?= $loan['interest_rate'] ?? '—' ?>%</p>
                  <p><strong>Duration:</strong> <?= (int)$loan['term'] ?> months</p>
                  <p><strong>Status:</strong> <?= ucfirst($loan['status']) ?></p>
                </div>

                <div>
                  <h4>Financier</h4>
                  <p><strong>Name:</strong> <?= $loan['financier_name'] ?? 'Assigned later' ?></p>
                  <p><strong>Email:</strong> <?= $loan['financier_email'] ?? '—' ?></p>
                  <p><strong>Location:</strong> <?= $loan['financier_location'] ?? '—' ?></p>
                </div>

                <div>
                  <h4>Repayment Summary</h4>
                  <p><strong>Paid:</strong> $<?= number_format($loan['paid_amount'] ?? 0, 2) ?></p>
                  <p><strong>Remaining:</strong> $<?= number_format($loan['remaining_amount'] ?? $loan['amount'], 2) ?></p>
                  <p><strong>Next Due:</strong> <?= $loan['next_due_date'] ?? '—' ?></p>
                </div>

              </div>

              <div class="loan-actions">
                <?php if (!empty($loan['financier_email'])): ?>
                  <a href="mailto:<?= htmlspecialchars($loan['financier_email']) ?>" class="btn-secondary">
                    Contact Financier
                  </a>
                <?php endif; ?>

                <?php if (!empty($loan['agreement_path'])): ?>
                  <a href="<?= $base . $loan['agreement_path'] ?>" class="btn-primary" download>
                    Download Agreement
                  </a>
                <?php endif; ?>
              </div>

            </div>
          </div>

        <?php endforeach; ?>

      </section>

    </main>
  </div>

  <script>
    function toggleLoan(el) {
      el.parentElement.classList.toggle('open');
    }
  </script>

</body>

</html>