<?php

require_once 'TemplateEngine.php';
$engine = new TemplateEngine();
$texts = new Text([
    "Dans les bois",
    "Auteur : Paul Pierre",
    "Description : Thriller",
    "prix : 10.99 &euro;"
]);


$engine->createFile("book.html", $texts);
 
echo "Fichier 'book.html' généré avec succès.";