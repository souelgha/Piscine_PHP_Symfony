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
			// print_r($this->content);
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

	public function validPage(){
		$nbHtml=0;
		$nbHead=0;
		$nbBody=0;
		$nbtitle=0;
		$nbmeta=0;
		echo "Valid Page Check:\n";
		echo "Verification de la balise HTML...\n";
		if($this->element != "html"){
			echo "Il manque la balise html\n";
			return false;
		}
		//print_r($this->content); 
		if(count($this->content) !=2){
			echo "trop d element dans le html\n";
			return false;
		}
		if($this->content[0]->element != "head" || $this->content[1]->element != "body"){
			echo "head ou body mal positionne\n";
			return false;
		}
		echo "La balise HTML est correct\n";

		foreach($this->content as $elem){
			if($elem instanceof Elem){
				if($elem->element=="head"){
					echo "Verification de la balise head...\n";
					foreach($elem->content as $subelem){
						if($subelem instanceof Elem){
							if (($subelem->element=="meta" && $nbmeta < 1)|| ($subelem->element=="title" && $nbtitle < 1)){
								if($subelem->element=="meta"){
									$nbmeta+=1;
								}
								if($subelem->element=="title"){
									$nbtitle+=1;
								}
							}else{
								echo "head non conforme\n";
								return false;						
							}
						}
					}
					echo "La balise Head est correct\n";
				}
				if($elem->element=="body"){
					echo "Verification de la balise body...\n";
					foreach($elem->content as $subelem){
						if($subelem instanceof Elem){
							if(($subelem ->element == "p")){
								foreach($subelem->content as $sub2){
									if($sub2 instanceof Elem){
										echo "balise <p> contient une autre balise\n";
										return false;
									}
								}
							}
							if(($subelem->element == "table")){
								foreach($subelem->content as $sub2){
									if($sub2 instanceof Elem && sub2->element != "tr"){
										echo "mauvaise balise dans la table p\n";
										return false;
									}else{

									}
								}
							}
						}
					}
					echo "La balise Body est correcte\n";					
				}
			}
		}
		

	}
}