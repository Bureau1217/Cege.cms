<?php
$sectionName = $block->sectionName()->value();
$hasContent = $block->content()->isNotEmpty();
$contentBlocks = $block->content()->toBlocks();
$blockCount = $contentBlocks->count();
?>

<div style="padding: 0.75rem 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem;">
    <div style="font-weight: 700; font-size: 1.125rem; color: white;">
      <?php if (!empty($sectionName)): ?>
        📄 <?= esc($sectionName) ?>
      <?php else: ?>
        <span style="opacity: 0.8; font-style: italic;">Section sans nom</span>
      <?php endif; ?>
    </div>

    <?php if ($block->addToMenu()->toBool()): ?>
      <span style="background: rgba(255, 255, 255, 0.25); color: white; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem; font-weight: 600; border: 1px solid rgba(255, 255, 255, 0.3);">
        📍 Menu
      </span>
    <?php endif; ?>
  </div>

  <div style="display: flex; gap: 1rem; font-size: 0.8125rem; color: rgba(255, 255, 255, 0.9);">
    <span><?= $block->layout()->or('one-column') ?></span>

    <?php if ($block->backgroundColor()->isNotEmpty() && $block->backgroundColor()->value() !== 'none'): ?>
      <span>• <?= $block->backgroundColor()->value() ?></span>
    <?php endif; ?>

    <span>• <?= $blockCount ?> bloc<?= $blockCount > 1 ? 's' : '' ?></span>
  </div>
</div>
