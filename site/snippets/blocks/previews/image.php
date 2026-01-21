<?php
$file = $block->image()->toFile();
$alt = $block->alt()->value();
?>

<div style="padding: 0.5rem; border: 1px solid rgba(0,0,0,0.08); border-radius: 8px; background: #f7f7f7;">
  <?php if ($file): ?>
    <img
      src="<?= $file->resize(1400)->url() ?>"
      alt="<?= esc($alt) ?>"
      style="display: block; width: 100%; max-height: 220px; object-fit: cover; border-radius: 6px;"
    />
  <?php else: ?>
    <div style="padding: 0.75rem; color: #666; font-size: 0.875rem;">
      No image selected
    </div>
  <?php endif; ?>
</div>
