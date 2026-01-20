<?php
$pageTitle = "Apply for Loan";
$pageSubtitle = "Borrower";

$userName  = "Borrower";
$userEmail = "borrower@finance.com";

$sidebarLinks = [
  ['key' => 'dashboard',     'label' => 'Dashboard',        'icon' => '📊', 'href' => '/finance-marketing/app/Views/borrower/dashboard.php'],
  ['key' => 'applications',  'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/app/Views/borrower/applications.php'],
  ['key' => 'loans',         'label' => 'My Loans',         'icon' => '💰', 'href' => '/finance-marketing/app/Views/borrower/loans.php'],
];
$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/app/Views/borrower/profile.php'],

  ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
];


$active = '';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Apply for Loan</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/financier-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/apply-loan.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>
    <br>

    <main class="main-content">

      <!-- STEPS -->
      <div class="steps">
        <div class="step active">Loan Details</div>
        <div class="step">Personal Info</div>
        <div class="step">Documents</div>
        <div class="step">Review</div>
      </div>

      <!-- FORM -->
      <form id="loanForm" class="form-card">

        <!-- STEP 1 -->
        <section class="form-step active">
          <h2>Loan Details</h2>
          <p class="muted">Tell us about the loan you need</p>

          <div class="form-grid">
            <div>
              <label>Loan Amount ($)</label>
              <input type="number" placeholder="25,000">
            </div>

            <div>
              <label>Loan Duration</label>
              <select>
                <option>12 months</option>
                <option>24 months</option>
                <option>36 months</option>
              </select>
            </div>
          </div>

          <label>Loan Purpose</label>
          <select>
            <option>Business Expansion</option>
            <option>Equipment Purchase</option>
            <option>Personal Loam</option>
          </select>

          <label>Detailed Description</label>
          <textarea placeholder="Explain how you will use the loan..."></textarea>

          <div class="form-actions">
            <button type="button" class="btn-primary next-btn">Next Step →</button>
          </div>
        </section>

        <!-- STEP 2 -->
        <section class="form-step">
          <h2>Financial Information</h2>
          <p class="muted">Help us understand your financial profile</p>

          <div class="form-grid">
            <div>
              <label>Monthly Income ($)</label>
              <input type="number" value="5000">
            </div>

            <div>
              <label>Employment Status</label>
              <select>
                <option>Full Time</option>
                <option>Self Employed</option>
              </select>
            </div>

            <div>
              <label>Company / Business Name</label>
              <input type="text" placeholder="Your company">
            </div>

            <div>
              <label>Years of Experience</label>
              <input type="number" value="5">
            </div>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-outline prev-btn">← Previous</button>
            <button type="button" class="btn-primary next-btn">Next Step →</button>
          </div>
        </section>

        <!-- STEP 3 -->
        <section class="form-step">
          <h2>Supporting Documents</h2>

          <div class="upload-box">ID Proof <button>Upload</button></div>
          <div class="upload-box">Address Proof <button>Upload</button></div>
          <div class="upload-box">Income Proof <button>Upload</button></div>

          <div class="form-actions">
            <button type="button" class="btn-outline prev-btn">← Previous</button>
            <button type="button" class="btn-primary next-btn">Next Step →</button>
          </div>
        </section>

        <!-- STEP 4 -->
        <section class="form-step">
          <h2>Review Your Application</h2>

          <div class="review-box">
            <strong>Loan Amount:</strong> $25,000<br>
            <strong>Duration:</strong> 24 months<br>
            <strong>Income:</strong> $5,000
          </div>

          <label class="checkbox">
            <input type="checkbox">
            I confirm all details are correct
          </label>

          <div class="form-actions">
            <button type="button" class="btn-outline prev-btn">← Previous</button>
            <button type="submit" class="btn-primary">Submit Application ✓</button>
          </div>
        </section>

      </form>

    </main>
  </div>

  <script>
    const steps = document.querySelectorAll(".form-step");
    const stepLabels = document.querySelectorAll(".step");

    let current = 0;

    function updateSteps() {
      steps.forEach((s, i) => s.classList.toggle("active", i === current));
      stepLabels.forEach((s, i) => s.classList.toggle("active", i <= current));
    }

    document.querySelectorAll(".next-btn").forEach(btn => {
      btn.onclick = () => {
        if (current < steps.length - 1) {
          current++;
          updateSteps();
        }
      };
    });

    document.querySelectorAll(".prev-btn").forEach(btn => {
      btn.onclick = () => {
        if (current > 0) {
          current--;
          updateSteps();
        }
      };
    });
  </script>
</body>

</html>