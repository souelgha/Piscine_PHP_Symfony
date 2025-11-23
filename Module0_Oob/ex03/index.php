<?php

require_once 'Elem.php';
require_once 'TemplateEngine.php';

$elem = new Elem("html");
$body = new Elem('body');
$bod =  new Elem('bod');
$head = new Elem('head');


$head->pushElement(new Elem('meta', 'charset="UTF-8"'));
$elem->pushElement($head);
$body->pushElement(new Elem('h1', 'Hello World!'));
$body->pushElement(new Elem('p', 'This is a paragraph.'));
$body->pushElement(new Elem('img', 'src="image.jpg" alt="An image"'));

$file= new TemplateEngine($body);
$file->createFile('index1.html');

$elem->pushElement($body);
$file= new TemplateEngine($elem);
$file->createFile('index.html');

?>
