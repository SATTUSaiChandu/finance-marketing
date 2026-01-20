<?php
// Header partial — receives variables from controller/view

$pageTitle     = $pageTitle     ?? 'Untitled';
$pageSubtitle  = $pageSubtitle  ?? '';

$userName      = $userName      ?? 'User';
$userEmail     = $userEmail     ?? 'user@example.com';
$userInitial   = strtoupper(substr($userName, 0, 1));

$accountMenu   = $accountMenu  ?? [];
?>

<header class="topbar">
  <div class="title-left">
    <h1><?= htmlspecialchars($pageTitle) ?></h1>

    <?php if (!empty($pageSubtitle)): ?>
      <span class="role-pill"><?= htmlspecialchars($pageSubtitle) ?></span>
    <?php endif; ?>
  </div>

  <div class="account-area">

    <input type="checkbox" id="acct-toggle" class="acct-checkbox">

    <label for="acct-toggle" class="acct-toggle">
      <div class="acct-avatar"><?= htmlspecialchars($userInitial) ?></div>

      <div class="acct-info">
        <strong><?= htmlspecialchars($userName) ?></strong>
        <small><?= htmlspecialchars($userEmail) ?></small>
      </div>

      <span class="caret">▾</span>
    </label>

    <?php if (!empty($accountMenu)): ?>
      <div class="acct-menu">
        <ul>
          <?php foreach ($accountMenu as $item): ?>
            <li class="<?= htmlspecialchars($item['class'] ?? '') ?>">
              <a href="<?= htmlspecialchars($item['href']) ?>">
                <?= htmlspecialchars($item['label']) ?>
              </a>
            </li>
          <?php endforeach; ?>
          <li class="menu-logout"><a href="/finance-marketing/public/auth/logout">Logout</a></li>
        </ul>
      </div>
    <?php endif; ?>

  </div>
</header>