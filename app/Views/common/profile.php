<?php
$profile = $profile ?? [];
$user    = $user ?? [];
$role    = $role ?? 'borrower';
$base    = $base ?? '/finance-marketing/public';

$profileAction = $role === 'financier'
  ? "{$base}/financier/profile"
  : "{$base}/borrower/profile";

$uploadAction = $role === 'financier'
  ? "{$base}/financier/upload-document"
  : "{$base}/borrower/upload-document";

$activeTab = $_GET['tab'] ?? 'profile';

$allowedTabs = ['profile', 'security', 'documents'];
if (!in_array($activeTab, $allowedTabs, true)) {
  $activeTab = 'profile';
}
?>


<!-- ================= TABS ================= -->
<nav class="settings-tabs" role="tablist">
  <?php foreach ($allowedTabs as $tab): ?>
    <a
      role="tab"
      class="<?= $activeTab === $tab ? 'active' : '' ?>"
      href="?tab=<?= $tab ?>">
      <?= ucfirst($tab) ?>
    </a>
  <?php endforeach; ?>
</nav>

<!-- ================= FLASH MESSAGES ================= -->
<?php if (!empty($_SESSION['error'])): ?>
  <div class="alert error"><?= htmlspecialchars($_SESSION['error']) ?></div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
  <div class="alert success"><?= htmlspecialchars($_SESSION['success']) ?></div>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- ================================================= -->
<!-- ================= PROFILE TAB ================== -->
<!-- ================================================= -->
<?php if ($activeTab === 'profile'): ?>
  <section class="section-card">

    <h2>Personal Information</h2>

    <form method="POST" action="<?= $profileAction ?>">
      <input type="hidden" name="_action" value="save_profile">

      <div class="form-grid">

        <!-- FIRST NAME -->
        <div>
          <label>First Name</label>
          <input type="text"
            name="first_name"
            value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
            required>
        </div>

        <!-- LAST NAME -->
        <div>
          <label>Last Name</label>
          <input type="text"
            name="last_name"
            value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
            required>
        </div>

        <!-- EMAIL -->
        <div>
          <label>Email</label>
          <input type="email"
            value="<?= htmlspecialchars($user['email'] ?? '') ?>"
            disabled>
        </div>

        <!-- PHONE -->
        <div>
          <label>Phone</label>
          <input type="text"
            name="phone"
            value="<?= htmlspecialchars($profile['phone'] ?? '') ?>">
        </div>

        <!-- ADDRESS (BOTH ROLES) -->
        <div class="full">
          <label>Address</label>
          <input type="text"
            name="address"
            value="<?= htmlspecialchars($profile['address'] ?? '') ?>"
            required>
        </div>

        <!-- EXTRA FIELDS (BORROWER ONLY) -->
        <?php if ($role === 'borrower'): ?>
          <div>
            <label>City</label>
            <input type="text"
              name="city"
              value="<?= htmlspecialchars($profile['city'] ?? '') ?>">
          </div>

          <div>
            <label>State</label>
            <input type="text"
              name="state"
              value="<?= htmlspecialchars($profile['state'] ?? '') ?>">
          </div>

          <div>
            <label>ZIP Code</label>
            <input type="text"
              name="zip"
              value="<?= htmlspecialchars($profile['zip'] ?? '') ?>">
          </div>
        <?php endif; ?>

      </div>

      <div class="form-actions">
        <button type="submit" class="btn-primary">Save Changes</button>
      </div>

    </form>
  </section>
<?php endif; ?>

<!-- ================================================= -->
<!-- ================= SECURITY TAB ================= -->
<!-- ================================================= -->
<?php if ($activeTab === 'security'): ?>
  <section class="section-card">

    <h2>Change Password</h2>

    <form method="POST" action="<?= $profileAction ?>">
      <input type="hidden" name="_action" value="change_password">

      <div class="form-grid">
        <div class="full">
          <label>Current Password</label>
          <input type="password" name="current_password" required>
        </div>

        <div class="full">
          <label>New Password</label>
          <input type="password" name="new_password" minlength="8" required>
        </div>

        <div class="full">
          <label>Confirm New Password</label>
          <input type="password" name="confirm_password" required>
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn-primary">Update Password</button>
      </div>
    </form>

  </section>
<?php endif; ?>

<!-- ================================================= -->
<!-- ================= DOCUMENTS TAB ================ -->
<!-- ================================================= -->
<?php if ($activeTab === 'documents'): ?>
  <section class="section-card">

    <h2>Required Documents</h2>

    <div class="documents-grid">
      <?php
      $docs = [
        'identity' => 'Identity Proof',
        'address'  => 'Address Proof',
        'income'   => 'Income Proof',
        'bank'     => 'Bank Statements',
        'tax'      => 'Tax Declaration',
      ];

      foreach ($docs as $type => $label):
      ?>
        <form method="POST"
          enctype="multipart/form-data"
          action="<?= $uploadAction ?>"
          class="doc-card">

          <div class="doc-title"><?= htmlspecialchars($label) ?></div>

          <input type="hidden" name="doc_type" value="<?= $type ?>">
          <input type="file" name="document" required>

          <button type="submit" class="btn-upload">Upload ↑</button>
        </form>
      <?php endforeach; ?>
    </div>

  </section>
<?php endif; ?>