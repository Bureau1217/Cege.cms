<?php

$data = [
  'contact' => [
    'titre' => $page->contact_titre()->value(),
    'blocks' => $page->contact()->toBlocks(),
  ],
  'formulaire' => [
    'titre' => $page->formulaire_titre()->value(),
    'blocks' => $page->formulaire()->toBlocks(),
  ],
];

echo json_encode($data);
