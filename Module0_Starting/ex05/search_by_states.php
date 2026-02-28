
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
// array_seache => permet de trouver la 1ere key d un tableau a partir de sa valeur                  
// function search_by_states(string $data){
// 	global $states, $capitals;
//     $stringreturn=[];

   
//     $items=explode(", ", $data);
//     $index= 0;
//     foreach($items as $value)
//     {  
//         foreach($states as $etat => $code)
//         {
//             if($etat == $value)
//             {
//                 $key= array_key_exists($code,$capitals);
//                 if(!$key)
//                     $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";
//                 else              
//                     $stringreturn[$index++]= $capitals[$code] . " is the capital of ".$value.".\n";
//                 break;                
//             }            
//         }
//         foreach($capitals as $code => $cap)
//         {
//             if($cap == $value)
//             {
//                 $key= array_search($code,$states);
//                 if(!$key)
//                     $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";
//                 else
//                     $stringreturn[$index++]= $cap . " is the capital of ". $key.".\n"; 
//                 break;                
//             }            

//         }
//         if(!(array_key_exists($value,$states)) && !(array_search($value,$capitals)))
//             $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";

//     }
//     unset($stringreturn[$index]);
//     foreach($stringreturn as $value)
//         echo $value;
// }                      


