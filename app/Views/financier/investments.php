<?php
// ================= PAGE DATA =================

$pageTitle    = "Investments";
$pageSubtitle = "Your active and completed investments";

$userName  = $user['first_name'];
$userEmail = $user['email'];

$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',    'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist',     'label' => 'Wishlist',     'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments',  'label' => 'Investments',  'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php']
];

$active = 'investments';

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
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/investments.css">
</head>

<body>

  <!-- ================= SIDEBAR ================= -->
  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <!-- ================= HEADER ================= -->
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">



      <!-- ================= INVESTMENTS TABLE ================= -->
      <section class="section-card">

        <table class="data-table">
          <caption class="sr-only">Your investments overview</caption>

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

            <?php if (empty($investments)): ?>
              <tr>
                <td colspan="6" class="muted" style="text-align:center;padding:20px;">
                  No investments yet.
                </td>
              </tr>
            <?php endif; ?>

            <?php foreach ($investments as $inv): ?>
              <tr>

                <td>
                  <strong>
                    <?= htmlspecialchars(($inv['first_name'] ?? '') . ' ' . ($inv['last_name'] ?? '')) ?>
                  </strong>
                  <div class="muted">
                    <?= htmlspecialchars($inv['purpose'] ?? 'Loan Investment') ?>
                  </div>
                </td>

                <td>
                  $<?= number_format((float) ($inv['amount'] ?? 0)) ?>
                </td>

                <td>
                  <?= number_format((float) ($inv['interest_rate'] ?? 0), 2) ?>%
                </td>

                <td>
                  <?= (int) ($inv['term'] ?? 0) ?> months
                </td>

                <td>
                  <?php
                  $status = $inv['status'] ?? 'active';
                  $badgeClass = match ($status) {
                    'active'     => 'badge-green',
                    'completed'  => 'badge-gray',
                    'defaulted'  => 'badge-red',
                    default      => 'badge-amber'
                  };
                  ?>
                  <span class="badge <?= $badgeClass ?>">
                    <?= ucfirst($status) ?>
                  </span>
                </td>

                <td class="<?= ($inv['returns'] ?? 0) >= 0 ? 'positive' : 'negative' ?>">
                  <?= ($inv['returns'] ?? 0) >= 0 ? '+' : '-' ?>
                  $<?= number_format(abs((float) ($inv['returns'] ?? 0))) ?>
                </td>

              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

      </section>

    </main>
  </div>

</body>

</html>