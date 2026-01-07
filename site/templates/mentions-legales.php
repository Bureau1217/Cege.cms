<?php
echo '<h1>' . $page->title() . '</h1>';
echo $page->texte()->toBlocks()->toHtml();
