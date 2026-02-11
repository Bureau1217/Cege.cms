<?php
/**
 * Test webhook - À SUPPRIMER après test
 * Accédez à: https://cms.cegeswiss.com/test-webhook.php
 */

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$githubToken = getenv('GITHUB_TOKEN') ?: ($_ENV['GITHUB_TOKEN'] ?? null);
$githubRepo = getenv('GITHUB_REPO') ?: ($_ENV['GITHUB_REPO'] ?? null);

echo "<h2>Test Webhook GitHub</h2>";
echo "<pre>";

echo "GITHUB_REPO: " . ($githubRepo ? $githubRepo : "NON DÉFINI") . "\n";
echo "GITHUB_TOKEN: " . ($githubToken ? substr($githubToken, 0, 10) . "..." : "NON DÉFINI") . "\n\n";

if (!$githubToken || !$githubRepo) {
    echo "❌ Variables manquantes dans .env\n";
    echo "</pre>";
    exit;
}

$url = "https://api.github.com/repos/{$githubRepo}/dispatches";
echo "URL: $url\n\n";

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Accept: application/vnd.github.v3+json',
        'Authorization: Bearer ' . $githubToken,
        'User-Agent: Kirby-CMS-Webhook',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'event_type' => 'cms-content-update',
        'client_payload' => [
            'triggered_at' => date('c'),
        ],
    ]),
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "HTTP Code: $httpCode\n";

if ($error) {
    echo "Curl Error: $error\n";
}

if ($httpCode === 204) {
    echo "\n✅ SUCCESS! Webhook envoyé. Vérifiez GitHub Actions.\n";
} elseif ($httpCode === 404) {
    echo "\n❌ ERREUR 404: Repo introuvable ou token sans accès\n";
} elseif ($httpCode === 401) {
    echo "\n❌ ERREUR 401: Token invalide\n";
} else {
    echo "\n❌ ERREUR: $response\n";
}

echo "</pre>";
