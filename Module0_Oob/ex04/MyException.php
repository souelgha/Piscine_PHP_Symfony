<?php

class MyException extends Exception{
	public function __construct($message="ERROR: Element not allowed \n"){
		parent::__construct($message);
	}
}


