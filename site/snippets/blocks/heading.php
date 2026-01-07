<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$level = $block->level()->or('h2');
$color = $block->color()->value();
$allowed = ['primary', 'secondary', 'accent', 'neutral', 'dark'];
$colorClass = in_array($color, $allowed, true) ? 'color-' . $color : '';
?>
<<?= $level ?><?= $colorClass ? ' class="' . $colorClass . '"' : '' ?>>
  <?= $block->text() ?>
</<?= $level ?>>
