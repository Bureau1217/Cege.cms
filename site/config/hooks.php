<?php

/**
 * Trigger GitHub Actions rebuild when content changes
 */
function triggerGitHubRebuild(): void
{
    $githubToken = $_ENV['GITHUB_TOKEN'] ?? null;
    $githubRepo = $_ENV['GITHUB_REPO'] ?? null; // format: "username/repo"

    if (!$githubToken || !$githubRepo) {
        return;
    }

    $url = "https://api.github.com/repos/{$githubRepo}/dispatches";

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

    curl_exec($ch);
    curl_close($ch);
}

return [
    // Triggered when a page is created
    'page.create:after' => function () {
        triggerGitHubRebuild();
    },

    // Triggered when a page is updated
    'page.update:after' => function () {
        triggerGitHubRebuild();
    },

    // Triggered when a page is deleted
    'page.delete:after' => function () {
        triggerGitHubRebuild();
    },

    // Triggered when a page is published
    'page.changeStatus:after' => function () {
        triggerGitHubRebuild();
    },

    // Triggered when site settings are updated
    'site.update:after' => function () {
        triggerGitHubRebuild();
    },
];
