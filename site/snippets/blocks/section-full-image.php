<div style="position: relative; border-radius: 8px; overflow: hidden; border: 2px solid #e0e0e0;">
  <?php if ($block->image()->toFile()): ?>
    <img src="<?= $block->image()->toFile()->thumb(['width' => 800])->url() ?>"
         alt="<?= $block->sectionName()->html() ?>"
         style="width: 100%; height: 200px; object-fit: cover; display: block;">

    <?php if ($block->overlay()->toBool()): ?>
      <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.4);"></div>
    <?php endif; ?>

    <div style="position: absolute; bottom: 0.5rem; left: 0.5rem; right: 0.5rem; background: rgba(255, 255, 255, 0.9); padding: 0.5rem; border-radius: 4px; font-size: 0.875rem;">
      <?php if ($block->sectionName()->isNotEmpty()): ?>
        <strong><?= $block->sectionName()->html() ?></strong>
      <?php else: ?>
        <span style="color: #999; font-style: italic;">Section image pleine page</span>
      <?php endif; ?>

      <span style="color: #666; margin-left: 0.5rem;">
        • Hauteur: <?= $block->height()->or('large') ?>
      </span>

      <?php if ($block->overlay()->toBool()): ?>
        <span style="color: #666;"> • Assombri</span>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div style="padding: 3rem; text-align: center; background: #f7f7f7; border: 2px dashed #ddd;">
      <div style="font-size: 3rem; margin-bottom: 0.5rem;">🖼️</div>
      <div style="color: #999; font-style: italic;">
        Cliquez pour ajouter une image pleine page
      </div>
    </div>
  <?php endif; ?>
</div>
