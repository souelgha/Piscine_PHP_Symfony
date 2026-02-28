
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

                   
function capital_city_from(string $target): string{
   global $states, $capitals;

    if(isset($states[$target])) {
		if(isset($capitals[$states[$target]]))
                return $capitals[$states[$target]] . "\n";
        }    
    return("Unknown\n");
}                    
// <!-- isset fonction => verifie si une variable existe et n'est pas null -->
?>

