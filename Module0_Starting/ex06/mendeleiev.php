<?php
     $html = "<!DOCTYPE html>\n<html>\n<head>\n<title>Tableau de Mendeleiev</title>\n</head>\n<body>\n";
     $html .= "<h2>Tableau Périodique des Éléments</h2>\n";
   

    $handle=file_get_contents("ex06-mod.txt");
    $number=explode("\n", $handle);

    $html .= "<table border='1' style='border-collapse: collapse; text-align: center;'>\n";
    /* boucle ici
    position correspond au groupe
    quand le group = 17, on incremente la periode

    */
    $period_max=7;
    $group_max=18;
    // $index = 0; //position
    for($period = 0; $period <$period_max; $period++)
    $html .= "<tr>";
    for($group = 0; $group < $group_max ; $group++)
    {
        foreach($number as $value)
        {
            $line = $value;
            echo $line;
            preg_match('/^(\w+) = (.+)$/', $line, $matches);
            if(!$matches){
                die("format incorrect");
            }
            $name= $matches[1];
            $data = $matches[2];
            // echo $name."\n";
            // echo $data."\n";
            $dataextract=explode(", ", $data);
            $composition=[];
            // print_r($dataextract);
            $composition["name"]=$name;
            foreach($dataextract as $value)
            {
                list($key,$val)=explode(":",$value);
                $composition[$key]=$val;
            }
            if($composition[position] == $group)
            {
                $html .= "<td>\n";
                $html .= "<h4>{$composition[name]}</h4>\n";
                $html .=  "<ul>\n";
                $html .=   "<li>{$composition[number]}</li>\n";
                $html .=   "<li>{$composition[small]}</li>\n";
                $html .=   "<Li>{$composition[molar]} </ li>\n";
                $html .=   "<li>{$composition[electron]}</li>\n";
                $html .=   "<ul>\n";
                $html .=   "</td>\n";
            }
            else
            {
                $html .= "<td></td>\n";
            }


            // print_r($composition);
        }
    }


$html .= "<td>\n";
                $html .= "<b>{$el['symbol']}</b><br>\n";
                $html .= "<small>{$el['name']} ({$el['num']})</small>\n";
                $html .= "<ul>\n";
                $html .= "<li>Masse: {$el['mass']}</li>\n";
                $html .= "</ul>\n</td>\n";
                $found = true;
                break;



// <table>
<tr>
$html .= "<td style="border: 1px solid black; padding:10px">\n"
$html .= "<h4>{$composition[name]}</h4>\n"
$html .=  "<ul>\n"
$html .=   "<li>{$composition[number]}</li>\n"
$html .=   "<li>{$composition[small]}</li>\n"
$html .=   "<Li>{$composition[molar]} </ li>\n"
$html .=   "<li>{$composition[electron]}</li>\n"
$html .=   "<ul>\n"
$html .=   "</td>\n"