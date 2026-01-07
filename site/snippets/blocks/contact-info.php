<?php
$items = $block->items()->toStructure();
$layout = $block->layout()->or('grid');

// Icônes par défaut selon le type
$defaultIcons = [
    'address' => '📍',
    'phone' => '📞',
    'email' => '✉️',
    'hours' => '🕐',
    'social' => '🌐',
    'custom' => '💬'
];
?>

<div style="padding: 1rem 0;">
  <?php if ($block->title()->isNotEmpty()): ?>
    <h3 style="margin: 0 0 2rem 0; font-size: 1.75rem; font-weight: 700;">
      <?= $block->title()->html() ?>
    </h3>
  <?php endif; ?>

  <?php if ($items->isNotEmpty()): ?>
    <div style="display: <?= $layout === 'grid' ? 'grid' : 'flex' ?>; <?= $layout === 'grid' ? 'grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));' : 'flex-direction: column;' ?> gap: 1.5rem;">
      <?php foreach ($items as $item): ?>
        <?php
        $itemType = $item->type()->or('custom');
        $hasLink = $item->link()->isNotEmpty();
        $isHighlight = $item->highlight()->toBool();
        ?>

        <div style="display: flex; gap: 1rem; padding: 1.5rem; background: <?= $isHighlight ? '#f0f9ff' : '#f7f7f7' ?>; border-radius: 8px; border: 2px solid <?= $isHighlight ? '#2563eb' : '#e0e0e0' ?>; <?= $hasLink ? 'cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;' : '' ?>"
             <?php if ($hasLink): ?>
             onclick="window.<?= strpos($item->link()->value(), 'http') === 0 ? 'open' : 'location.href' ?>='<?= $item->link()->html() ?>'"
             onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';"
             <?php endif; ?>
        >
          <!-- Icône -->
          <div style="flex-shrink: 0;">
            <?php if ($itemIcon = $item->icon()->toFile()): ?>
              <img src="<?= $itemIcon->thumb(['width' => 48, 'height' => 48])->url() ?>"
                   alt="<?= $item->label()->html() ?>"
                   style="width: 48px; height: 48px; object-fit: contain;">
            <?php else: ?>
              <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; font-size: 2rem; background: <?= $isHighlight ? '#dbeafe' : 'white' ?>; border-radius: 8px;">
                <?= $defaultIcons[$itemType] ?? '💬' ?>
              </div>
            <?php endif; ?>
          </div>

          <!-- Contenu -->
          <div style="flex: 1; min-width: 0;">
            <?php if ($item->label()->isNotEmpty()): ?>
              <div style="font-weight: 600; color: <?= $isHighlight ? '#1e40af' : '#16171a' ?>; margin-bottom: 0.5rem; font-size: 1rem;">
                <?= $item->label()->html() ?>
              </div>
            <?php endif; ?>

            <?php if ($item->content()->isNotEmpty()): ?>
              <div style="color: #4b5563; line-height: 1.6; font-size: 0.9375rem; white-space: pre-wrap; overflow-wrap: break-word;">
                <?= $item->content()->kt() ?>
              </div>
            <?php endif; ?>

            <?php if ($hasLink): ?>
              <div style="margin-top: 0.5rem; font-size: 0.8125rem; color: #2563eb; font-weight: 500;">
                <?php if (strpos($item->link()->value(), 'tel:') === 0): ?>
                  Appeler →
                <?php elseif (strpos($item->link()->value(), 'mailto:') === 0): ?>
                  Envoyer un email →
                <?php else: ?>
                  Voir plus →
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0; color: #666; font-size: 0.75rem; text-align: center;">
      <?= $items->count() ?> information<?= $items->count() > 1 ? 's' : '' ?> de contact
    </div>
  <?php else: ?>
    <div style="padding: 2rem; text-align: center; color: #999; font-style: italic; background: #f7f7f7; border-radius: 8px; border: 2px dashed #ddd;">
      Cliquez pour ajouter vos coordonnées
    </div>
  <?php endif; ?>
</div>
