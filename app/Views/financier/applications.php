<?php
$pageTitle    = "Applications";
$pageSubtitle = "Browse borrower applications";

$userName  = "Financier";
$userEmail = "financier@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/financier/index.php'],
  ['key' => 'applications', 'label' => 'Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/financier/applications.php'],
  ['key' => 'wishlist', 'label' => 'Wishlist', 'icon' => '❤️', 'href' => '/finance-marketing/app/Views/financier/wishlist.php'],
  ['key' => 'investments', 'label' => 'Investments', 'icon' => '💼', 'href' => '/finance-marketing/app/Views/financier/investments.php'],

];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/financier/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];
$active = 'applications';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Applications — Financier</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/financier/applications.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- Filters -->
      <section class="filters">

        <select>
          <option>All Status</option>
          <option>Verified</option>
          <option>Pending</option>
        </select>
        <select>
          <option>Loan Amount</option>
          <option>Lowest → Highest</option>
          <option>Highest → Lowest</option>
        </select>
      </section>

      <!-- Applications table -->
      <section class="section-card">

        <table class="data-table" id="applicationsTable">
          <thead>
            <tr>
              <th>Borrower</th>
              <th>Loan Details</th>
              <th>Credit Score</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody id="tableBody">

            <!-- SAMPLE ROWS (add as many as you want) -->
            <?php for ($i = 1; $i <= 32; $i++): ?>
              <tr class="app-row">
                <td>
                  <strong>User <?= $i ?></strong>
                  <div class="muted">Business Loan</div>
                </td>
                <td>
                  <strong>$<?= rand(10, 50) ?>,000</strong>
                  <div class="muted">Income: $<?= rand(4, 12) ?>,000 / mo</div>
                </td>
                <td class="score good"><?= rand(680, 850) ?></td>
                <td>
                  <span class="badge <?= $i % 3 === 0 ? 'badge-amber' : 'badge-green' ?>">
                    <?= $i % 3 === 0 ? 'Pending' : 'Verified' ?>
                  </span>
                </td>
                <td class="actions-cell">
                  <a href="#" class="btn-view">View</a>
                  <button class="btn-like">♡</button>
                </td>
              </tr>
            <?php endfor; ?>

          </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination" id="pagination"></div>

      </section>

    </main>
  </div>

  <!-- =========================
     PAGINATION SCRIPT
========================= -->
  <script>
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
          index < page * rowsPerPage ?
          "" :
          "none";
      });

      renderPagination();
    }

    function renderPagination() {
      pagination.innerHTML = "";

      const prev = document.createElement("button");
      prev.textContent = "Prev";
      prev.className = "page-btn";
      prev.disabled = currentPage === 1;
      prev.onclick = () => showPage(currentPage - 1);
      pagination.appendChild(prev);

      for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.className = "page-num" + (i === currentPage ? " active" : "");
        btn.onclick = () => showPage(i);
        pagination.appendChild(btn);
      }

      const next = document.createElement("button");
      next.textContent = "Next";
      next.className = "page-btn";
      next.disabled = currentPage === totalPages;
      next.onclick = () => showPage(currentPage + 1);
      pagination.appendChild(next);
    }

    showPage(1);
  </script>

</body>

</html>