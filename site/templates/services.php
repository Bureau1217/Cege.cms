<?php

header('Content-Type: application/json');

// Fonction pour convertir les blocs en tableau
function blocksToArray($blocks) {
  $result = [];
  foreach ($blocks as $block) {
    $result[] = [
      'id' => $block->id(),
      'type' => $block->type(),
      'content' => $block->content()->toArray(),
      'isHidden' => $block->isHidden(),
    ];
  }
  return $result;
}

// Récupérer toutes les images de la page
$images = [];
foreach ($page->files() as $file) {
  if ($file->type() === 'image') {
    $images[] = [
      'uuid' => $file->uuid()->toString(),
      'url' => $file->url(),
      'alt' => $file->alt()->value(),
      'title' => $file->title()->value(),
      'reg' => [
        'url' => $file->url()
      ]
    ];
  }
}

$data = [
  'nosServices' => [
    'titre' => $page->nosServices_titre()->value(),
    'colonneGauche' => blocksToArray($page->nosServices_colonne_gauche()->toBlocks()),
    'colonneDroite' => blocksToArray($page->nosServices_colonne_droite()->toBlocks()),
  ],
  'notreDemarche' => [
    'titre' => $page->notreDemarche_titre()->value(),
    'blocks' => blocksToArray($page->notreDemarche()->toBlocks()),
  ],
  'images' => $images,
];

echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
