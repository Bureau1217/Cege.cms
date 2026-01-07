<div style="display: flex; flex-direction: column; gap: 0.5rem; padding: 0.5rem 0;">
  <?php
  $items = $block->items()->toStructure();
  if ($items->isNotEmpty()):
  ?>
    <?php foreach ($items as $item): ?>
      <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.5rem; background: #f7f7f7; border-radius: 6px; border-left: 3px solid #2563eb;">
        <?php if ($itemIcon = $item->icon()->toFile()): ?>
          <img src="<?= $itemIcon->thumb(['width' => 32, 'height' => 32])->url() ?>"
               alt="<?= $item->title()->html() ?>"
               style="width: 32px; height: 32px; object-fit: contain; flex-shrink: 0; border-radius: 4px;">
        <?php else: ?>
          <div style="width: 32px; height: 32px; background: #e0e0e0; border-radius: 4px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 18px;">
            🖼️
          </div>
        <?php endif; ?>

        <div style="flex: 1; min-width: 0;">
          <?php if ($item->title()->isNotEmpty()): ?>
            <div style="font-weight: 500; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #333;">
              <?php if ($item->number()->isNotEmpty()): ?>
                <span style="color: #16171a; background: #fff; padding: 2px 6px; border-radius: 3px; font-size: 0.75rem; margin-right: 0.5rem; font-weight: 600; border: 1px solid #e0e0e0;">
                  <?= $item->number()->html() ?>
                </span>
              <?php endif; ?>
              <?= $item->title()->html() ?>
            </div>
          <?php else: ?>
            <span style="color: #999; font-style: italic; font-size: 0.875rem;">Item sans titre</span>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>

    <div style="margin-top: 0.25rem; padding: 0.25rem 0; color: #666; font-size: 0.75rem; text-align: center;">
      <?= $items->count() ?> item<?= $items->count() > 1 ? 's' : '' ?>
    </div>
  <?php else: ?>
    <div style="padding: 1rem; text-align: center; color: #999; font-style: italic; background: #f7f7f7; border-radius: 6px; border: 2px dashed #ddd;">
      Cliquez pour ajouter des items avec pictos
    </div>
  <?php endif; ?>
</div>
