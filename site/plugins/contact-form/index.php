<?php

Kirby::plugin('cege/contact-form', [
    'hooks' => [
        'route:after' => function () {
            // Traiter les formulaires de contact
            if (r::is('post') && $formId = get('form')) {
                if (strpos($formId, 'contact-form-') === 0) {
                    return handleContactForm();
                }
            }
        }
    ]
]);

function handleContactForm() {
    $kirby = kirby();
    $blockId = get('block_id');

    // Protection honeypot
    if (!empty(get('website'))) {
        return;
    }

    // Récupération des données
    $data = [
        'name'    => get('name'),
        'email'   => get('email'),
        'phone'   => get('phone'),
        'subject' => get('subject'),
        'message' => get('message'),
        'consent' => get('consent')
    ];

    // Validation
    $rules = [
        'name'    => ['required', 'minLength' => 2],
        'email'   => ['required', 'email'],
        'message' => ['required', 'minLength' => 10]
    ];

    $messages = [
        'name'    => 'Veuillez entrer votre nom',
        'email'   => 'Veuillez entrer une adresse email valide',
        'message' => 'Votre message doit contenir au moins 10 caractères'
    ];

    // Vérification de la validation
    if ($invalid = invalid($data, $rules, $messages)) {
        return [
            'errors' => $invalid,
            'data'   => $data
        ];
    }

    // Récupérer l'email de destination depuis le block
    $page = kirby()->site()->homePage(); // ou la page actuelle
    $emailTo = null;

    // Chercher le block dans les pages pour récupérer l'email
    foreach ($kirby->site()->pages()->index() as $p) {
        if ($p->builder()->isNotEmpty()) {
            foreach ($p->builder()->toBlocks() as $block) {
                if ($block->id() === $blockId && $block->type() === 'contact-form') {
                    $emailTo = $block->emailTo()->value();
                    break 2;
                }
            }
        }
    }

    // Email par défaut si non trouvé
    if (empty($emailTo)) {
        $emailTo = option('email', 'contact@example.com');
    }

    // Envoi de l'email
    try {
        $kirby->email([
            'template' => 'contact',
            'from'     => 'noreply@' . $kirby->site()->url()->host(),
            'replyTo'  => $data['email'],
            'to'       => $emailTo,
            'subject'  => 'Nouveau message de contact' . (!empty($data['subject']) ? ': ' . $data['subject'] : ''),
            'data'     => [
                'name'    => esc($data['name']),
                'email'   => esc($data['email']),
                'phone'   => esc($data['phone']),
                'subject' => esc($data['subject']),
                'message' => esc($data['message']),
                'site'    => $kirby->site()
            ]
        ]);

        // Redirection avec succès
        go($kirby->site()->url() . '?form=' . get('form') . '&success=1#' . get('form'));

    } catch (Exception $e) {
        if (option('debug') === true) {
            return [
                'errors' => ['form' => $e->getMessage()],
                'data'   => $data
            ];
        }
        return [
            'errors' => ['form' => 'Une erreur est survenue. Veuillez réessayer.'],
            'data'   => $data
        ];
    }
}
