<?php

require_once 'TemplateEngine.php';
$engine = new TemplateEngine();
$texts = new Text([
    "Dans les bois",
    "Auteur : Paul Pierre",
    "Description : Thriller",
    "prix : 10.99" 
]);

if($texts->isEmpty()){
	throw new Exception("No data to write");
	return;	
}
else {
	$engine->createFile("book1.html", $texts);
	echo "Fichier 'book1.html' généré avec succès.";	
	
}
