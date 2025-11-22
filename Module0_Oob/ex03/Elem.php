<?php

class Elem {
	private $element;
	private $content=[];
	private static $oneclose= array(
		"meta",	"img", "hr","br"		
	);
	private static $twoclose= array(
		"html",	"head", "body", "title", 
		"div", "p", "h1", "h2", "h3", 
		"h4", "h5", "h6", "span"		
	);

	public function __construct($element, $content = null){
		if(!in_array($element, self::$oneclose)
			&& !in_array($element, self::$twoclose)){
		echo $element, "\n";
			echo("Error: Element not allowed \n");
			return;
		}
		$this->element=$element;
		echo $this->element, "\n";
		if($content !== null){
			$this->pushElement($content);
		}
		return;

	}
// ajout un element au contenu de la balise
	public function pushElement($element){
		$this->content[]=$element;
	}

// return le code HTML
	public function getHTML(){		
			$htmlcontent="";
			static $nbIndentation=0;
			echo $nbIndentation, "\n";
			$indentation=str_repeat("\t", $nbIndentation);
		
		foreach($this->content as $elem){
			print_r($elem);echo"\n";
			if($elem instanceof Elem){
				$nbIndentation++;
				$htmlcontent .= "\n" . $elem->getHTML();
				$nbIndentation--;
			}
			else{
				$htmlcontent .=$elem;				
			}
		}
		if(in_array($this->element, self::$oneclose)){
			return $indentation."<". $this->element. $htmlcontent . " />";			
		}
		else{
			if(is_string($htmlcontent)){
				$firstTag= $indentation."<". $this->element. ">";	
				$closeTag= "</".$this->element.">"."\n".$indentation;
				return $firstTag. $htmlcontent. $closeTag;		
			}
			else{
				$firstTag= $indentation."<". $this->element. ">";			
				$closeTag= "\n".$indentation. "</".$this->element.">";
				return $firstTag. $htmlcontent. $closeTag;
			}			
		}
	}	
}