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
			throw new Myexception("Error: Element not allowed \n");
			return;
		}
		else{
			$this->element=$element;
			if($content !== null){
				$this->content[]=$content;
			}
			if($attributes !== null){
				foreach($attributes as $key => $value){
					$this->attributes[$key]=$value;
				}
			}
		}
		return;		
	}

	public function pushElement(Elem $newelement){
		$this->content[]=$newelement;
	}
	



	public function getHTML(){		
		$htmlcontent="";

		//preparation de l'indentation
		static $nbIndentation=0;		
		$indentation=str_repeat("\t", $nbIndentation);
		print_r($this->content);

		// getHTML:our obtenir les balises imbriquees, on doit faire un appel recursif a getHTML. 
		// Sinon on ajoute uniquement le content
		foreach($this->content as $elem){
			if($elem instanceof Elem){
				$nbIndentation++;
				$htmlcontent .= "\n" . $elem->getHTML();		
				$nbIndentation--;
			}
			else{
				$htmlcontent .=$elem;				
			}
		}
		
		//formatage du fichier html
		$stringattributes="";
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

?>