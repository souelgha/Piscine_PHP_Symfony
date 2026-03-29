<?php

require_once 'Elem.php';
require_once 'TemplateEngine.php';
require_once 'MyException.php';

try{
	$elem = new Elem("html");
		
	$p = new Elem('p');
	
		
//valid page
	$head = new Elem('head');
	$head->pushElement(new Elem('meta', 'charset="UTF-8"'));
	$head->pushElement(new Elem('title', 'Mon HTML'));	
	$elem->pushElement($head);
		
	$body = new Elem('body');
	$body->pushElement(new Elem('h1', 'Hello World!', ['class' => 'text-muted']));
	$body->pushElement(new Elem('p', 'This is a paragraph.', ['class' => 'text-muted']));
	
	$table= new Elem('table', null, ['style' => 'border: 1px solid black;']);
	$tr= new Elem('tr');
	$tr->pushElement(new Elem('th', 'Cell name'));
	$tr->pushElement(new Elem('td', 'Cell 1'));	
	$tr->pushElement(new Elem('td', 'Cell 2'));		
	$table->pushElement($tr);
	$tr2= new Elem('tr');
	$tr2->pushElement(new Elem('th', 'Cell name2'));
	$tr2->pushElement(new Elem('td', 'Cell 3'));	
	$tr2->pushElement(new Elem('td', 'Cell 4'));	
	$table->pushElement($tr2);		
	$body->pushElement($table);

	$ul= new Elem('ul');
	$ul->pushElement(new Elem('li', 'list 1'));
	$ul->pushElement(new Elem('li', 'list 2'));
	$body->pushElement($ul);
	$body->pushElement($table);

	$elem->pushElement($body);
	if($elem->validPage()){
		$file= new TemplateEngine($elem);
		$file->createFile('index.html');
		echo "\033[32mLa page est valide\033[0m\n";
	}else{
		echo "\033[31mLa page n'est pas valide\033[0m\n";
	}

	// No Valid page
	$body->pushElement($tr2);
	$p2=new Elem('p');
	$p2->pushElement(new Elem('p', 'This is a mistake.', ['class' => 'text-muted']));
	if($elem->validPage()){
		$file= new TemplateEngine($elem);
		$file->createFile('index1.html');
		echo "\033[32mLa page est valide\033[0m\n";
	}else{
		echo "\033[31mLa page n'est pas valide\033[0m\n";
	}

	// Element non valide	
	$elem->pushElement(new Elem('undefined'));
	if($elem->validPage()){
		$file= new TemplateEngine($elem);
		$file->createFile('index1.html');
		echo "\033[32mLa page est valide\033[0m\n";
	}else{
		echo "\033[31mLa page n'est pas valide\033[0m\n";
	}
	
}
catch (MyException $e) {
	echo "Caught exception: " . $e->getMessage() . "\n";

}

?>
