<?php
// Génération d'un ID unique pour le formulaire
$formId = 'contact-form-' . $block->id();
$submitted = get('form') === $formId && r::data('success');
$errors = get('errors', []);
?>

<div style="max-width: 600px; margin: 0 auto; padding: 2rem 0;">
  <?php if ($block->title()->isNotEmpty()): ?>
    <h3 style="margin: 0 0 0.5rem 0; font-size: 1.75rem; font-weight: 700; text-align: center;">
      <?= $block->title()->html() ?>
    </h3>
  <?php endif; ?>

  <?php if ($block->subtitle()->isNotEmpty()): ?>
    <p style="margin: 0 0 2rem 0; color: #666; text-align: center;">
      <?= $block->subtitle()->html() ?>
    </p>
  <?php endif; ?>

  <?php if ($submitted): ?>
    <!-- Message de succès -->
    <div style="padding: 1.5rem; background: #dcfce7; border: 2px solid #86efac; border-radius: 8px; text-align: center; margin-bottom: 2rem;">
      <div style="font-size: 2rem; margin-bottom: 0.5rem;">✅</div>
      <div style="color: #166534; font-weight: 600;">
        <?= $block->successMessage()->or('Merci ! Votre message a été envoyé avec succès.') ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- Formulaire -->
  <form method="post" action="<?= $page->url() ?>#<?= $formId ?>" id="<?= $formId ?>" style="display: flex; flex-direction: column; gap: 1rem;">
    <input type="hidden" name="form" value="<?= $formId ?>">
    <input type="hidden" name="block_id" value="<?= $block->id() ?>">

    <!-- Honeypot anti-spam -->
    <input type="url" id="website" name="website" tabindex="-1" style="position: absolute; left: -9999px;">

    <?php if ($block->showName()->toBool()): ?>
      <div>
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #16171a;">
          Nom <span style="color: #dc2626;">*</span>
        </label>
        <input type="text"
               name="name"
               required
               value="<?= esc(get('name', '')) ?>"
               style="width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 6px; font-size: 1rem;">
        <?php if (isset($errors['name'])): ?>
          <div style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?= $errors['name'] ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($block->showEmail()->toBool()): ?>
      <div>
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #16171a;">
          Email <span style="color: #dc2626;">*</span>
        </label>
        <input type="email"
               name="email"
               required
               value="<?= esc(get('email', '')) ?>"
               style="width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 6px; font-size: 1rem;">
        <?php if (isset($errors['email'])): ?>
          <div style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?= $errors['email'] ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($block->showPhone()->toBool()): ?>
      <div>
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #16171a;">
          Téléphone
        </label>
        <input type="tel"
               name="phone"
               value="<?= esc(get('phone', '')) ?>"
               style="width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 6px; font-size: 1rem;">
      </div>
    <?php endif; ?>

    <?php if ($block->showSubject()->toBool()): ?>
      <div>
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #16171a;">
          Sujet
        </label>
        <input type="text"
               name="subject"
               value="<?= esc(get('subject', '')) ?>"
               style="width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 6px; font-size: 1rem;">
      </div>
    <?php endif; ?>

    <?php if ($block->showMessage()->toBool()): ?>
      <div>
        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #16171a;">
          Message <span style="color: #dc2626;">*</span>
        </label>
        <textarea name="message"
                  required
                  rows="6"
                  style="width: 100%; padding: 0.75rem; border: 2px solid #e5e7eb; border-radius: 6px; font-size: 1rem; resize: vertical;"><?= esc(get('message', '')) ?></textarea>
        <?php if (isset($errors['message'])): ?>
          <div style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;"><?= $errors['message'] ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($block->requireConsent()->toBool()): ?>
      <div style="display: flex; align-items: start; gap: 0.5rem;">
        <input type="checkbox"
               name="consent"
               required
               id="consent-<?= $formId ?>"
               style="margin-top: 0.25rem;">
        <label for="consent-<?= $formId ?>" style="font-size: 0.875rem; color: #4b5563;">
          J'accepte que mes données soient utilisées pour me recontacter <span style="color: #dc2626;">*</span>
        </label>
      </div>
    <?php endif; ?>

    <button type="submit"
            style="padding: 0.875rem 2rem; background: #2563eb; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">
      <?= $block->buttonLabel()->or('Envoyer le message') ?>
    </button>
  </form>
</div>
