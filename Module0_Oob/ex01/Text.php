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
			if(stripos($line, 'prix') !== false){
				$html .= "\t\t<p>".htmlspecialchars($line)." &euro;</p>\n";

			}
			else{
				$html .= "\t\t<p>".htmlspecialchars($line). "</p>\n";
			}
			
		}
		// print_r($html);
		return $html;
	}

	public function getFirstValue(){
		return($this->texts[0]);
	}
	public function isEmpty() {
		return empty($this->texts);
	}
	
}