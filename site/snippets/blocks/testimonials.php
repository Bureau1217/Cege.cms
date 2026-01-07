<?php
$testimonials = $block->testimonials()->toStructure();
$columns = $block->columns()->or('3');
?>

<div style="padding: 1rem 0;">
  <?php if ($block->title()->isNotEmpty()): ?>
    <h3 style="margin: 0 0 2rem 0; font-size: 1.75rem; font-weight: 700; text-align: center;">
      <?= $block->title()->html() ?>
    </h3>
  <?php endif; ?>

  <?php if ($testimonials->isNotEmpty()): ?>
    <div style="display: grid; grid-template-columns: repeat(<?= $columns ?>, 1fr); gap: 1.5rem;">
      <?php foreach ($testimonials as $testimonial): ?>
        <div style="padding: 1.5rem; background: #fff; border: 2px solid #e5e7eb; border-radius: 12px; display: flex; flex-direction: column; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">

          <!-- Étoiles -->
          <div style="display: flex; gap: 0.25rem; margin-bottom: 1rem;">
            <?php
            $rating = $testimonial->rating()->toInt();
            for ($i = 1; $i <= 5; $i++):
            ?>
              <span style="color: <?= $i <= $rating ? '#facc15' : '#e5e7eb' ?>; font-size: 1.25rem;">★</span>
            <?php endfor; ?>
          </div>

          <!-- Commentaire -->
          <?php if ($testimonial->comment()->isNotEmpty()): ?>
            <div style="flex: 1; margin-bottom: 1rem; color: #4b5563; line-height: 1.6; font-size: 0.9375rem;">
              "<?= $testimonial->comment()->kt() ?>"
            </div>
          <?php endif; ?>

          <!-- Auteur -->
          <div style="display: flex; align-items: center; gap: 0.75rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
            <!-- Avatar avec initiales -->
            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem; flex-shrink: 0;">
              <?php
              $name = $testimonial->name()->value();
              $initials = '';
              if (!empty($name)) {
                $parts = explode(' ', $name);
                $initials = strtoupper(substr($parts[0], 0, 1));
                if (isset($parts[1])) {
                  $initials .= strtoupper(substr($parts[1], 0, 1));
                }
              }
              echo $initials ?: '?';
              ?>
            </div>

            <div style="flex: 1; min-width: 0;">
              <?php if ($testimonial->name()->isNotEmpty()): ?>
                <div style="font-weight: 600; color: #16171a; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  <?= $testimonial->name()->html() ?>
                </div>
              <?php endif; ?>

              <div style="display: flex; gap: 0.5rem; font-size: 0.8125rem; color: #9ca3af; margin-top: 0.125rem;">
                <?php if ($testimonial->role()->isNotEmpty()): ?>
                  <span><?= $testimonial->role()->html() ?></span>
                <?php endif; ?>

                <?php if ($testimonial->role()->isNotEmpty() && $testimonial->date()->isNotEmpty()): ?>
                  <span>•</span>
                <?php endif; ?>

                <?php if ($testimonial->date()->isNotEmpty()): ?>
                  <span><?= $testimonial->date()->html() ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #e0e0e0; color: #666; font-size: 0.75rem; text-align: center;">
      <?= $testimonials->count() ?> témoignage<?= $testimonials->count() > 1 ? 's' : '' ?>
    </div>
  <?php else: ?>
    <div style="padding: 3rem; text-align: center; color: #999; font-style: italic; background: #f7f7f7; border-radius: 8px; border: 2px dashed #ddd;">
      Cliquez pour ajouter des témoignages
    </div>
  <?php endif; ?>
</div>
