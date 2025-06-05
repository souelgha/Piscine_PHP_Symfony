<?php
require_once 'HotBeverage.php';

class Coffee extends HotBeverage
{
	private string $description;
	private string $comment;

	public function  __construct(){
		$this->$name='Coffee';
		$this->$price = 3.0;
		$this->$resistance = 4;
		$this->$description ='black american coffee';
		$this->$comment = 'best expresso';
	}


}