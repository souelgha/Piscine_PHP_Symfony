<?php

require_once 'MyException.php';

class Elem {
	private $element;
	private $content=[];
	private $attributes=[];
	private static $oneclose= array(
		"meta",	"img", "hr","br"		
	);
	private static $twoclose= array(
		"html",	"head", "body", "title", 
		"div", "p", "h1", "h2", "h3", 
		"h4", "h5", "h6", "span", 'table', 'tr', 'td', 'th', 'ul', 'ol', 'li'		
	);

	public function __construct($element, $content = null, $attributes = null){
		if(!in_array($element, self::$oneclose)
			&& !in_array($element, self::$twoclose)){
		// echo $element, "\n";
			throw new Myexception("Error: Element not allowed \n");
			return;
		}
		else{
			$this->element=$element;
			// echo $this->element, "\n";
			if($content !== null){
				$this->pushElement($content);
			}
			if($attributes !== null){
				$this->pushAttribute($attributes);
			}
			return;
		}
	}
// ajout un element au contenu de la balise. on les stocke dans un tableau idem pour les attributs.
	public function pushElement($element){
		$this->content[]=$element;
	}
	public function pushAttribute($attributes){
		if(is_array($attributes)){
			foreach($attributes as $key => $value){
				$this->attributes[$key]=$value;
			}
		}
	}

// return le code HTML:pour obtenir les balises imbriquees, on doit faire un appel recursif a getHTML.

	public function getHTML(){		
			$htmlcontent="";
			static $nbIndentation=0;		
			$indentation=str_repeat("\t", $nbIndentation);
			print_r($this->content);
		foreach($this->content as $elem){
			if($elem instanceof Elem){
				$nbIndentation++;
				$htmlcontent .= "\n" . $elem->getHTML();
				// echo $htmlcontent, "\n";				
				$nbIndentation--;
			}
			else{
				$htmlcontent .=$elem;				
			}
		}
		$stringattributes="";
		// print_r($this->attributes);
		foreach ($this->attributes as $key => $value) {
			$stringattributes.= " " . $key . '="' . $value . '"';
		}
		if(in_array($this->element, self::$oneclose)){
			return $indentation."<". $this->element." ". $htmlcontent . " />";			
		}
		else{
			$firstTag= $indentation."<". $this->element. $stringattributes. ">";			
			$closeTag= "\n".$indentation. "</".$this->element.">";
			return $firstTag. $htmlcontent. $closeTag;
		}			

	}

}