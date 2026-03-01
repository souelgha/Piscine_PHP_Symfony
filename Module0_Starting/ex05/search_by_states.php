
<?php
 $states = [
        'Oregon' => 'OR',
        'Alabama' => 'AL',
        'New Jersey' => 'NJ',
        'Colorado' => 'CO',
    ];
    $capitals = [
        'OR' => 'Salem',
        'AL' => 'Montgomery',
        'NJ' => 'trenton',
        'KS' => 'Topeka',
    ];
function search_by_states(string $data){
	global $states, $capitals;
    $stringToReturn=[];
   
    $items=explode(", ", $data);
    $index= 0;
    
	foreach($items as $value){
		if(isset($states[$value])){
			if(isset($capitals[$states[$value]])){
				$stringToReturn[$index++]= $capitals[$states[$value]] . " is the capital of ".$value.".\n";
			}else{
				$stringToReturn[$index++]= $value. " is neither a capital nor a state.\n";
			}
		}else if(array_search($value,$capitals)){
			$symb=array_search($value,$capitals);
			if(array_search($symb,$states)){
				$stringToReturn[$index++]= $value . " is the capital of ". array_search($symb,$states) . ".\n";		
			}else{
				$stringToReturn[$index++]= $value. " is neither a capital nor a state.\n";
			}
		}else if(!(isset($states[$value])) && (!array_search($value,$capitals))){
			$stringToReturn[$index++]= $value. " is neither a capital nor a state.\n";
		}
	}
	foreach($stringToReturn as $part){
		echo $part;
	};
	
}   
// array_seach => permet de trouver la 1ere key d'un tableau a partir de sa valeur                  
