<?php

class HotBeverage{

	protected string $name="";
	protected float $price= 0;
	protected int $resistance = 0;


	public function getName(): string{
		return($this->name);
	}
	public function getPrice(): float{
		return($this->price);
	}
	public function getResistance() : int{
		return($this->resistance);
	}
}
