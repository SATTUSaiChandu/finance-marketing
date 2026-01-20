<?php

/**
 * Sidebar partial
 * - No <html>, <head>, <body>
 * - Reusable across Admin / Agent / Borrower / Financier
 */

/* Data passed from controller/page */
$sidebarLinks = $sidebarLinks ?? [];
$active       = $active       ?? '';
?>

<aside class="sidebar" aria-label="Main navigation">
  <div class="sidebar-top">

    <!-- Brand -->
    <div class="brand">
      <div class="logo">
        <img
          src="/finance-marketing/public/assets/images/Application Logo.png"
          alt="Financement Faciele logo"
          class="logo-img" />
      </div>

      <div class="brand-text">
        <div class="brand-title">Financement Faciele</div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="sidenav" aria-label="Primary navigation">
      <ul>
        <?php foreach ($sidebarLinks as $item): ?>
          <?php
          $key   = $item['key']   ?? '';
          $label = $item['label'] ?? '';
          $icon  = $item['icon']  ?? '';
          $href  = $item['href']  ?? '#';
          ?>

          <li>
            <a
              href="<?= htmlspecialchars($href) ?>"
              class="nav-item <?= $key === $active ? 'active' : '' ?>"
              aria-current="<?= $key === $active ? 'page' : 'false' ?>">

              <?php if ($icon !== ''): ?>
                <span class="nav-ico"><?= htmlspecialchars($icon) ?></span>
              <?php endif; ?>

              <span class="nav-label"><?= htmlspecialchars($label) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

  </div>

  <!-- Footer -->
  <div class="sidebar-footer">
    <a
      href="/finance-marketing/app/Views/common/contact.php"
      class="help-btn">
      ❓ Help &amp; Support
    </a>
  </div>
</aside>