<?php
$pageTitle = "Apply for Loan";
$pageSubtitle = "Borrower";

$userName  = $user['first_name'];
$userEmail = $user['email'];

$sidebarLinks = [
  ['key' => 'dashboard',    'label' => 'Dashboard',        'icon' => '📊', 'href' => '/finance-marketing/public/borrower'],
  ['key' => 'applications', 'label' => 'My Applications', 'icon' => '📄', 'href' => '/finance-marketing/public/borrower/my-applications'],
  ['key' => 'loans',        'label' => 'My Loans',         'icon' => '💰', 'href' => '/finance-marketing/public/borrower/loans'],
];

$accountMenu = [
  ['label' => 'Profile', 'href' => '/finance-marketing/public/borrower/profile']
];

$active = '';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Apply for Loan</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/borrower/apply-loan.css">
</head>

<body>

  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <?php include __DIR__ . '/../common/header.php'; ?>

    <main class="main-content">

      <!-- STEPS -->
      <div class="steps">
        <div class="step active">Loan Details</div>
        <div class="step">Financial Info</div>
        <div class="step">Review</div>
      </div>

      <!-- FORM -->
      <form
        id="loanForm"
        class="form-card"
        method="POST"
        action="/finance-marketing/public/borrower/apply-loan">

        <!-- STEP 1 -->
        <section class="form-step active">
          <h2>Loan Details</h2>

          <div class="form-grid">
            <div>
              <label>Loan Amount ($)</label>
              <input type="number" name="amount" required>
            </div>

            <div>
              <label>Loan Duration</label>
              <select name="term" required>
                <option value="12">12 months</option>
                <option value="24">24 months</option>
                <option value="36">36 months</option>
              </select>
            </div>
          </div>

          <label>Loan Purpose</label>
          <select name="purpose" required>
            <option value="Business Expansion">Business Expansion</option>
            <option value="Equipment Purchase">Equipment Purchase</option>
            <option value="Personal Loan">Personal Loan</option>
          </select>

          <label>Detailed Description</label>
          <textarea name="description" required></textarea>

          <div class="form-actions">
            <button type="button" class="btn-primary next-btn">Next Step →</button>
          </div>
        </section>

        <!-- STEP 2 -->
        <section class="form-step">
          <h2>Financial Information</h2>

          <div class="form-grid">
            <div>
              <label>Monthly Income ($)</label>
              <input type="number" name="monthly_income" required>
            </div>

            <div>
              <label>Employment Status</label>
              <select name="employment_status" required>
                <option value="Full Time">Full Time</option>
                <option value="Self Employed">Self Employed</option>
              </select>
            </div>

            <div>
              <label>Company / Business Name</label>
              <input type="text" name="company_name">
            </div>

            <div>
              <label>Years of Experience</label>
              <input type="number" name="experience_years">
            </div>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-outline prev-btn">← Previous</button>
            <button type="button" class="btn-primary next-btn">Next Step →</button>
          </div>
        </section>

        <!-- STEP 3 -->
        <section class="form-step">
          <h2>Review Your Application</h2>

          <p class="muted">
            Review your information before submission.
          </p>

          <label class="checkbox">
            <input type="checkbox" required>
            I confirm all details are correct
          </label>

          <div class="form-actions">
            <button type="button" class="btn-outline prev-btn">← Previous</button>
            <button type="submit" class="btn-primary">
              Submit Application ✓
            </button>
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
      btn.onclick = () => current < steps.length - 1 && (++current, updateSteps());
    });

    document.querySelectorAll(".prev-btn").forEach(btn => {
      btn.onclick = () => current > 0 && (--current, updateSteps());
    });
  </script>

</body>

</html>