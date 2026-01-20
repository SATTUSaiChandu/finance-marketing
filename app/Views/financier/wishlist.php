<?php
// ================= PAGE META =================
$pageTitle    = "Wishlist";
$pageSubtitle = "Saved Applications";

$userName  = $user['first_name'];
$userEmail = $user['email'];

// Sidebar links
$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',    'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist',     'label' => 'Wishlist',     'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments',  'label' => 'Investments',  'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];

$active = 'wishlist';

// Header account menu
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php']
];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Wishlist — Financier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Layout -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">

  <!-- Shared -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">

  <!-- Page specific -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/financier-wishlist.css">
</head>

<body>

  <!-- ================= SIDEBAR ================= -->
  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">

    <!-- ================= HEADER ================= -->
    <?php include __DIR__ . '/../common/header.php'; ?>

    <!-- ================= MAIN ================= -->
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

            <?php if (empty($wishlist)): ?>
              <tr>
                <td colspan="4" class="muted" style="text-align:center;padding:20px;">
                  No applications in your wishlist yet.
                </td>
              </tr>
            <?php endif; ?>

            <?php foreach ($wishlist as $item): ?>
              <tr>

                <td>
                  <strong>
                    <?= htmlspecialchars(($item['first_name'] ?? '') . ' ' . ($item['last_name'] ?? '')) ?>
                  </strong>
                  <div class="sub">
                    <?= htmlspecialchars($item['description'] ?? 'Loan Application') ?>
                  </div>
                </td>

                <td>
                  $<?= number_format((float) ($item['amount'] ?? 0)) ?>
                </td>

                <td>
                  <?php
                  $status = $item['status'] ?? 'pending';
                  $badgeClass = match ($status) {
                    'verified' => 'badge-green',
                    'pending'  => 'badge-amber',
                    default    => 'badge-gray'
                  };
                  ?>
                  <span class="badge <?= $badgeClass ?>">
                    <?= ucfirst($status) ?>
                  </span>
                </td>

                <td class="actions-cell">

                  <a
                    href="/finance-marketing/app/Views/financier/applications.php"
                    class="btn-view">
                    View
                  </a>

                  <form
                    method="POST"
                    action="/finance-marketing/public/financier/wishlist/remove"
                    style="display:inline;">
                    <input
                      type="hidden"
                      name="loan_request_id"
                      value="<?= (int) $item['loan_request_id'] ?>">
                    <button
                      type="submit"
                      class="btn-remove"
                      aria-label="Remove from wishlist">
                      ✕
                    </button>
                  </form>

                </td>

              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

        <!-- Footer -->
        <div class="table-footer">
          <a
            href="/finance-marketing/app/Views/financier/applications.php"
            class="btn-load-more">
            Browse More Applications →
          </a>
        </div>

      </section>

    </main>
  </div>

</body>

</html>