<?php

require_once 'TemplateEngine.php';
require_once 'Coffee.php';
require_once 'Tea.php';

$engine = new TemplateEngine();
$drink1 = new Tea();
$drink2 = new Coffee();


$engine->createFile($drink1);
echo "Fichier 'Tea.html' généré avec succès.";
$engine->createFile($drink2);
echo "Fichier 'Coffee.html' généré avec succès.";
 
