<?php

$kpis = $kpis ?? [];
$assetsBase = $assetsBase ?? '/assets';
?>

<section class="kpi-row" role="region" aria-label="Key performance indicators">
  <div class="kpi-row-inner">
    <?php foreach ($kpis as $k):
      $label = $k['label'] ?? '';
      $value = $k['value'] ?? '';
      $delta = $k['delta'] ?? '';
      $deltaSign = $k['deltaSign'] ?? '';
      $icon = $k['icon'] ?? null;
      $meta = $k['meta'] ?? '';
    ?>
      <article class="kpi-card" role="article" aria-label="<?= htmlspecialchars($label) ?>">
        <div class="kpi-left">
          <div class="kpi-label"><?= htmlspecialchars($label) ?></div>
          <div class="kpi-value"><?= htmlspecialchars($value) ?></div>
          <?php if ($delta !== ''): ?>
            <div class="kpi-delta <?= $deltaSign === '-' ? 'neg' : 'pos' ?>">
              <span class="kpi-arrow"><?= $deltaSign === '-' ? '↘' : '↗' ?></span>
              <span class="kpi-delta-text"><?= htmlspecialchars($delta) ?></span>
              <?php if ($meta): ?><small class="kpi-meta"><?= htmlspecialchars($meta) ?></small><?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="kpi-right">
          <?php if ($icon): ?>
            <div class="kpi-icon"><?= $icon ?></div>
          <?php else: ?>
            <div class="kpi-icon-placeholder"></div>
          <?php endif; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>