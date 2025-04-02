
<?php
function capital_city_from(string $target): string{
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

    foreach($states as $etat => $code){
        if($etat == $target)
        {
            // echo $code;
            if(isset($capitals[$code]))             
                return $capitals[$code]."\n";
        }
    }
    return("Unknown\n");
}                      

