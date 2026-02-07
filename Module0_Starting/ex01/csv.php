<?php

$handle=file_get_contents("ex01.txt");
echo $handle;
$number=explode(",", $handle); // permet de split en tableau une str

foreach($number as $value){
    
    if($value == end($number)){
         echo $value;
    }else{
        echo $value, "\n";
    }
   
}
?>
