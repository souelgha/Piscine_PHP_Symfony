<?php

require_once 'Elem.php';
require_once 'TemplateEngine.php';
require_once 'MyException.php';

try{
	$elem = new Elem("html");
	$body = new Elem('body');
	// $bod =  new Elem('bod');
	$head = new Elem('head');


	$head->pushElement(new Elem('meta', 'charset="UTF-8"'));
	$elem->pushElement($head);
	$body->pushElement(new Elem('h1', 'Hello World!', ['class' => 'text-muted']));
	$body->pushElement(new Elem('p', 'This is a paragraph.', ['class' => 'text-muted']));


	$elem->pushElement($body);
	$file= new TemplateEngine($elem);
	$file->createFile('index.html');
}
catch (MyException $e) {
	echo "Caught exception: " . $e->getMessage() . "\n";

}



?>
