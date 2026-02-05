<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f5f5f5;">
        <div style="background: white; padding: 30px; border-radius: 8px; border-top: 4px solid #ab0d34;">
            <h2 style="color: #373e54; margin-top: 0;">Nouveau message de contact</h2>

            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><strong style="color: #373e54;">Nom :</strong></td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><?= $name ?></td>
                </tr>
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><strong style="color: #373e54;">Email :</strong></td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;">
                        <a href="mailto:<?= $email ?>" style="color: #ab0d34;"><?= $email ?></a>
                    </td>
                </tr>
                <?php if (!empty($phone)): ?>
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><strong style="color: #373e54;">Telephone :</strong></td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><?= $phone ?></td>
                </tr>
                <?php endif; ?>
                <?php if (!empty($subject)): ?>
                <tr>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><strong style="color: #373e54;">Sujet :</strong></td>
                    <td style="padding: 10px 0; border-bottom: 1px solid #e5e7eb;"><?= $subject ?></td>
                </tr>
                <?php endif; ?>
            </table>

            <div style="margin-top: 20px; padding: 20px; background: #f5f5f5; border-left: 4px solid #e39110; border-radius: 4px;">
                <strong style="display: block; margin-bottom: 10px; color: #373e54;">Message :</strong>
                <p style="margin: 0; white-space: pre-wrap;"><?= $message ?></p>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 0.875rem; color: #666;">
                Envoye depuis <a href="<?= $site->url() ?>" style="color: #ab0d34;"><?= $site->url() ?></a>
            </div>
        </div>
    </div>
</body>
</html>
