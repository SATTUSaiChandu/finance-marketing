<?php

/**
 * Reusable Profile Main Content
 * Used by both Borrower & Financier
 */

$activeTab = $_GET['tab'] ?? 'profile';
?>

<!-- Tabs -->
<div class="settings-tabs">
  <a class="<?= $activeTab === 'profile' ? 'active' : '' ?>" href="?tab=profile">Profile</a>
  <a class="<?= $activeTab === 'security' ? 'active' : '' ?>" href="?tab=security">Security</a>
  <a class="<?= $activeTab === 'documents' ? 'active' : '' ?>" href="?tab=documents">Documents</a>
</div>

<!-- ================= PROFILE ================= -->
<?php if ($activeTab === 'profile'): ?>
  <section class="section-card">

    <h2>Personal Information</h2>

    <div class="profile-photo">
      <div class="avatar">👤</div>
      <button class="btn-secondary">Change Photo</button>
      <small>JPG, PNG. Max 2MB</small>
    </div>

    <div class="form-grid">
      <div>
        <label>First Name</label>
        <input type="text" value="Borrower">
      </div>

      <div>
        <label>Last Name</label>
        <input type="text" value="Smith">
      </div>

      <div>
        <label>Email</label>
        <input type="email" value="borrower@finance.com">
      </div>

      <div>
        <label>Phone</label>
        <input type="text" value="+1 (555) 123-4567">
      </div>

      <div class="full">
        <label>Address</label>
        <input type="text" value="123 Main Street">
      </div>

      <div>
        <label>City</label>
        <input type="text" value="New York">
      </div>

      <div>
        <label>State</label>
        <input type="text" value="NY">
      </div>

      <div>
        <label>ZIP Code</label>
        <input type="text" value="10001">
      </div>
    </div>

    <div class="form-actions">
      <button class="btn-primary">Save Changes</button>
    </div>

  </section>
<?php endif; ?>

<!-- ================= SECURITY ================= -->
<?php if ($activeTab === 'security'): ?>
  <section class="section-card">

    <h2>Change Password</h2>

    <div class="form-grid">
      <div class="full">
        <label>Current Password</label>
        <input type="password">
      </div>

      <div class="full">
        <label>New Password</label>
        <input type="password">
      </div>

      <div class="full">
        <label>Confirm New Password</label>
        <input type="password">
      </div>
    </div>

    <div class="form-actions">
      <button class="btn-primary">Update Password</button>
    </div>

  </section>
<?php endif; ?>

<!-- ================= DOCUMENTS ================= -->
<?php if ($activeTab === 'documents'): ?>
  <section class="section-card">

    <h2>Required Documents</h2>

    <div class="documents-grid">
      <?php
      $docs = [
        'Identity Proof',
        'Address Proof',
        'Income Proof',
        'Bank Statements',
        'Tax Declaration',
        'Account Details',
        'Owner’s Details',
        'Any Other Loan'
      ];
      foreach ($docs as $doc):
      ?>
        <div class="doc-card">
          <div class="doc-title"><?= $doc ?></div>
          <button class="btn-upload">
            Upload Documents ↑
          </button>
        </div>
      <?php endforeach; ?>
    </div>

  </section>
<?php endif; ?>