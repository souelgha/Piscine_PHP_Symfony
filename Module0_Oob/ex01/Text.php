<?php

class Text
{
	private $texts= [];
	public function __construct(array $chartext){
		if(is_array($chartext))
			$this->texts = $chartext;
	}

	public function append($newchartext){
		$this->texts[] = $newchartext;
	}

	public function readData(){
		$html ="";
		foreach($this->texts as $line){
			$html .= "\t\t<p>".htmlspecialchars($line)."<p>\n";
		}
		print_r($html);
		return $html;
	}
	public function gettext(){
		return($this->texts[0]);
	}

}