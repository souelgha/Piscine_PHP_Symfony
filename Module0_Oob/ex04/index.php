<?php

require_once 'Elem.php';
require_once 'TemplateEngine.php';
require_once 'MyException.php';

try{
	$elem = new Elem("html");
	$head = new Elem('head');
	$body = new Elem('body');
	$table= new Elem('table');
	$tr= new Elem('tr');
	
	// $bod =  new Elem('bod');
	


	$head->pushElement(new Elem('meta', 'charset="UTF-8"'));
	$head->pushElement(new Elem('title', 'Mon HTML'));
	$elem->pushElement($head);

	$body->pushElement(new Elem('h1', 'Hello World!', ['class' => 'text-muted']));
	$body->pushElement(new Elem('p', 'This is a paragraph.', ['class' => 'text-muted']));
	
	
	$tr->pushElement(new Elem('th', 'Cell name'));
	$tr->pushElement(new Elem('td', 'Cell 1'));
	$table->pushElement($tr);
	$body->pushElement($table);


	$elem->pushElement($body);
	$file= new TemplateEngine($elem);
	$file->createFile('index.html');
}
catch (MyException $e) {
	echo "Caught exception: " . $e->getMessage() . "\n";

}



?>
