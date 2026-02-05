<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f7f7f7;">
        <div style="background: white; padding: 30px; border-radius: 8px;">
            <h2 style="color: #2563eb; margin-top: 0;">Merci pour votre message</h2>

            <p>Bonjour <?= $name ?>,</p>

            <p>Nous avons bien reçu votre message et nous vous en remercions.</p>

            <p>Notre équipe reviendra vers vous dans les meilleurs délais.</p>

            <p style="margin-top: 30px;">
                Cordialement,<br>
                L'équipe CEGE Swiss
            </p>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 0.875rem; color: #666;">
                <a href="<?= $site->url() ?>" style="color: #2563eb;"><?= $site->title() ?></a>
            </div>
        </div>
    </div>
</body>
</html>
