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
		// echo $element, "\n";
			echo("Error: Element not allowed \n");
			return;
		}
		$this->element=$element;
		// echo $this->element, "\n";
		if($content !== null){
			$this->pushElement($content);
		}
		return;

	}
// ajout un element au contenu de la balise. on les stocke dans un tableau
	public function pushElement($element){
		$this->content[]=$element;
	}

// return le code HTML:pour obtenir les balises imbriquees, on doit faire un appel recursif a getHTML.

	public function getHTML(){		
			$htmlcontent="";
			static $nbIndentation=0;		
			$indentation=str_repeat("\t", $nbIndentation);
		
		foreach($this->content as $elem){
			if($elem instanceof Elem){
				$nbIndentation++;
				$htmlcontent .= "\n" . $elem->getHTML();
				echo $htmlcontent, "\n";				
				$nbIndentation--;
			}
			else{
				$htmlcontent .=$elem;				
			}
		}
		if(in_array($this->element, self::$oneclose)){
			return $indentation."<". $this->element." ". $htmlcontent . " />";			
		}
		else{
			$firstTag= $indentation."<". $this->element. ">";			
			$closeTag= "\n".$indentation. "</".$this->element.">";
			return $firstTag. $htmlcontent. $closeTag;
			}			

	}	
}