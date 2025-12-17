<?php
// sidebar.php (partial, NO <html>, NO <head>, NO <body>)

// Data passed from page:
$sidebarLinks = $sidebarLinks ?? [];
$active       = $active       ?? ''; // which item is active
?>

<aside class="sidebar" aria-label="Main navigation">
  <div>
    <div class="brand">
      <div class="logo">
        <img src="/finance-marketing/public/assets/images/Application Logo.png" alt="FinanceHub logo" class="logo-img" />
      </div>
      <div>
        <div class="brand-title">Financement Faciele</div>
      </div>
    </div>

    <nav class="sidenav" aria-label="Primary">
      <ul>
        <?php foreach ($sidebarLinks as $item): ?>
          <li>
            <a
              href="<?= htmlspecialchars($item['href']) ?>"
              class="nav-item <?= $item['key'] === $active ? 'active' : '' ?>">
              <span class="nav-ico"><?= htmlspecialchars($item['icon']) ?></span>
              <span class="nav-label"><?= htmlspecialchars($item['label']) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>

  <div class="sidebar-footer">
    <a href="/finance-marketing/app/Views/common/contact.php" class="help-btn">❓ Help &amp; Support</a>
  </div>
</aside>