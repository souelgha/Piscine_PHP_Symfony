<?php
require_once 'HotBeverage.php';

class Tea extends HotBeverage
{
	private string $description;
	private string $comment;

	public function  __construct(){
		$this->$name='Tea';
		$this->$price = 4.5;
		$this->$resistance = 2;
		$this->$description ='Earl Grey Tea';
		$this->$comment = 'From India';
	}


}