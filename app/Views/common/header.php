<?php
// Making the header dynamic using variables passed from the page

$pageTitle      = $pageTitle      ?? 'Untitled';
$pageSubtitle   = $pageSubtitle   ?? '';
$todayKPI       = $todayKPI       ?? null;
$totalVerified  = $totalVerified  ?? null;

$userName       = $userName       ?? 'User';
$userEmail      = $userEmail      ?? 'user@example.com';
$userInitial    = strtoupper(substr($userName, 0, 1));
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
      <div class="acct-avatar"><?= strtoupper($userName[0]) ?></div>
      <div class="acct-info">
        <strong><?= htmlspecialchars($userName) ?></strong>
        <small><?= htmlspecialchars($userEmail) ?></small>
      </div>
      <span class="caret">▾</span>
    </label>

    <div class="acct-menu">
      <ul>
        <?php foreach ($accountMenu as $item): ?>
          <li class="<?= $item['class'] ?? '' ?>">
            <a href="<?= htmlspecialchars($item['href']) ?>">
              <?= htmlspecialchars($item['label']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>

</header>