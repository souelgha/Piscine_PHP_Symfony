
<?php
function search_by_states(string $data){
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
    $index= 0;
    foreach($items as $value)
    {  
        foreach($states as $etat => $code)
        {
            if($etat == $value)
            {
                $key= array_key_exists($code,$capitals);
                if(!$key)
                    $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";
                else              
                    $stringreturn[$index++]= $capitals[$code] . " is the capital of ".$value.".\n";
                break;                
            }            
        }
        foreach($capitals as $code => $cap)
        {
            if($cap == $value)
            {
                $key= array_search($code,$states);
                if(!$key)
                    $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";
                else
                    $stringreturn[$index++]= $cap . " is the capital of ". $key.".\n"; 
                break;                
            }            

        }
        if(!(array_key_exists($value,$states)) && !(array_search($value,$capitals)))
            $stringreturn[$index++]= $value. " is neither a capital nor a state.\n";

    }
    unset($stringreturn[$index]);
    foreach($stringreturn as $value)
        echo $value;
}                      

