
<?php
function search_by_states(string $data)/*: string*/{
    $stringreturn=[];

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
    $items=explode(", ", $data);
    foreach($items as $value)
    {
        echo $value, "\n";
        foreach($states as $etat => $code){
            if($etat == $value)
            {
                
            $stringreturn[i]= $capitals[$code] . "is the capital of ".$value."\n";
            echo $stringreturn;
            }
        }
    }
     // return("Unknown\n");
}                      

