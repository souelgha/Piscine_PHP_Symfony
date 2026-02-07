<?php

require_once 'Elem.php';
require_once 'TemplateEngine.php';
require_once 'MyException.php';

try{
	$elem = new Elem("html");
	$head = new Elem('head');
	$body = new Elem('body');
	$table= new Elem('table');
	$p = new Elem('p');
	$tr= new Elem('tr');
	$ul= new Elem('ul');
	
	// $bod =  new Elem('bod');	

	// $elem->pushElement(new Elem('body'));
	$head->pushElement(new Elem('meta', 'charset="UTF-8"'));
	$head->pushElement(new Elem('title', 'Mon HTML'));
	//$head->pushElement(new Elem('title', '2e HTML'));
	$elem->pushElement($head);
	
	//$elem->pushElement(new Elem('tr'));

	$body->pushElement(new Elem('h1', 'Hello World!', ['class' => 'text-muted']));
	$body->pushElement(new Elem('p', 'This is a paragraph.', ['class' => 'text-muted']));
	// $p->pushElement(new Elem('p', 'This is a mistake.', ['class' => 'text-muted']));
	// $body->pushElement($p);
	
	
	$tr->pushElement(new Elem('th', 'Cell name'));
	$tr->pushElement(new Elem('td', 'Cell 1'));
	$tr->pushElement(new Elem('tr', 'Cell 2'));
	// $table->pushElement($tr);
	// $table->pushElement(new Elem('td'));
	$body->pushElement($table);
	// $ul->pushElement(new Elem('th', 'Cell name'));
	$ul->pushElement(new Elem('li', 'Cell 1'));
	$ul->pushElement(new Elem('li', 'Cell 2'));
	$body->pushElement($ul);


	$elem->pushElement($body);
	$file= new TemplateEngine($elem);
	$file->createFile('index.html');
	$elem->validPage();
}
catch (MyException $e) {
	echo "Caught exception: " . $e->getMessage() . "\n";

}
?>
