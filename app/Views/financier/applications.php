<?php
$pageTitle    = "Applications";
$pageSubtitle = "Browse borrower applications";

$userName  = $user['first_name'];
$userEmail = $user['email'];

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php']
];

$active = 'applications';


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Applications — Financier</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/applications.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <section class="filters">
        <select disabled>
          <option>Verified Applications</option>
        </select>

        <select disabled>
          <option>Loan Amount</option>
        </select>
      </section>

      <section class="section-card">

        <table class="data-table" id="applicationsTable">
          <thead>
            <tr>
              <th>Borrower</th>
              <th>Loan Details</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody id="tableBody">

            <?php if (empty($applications)): ?>
              <tr>
                <td colspan="4" class="muted" style="text-align:center;padding:20px;">
                  No verified applications available yet.
                </td>
              </tr>
            <?php endif; ?>

            <?php foreach ($applications as $app): ?>
              <tr class="app-row">

                <td>
                  <strong><?= htmlspecialchars($app['first_name'] . ' ' . $app['last_name']) ?></strong>
                  <div class="muted"><?= htmlspecialchars($app['description'] ?? 'Loan Request') ?></div>
                </td>

                <td>
                  <strong>$<?= number_format($app['amount']) ?></strong>
                  <div class="muted">
                    Income: $<?= number_format($app['monthly_income']) ?> / month
                  </div>
                </td>

                <td>
                  <span class="badge badge-green">Verified</span>
                </td>

                <td class="actions-cell">
                  <!-- INVEST = send match request -->
                  <form method="POST" action="giveLoanMatch.php" style="display:inline;">
                    <input type="hidden" name="loan_request_id" value="<?= (int)$app['id'] ?>">
                    <button type="submit" class="btn-primary">
                      Invest
                    </button>
                  </form>
                </td>

              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>

        <div class="pagination" id="pagination"></div>
      </section>

    </main>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const rowsPerPage = 10;
      const rows = document.querySelectorAll(".app-row");
      const pagination = document.getElementById("pagination");

      let currentPage = 1;
      const totalPages = Math.ceil(rows.length / rowsPerPage);

      function showPage(page) {
        currentPage = page;
        rows.forEach((row, index) => {
          row.style.display =
            index >= (page - 1) * rowsPerPage &&
            index < page * rowsPerPage ? "" : "none";
        });
        renderPagination();
      }

      function renderPagination() {
        pagination.innerHTML = "";
        for (let i = 1; i <= totalPages; i++) {
          const btn = document.createElement("button");
          btn.textContent = i;
          btn.className = "page-num" + (i === currentPage ? " active" : "");
          btn.onclick = () => showPage(i);
          pagination.appendChild(btn);
        }
      }

      showPage(1);
    });
  </script>

</body>

</html>