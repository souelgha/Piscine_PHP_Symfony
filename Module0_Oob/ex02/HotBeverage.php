<?php

class HotBeverage{
	protected string $name="";
	protected float $price= 0;
	protected int $resistance = 0;

	public function getname(): string{
		return($this->$name);
	}
	public function getprice(): float{
		return($this->$price);
	}
	public function getresistance() : int{
		return($this->$resistance);
	}
}
