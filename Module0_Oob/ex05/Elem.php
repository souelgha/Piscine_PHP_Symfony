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
		// print_r($this->content); 
		foreach($this->content as $elem){
			if($elem instanceof Elem){
				echo "ici\n";
				echo $elem->element,  "\n";
				if($elem->element=="head"){
					$nbHead++;
					echo "ici head\n";
					echo $elem->element, " nb head: ", $nbHead, "\n";
					foreach($elem->content as $subelem){
						if($subelem instanceof Elem){
							if($subelem->element=="meta"){
								$nbmeta+=1;
								echo "nb meta: ", $nbmeta, "\n";
							}
							if($subelem->element=="title"){
								$nbtitle+=1;
								echo "nb title: ", $nbtitle, "\n";
							}
						}
					}
				}
				if($elem->element=="body"){
					$nbBody++;
					echo "ici body\n";
					echo $elem->element, " nb body: ", $nbBody, "\n";
					// finir la partie body et validPag()
					// foreach($elem->content as $subelem){
					// 	if($subelem instanceof Elem){
					// 		if($subelem->element=="meta"){
					// 			$nbmeta+=1;
					// 			echo "nb meta: ", $nbmeta, "\n";
					// 		}
					// 		if($subelem->element=="title"){
					// 			$nbtitle+=1;
					// 			echo "nb title: ", $nbtitle, "\n";
					// 		}
					// 	}
					// }
				}
			}
		}
		echo "nb html: ", $nbHtml, "\n";
		echo "nb head: ", $nbHead, "\n";
		echo "nb body: ", $nbBody, "\n";
		echo "nb title: ", $nbtitle, "\n";
		echo "nb meta: ", $nbmeta, "\n";
		// return $hasHtml && $hasHead && $hasBody;
	}
}