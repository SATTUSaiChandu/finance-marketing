<?php
// KPI partial — expects $kpis array from controller/view

$kpis = $kpis ?? [];
?>

<section class="kpi-row" role="region" aria-label="Key performance indicators">
  <div class="kpi-row-inner">

    <?php foreach ($kpis as $k):
      $label      = $k['label'] ?? '';
      $value      = $k['value'] ?? '';
      $delta      = $k['delta'] ?? null;
      $deltaSign  = $k['deltaSign'] ?? '+';
      $icon       = $k['icon'] ?? null;
      $meta       = $k['meta'] ?? null;

      $isNegative = ($deltaSign === '-');
    ?>
      <article class="kpi-card" role="article" aria-label="<?= htmlspecialchars($label) ?>">

        <div class="kpi-left">
          <div class="kpi-label"><?= htmlspecialchars($label) ?></div>
          <div class="kpi-value"><?= htmlspecialchars($value) ?></div>

          <?php if ($delta !== null): ?>
            <div class="kpi-delta <?= $isNegative ? 'neg' : 'pos' ?>">
              <span class="kpi-arrow"><?= $isNegative ? '↘' : '↗' ?></span>
              <span class="kpi-delta-text"><?= htmlspecialchars($delta) ?></span>

              <?php if (!empty($meta)): ?>
                <small class="kpi-meta"><?= htmlspecialchars($meta) ?></small>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="kpi-right">
          <?php if (!empty($icon)): ?>
            <div class="kpi-icon"><?= htmlspecialchars($icon) ?></div>
          <?php else: ?>
            <div class="kpi-icon-placeholder"></div>
          <?php endif; ?>
        </div>

      </article>
    <?php endforeach; ?>

  </div>
</section>