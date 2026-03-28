<?php

require_once 'TemplateEngine.php';
require_once 'Text.php';
$engine = new TemplateEngine();
$texts = new Text([
    "Dans les bois",
    "Auteur : Paul Pierre",
    "Description : Thriller",
    
]);
$texts->append("Prix : 19.99");

$engine->createFile("bookCreated.html", $texts);
echo "Fichier 'bookCreated.html' généré avec succès.";

?>
