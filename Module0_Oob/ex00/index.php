
<?php

require_once 'TemplateEngine.php';
$engine = new TemplateEngine();
$parameters = [
    "nom" => "Dans les bois",
    "auteur" => "Paul Pierre",
    "description" => "Thriller",
    "prix" => "10.99"
];
$engine->createFile("book.html", "book_description.html", $parameters);
 
echo "Fichier 'book.html' généré avec succès.";

