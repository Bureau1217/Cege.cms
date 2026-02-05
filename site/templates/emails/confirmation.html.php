<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f5f5f5;">
        <div style="background: white; padding: 30px; border-radius: 8px; border-top: 4px solid #ab0d34;">
            <h2 style="color: #373e54; margin-top: 0;">Merci pour votre message</h2>

            <p>Bonjour <?= $name ?>,</p>

            <p>Nous avons bien recu votre message et nous vous en remercions. Notre equipe vous repondra dans les plus brefs delais.</p>

            <div style="margin-top: 20px; padding: 20px; background: #f5f5f5; border-left: 4px solid #e39110; border-radius: 4px;">
                <strong style="display: block; margin-bottom: 10px; color: #373e54;">Recapitulatif de votre message :</strong>
                <?php if (!empty($subject)): ?>
                <p style="margin: 5px 0;"><strong style="color: #373e54;">Sujet :</strong> <?= $subject ?></p>
                <?php endif; ?>
                <p style="margin: 5px 0; white-space: pre-wrap;"><?= $message ?></p>
            </div>

            <p style="margin-top: 20px;">Cordialement,<br><strong style="color: #373e54;">L'equipe CEGE</strong></p>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 0.875rem; color: #666;">
                <a href="<?= $site->url() ?>" style="color: #ab0d34;"><?= $site->url() ?></a>
            </div>
        </div>
    </div>
</body>
</html>
