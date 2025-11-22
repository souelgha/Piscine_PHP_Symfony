<?php

require_once 'Elem.php';

$elem = new Elem("html");
$body =  new Elem('body');

$body->pushElement(new Elem('h1', 'Hello World!'));
$body->pushElement(new Elem('p', 'This is a paragraph.'));
$elem->pushElement($body);
echo $elem->getHTML(), "\n";
?>
