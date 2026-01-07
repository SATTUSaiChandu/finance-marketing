<?php
$pageTitle    = "My Loans";
$pageSubtitle = "Borrower";

$userName  = "Borrower";
$userEmail = "borrower@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/borrower/dashboard.php'],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/borrower/my-applications.php'],
  ['key' => 'loans', 'label' => 'My Loans', 'icon' => '💰', 'href' => '/finance-marketing/app/Views/borrower/my-loans.php'],
];


$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/borrower/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];
$active = 'loans';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>My Loans — Borrower</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/my-loans.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- KPI component (already common) -->
      <?php include __DIR__ . '/../common/kpis.php'; ?>

      <!-- Loans -->
      <section class="loans-list">

        <!-- LOAN CARD -->
        <div class="loan-card">

          <div class="loan-summary" onclick="toggleLoan(this)">
            <div>
              <strong>LOAN-001</strong>
              <div class="muted">$15,000 · 24 months</div>
            </div>

            <div class="loan-status active">Active</div>

            <div>
              <div class="muted">Next Payment</div>
              <strong>$520</strong>
            </div>

            <div class="loan-progress">
              <div class="progress-bar">
                <span style="width:42%"></span>
              </div>
              <small>42% paid</small>
            </div>

            <div class="loan-toggle">View details ⌄</div>
          </div>

          <!-- EXPANDED DETAILS -->
          <div class="loan-details">

            <div class="details-grid">
              <div>
                <h4>Loan Details</h4>
                <p><strong>Amount:</strong> $15,000</p>
                <p><strong>APR:</strong> 7.2%</p>
                <p><strong>Duration:</strong> 24 months</p>
                <p><strong>Status:</strong> Active</p>
              </div>

              <div>
                <h4>Financier</h4>
                <p><strong>Name:</strong> Alpha Capital</p>
                <p><strong>Email:</strong> support@alphacapital.com</p>
                <p><strong>Location:</strong> Paris, FR</p>
              </div>

              <div>
                <h4>Repayment Summary</h4>
                <p><strong>Paid:</strong> $6,300</p>
                <p><strong>Remaining:</strong> $8,700</p>
                <p><strong>Next Due:</strong> Dec 15, 2025</p>
              </div>
            </div>

            <div class="loan-actions">
              <a href="#" class="btn-secondary">Contact Financier</a>
              <a href="#" class="btn-primary">Download Agreement</a>
            </div>

          </div>
        </div>

        <!-- Duplicate loan-card for other loans -->

      </section>

    </main>
  </div>

  <script>
    function toggleLoan(el) {
      const card = el.parentElement;
      card.classList.toggle('open');
    }
  </script>

</body>

</html>