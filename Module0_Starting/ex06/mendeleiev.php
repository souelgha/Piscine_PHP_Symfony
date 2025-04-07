<?php
     $html = "<!DOCTYPE html>\n<html>\n<head>";
     $html .= "\n<style>\n";
     $html .= ".tdd {\n\tborder: 1px solid black;\n\tborder-collapse: collapse;\n}\n";
     $html .= "</style>\n";
     $html .= "\n<title>Tableau de Mendeleiev</title>\n</head>\n<body>\n";
     $html .= "<h2>Tableau Périodique des Éléments</h2>\n";
   

    $handle=file_get_contents("ex06.txt");
    $number=explode("\n", $handle);

    $html .= "<table>\n";
    /* boucle ici
    position correspond au groupe
    quand le group = 17, on incremente la periode

    */
    $period_max=8;
    $group_max=18;
	$group = 0;
	$period = 0;
	
    // $index = 0; //position
    // for($period = 0; $period <$period_max; $period++)
    // {
	// 	echo "period: ".$period."  \n";
    $previous_elem=-1;
		foreach($number as $key => $value)
		{
			// echo " chgt de value: ".$value."  \n";
			// echo "begin foreach group: ". $group." \n";
            // echo "previous elem: ". $previous_elem." \n";
            
			if(empty($value)){
				break;
			}			
			$line = $value;
			// echo $line."\n";
			preg_match('/^(\w+) = position:(\d+), (.+)$/', $line, $matches);
			// print_r($matches); 
			//revoir cette partie;
			if($matches[2] == 0)
			{
				$html .= "<tr>\n";
                $period +=1;
                // echo "new <tr>, $period \n";
			}			
            
            for($group = $previous_elem+1; $group < $group_max ; $group++)
            {
                // echo "for group: ". $group." \n";
                if( $group != $matches[2] )
                {
                    // echo "dans le if:  \n";
                    $html .= "\t<td></td>\n";
                    // echo "pas d element dans cette ligne.\n";
                    // echo $matches[2]." \n";
                    // echo $group. " <td></td>\n";
                }
                else
                {
                    $name= $matches[1];
                    $data = $matches[3];
                    // echo $name."\n";
                    // echo $data."\n";
                    $dataextract=explode(", ", $data);
                    $composition=[];
                    // echo "dans le else:  \n";
                    // print_r($dataextract);
                    $composition["name"]=$name;
                    foreach($dataextract as $value)
                    {
                        list($key,$val)=explode(":",$value);
                        $composition[$key]=$val;
                    }
                    // $html .= "\t<td class =\".tdd\">\n";
                    $html .= "\t<td style=\"border-width: 1px; border-style: solid; border-color: #424242; padding:10px\";>\n";
                    $html .= "\t<h4>{$composition["name"]}</h4>\n";
                    $html .= "\t\t<ul>\n";
                    $html .= "\t\t\t<li>{$composition["number"]}</li>\n";
                    $html .= "\t\t\t<li>{$composition["small"]}</li>\n";
                    $html .= "\t\t\t<li>{$composition["molar"]}</li>\n";
                    // $html .= "\t\t\t<li>{$composition["electron"]}</li>\n";
                    $html .= "\t\t</ul>\n";
                    $html .= "\t</td>\n";
                    // print_r($composition);
                    if($matches[2] == 17)
                    {
                        $html .= "</tr>\n";
                        // echo "on ferme </tr> \n";
                    }                   
                    break;
                    //fin de la ligne, fermer <tr> 
                }               
            }
            if($matches[2] != 17)
                $previous_elem=$matches[2];
            else
                $previous_elem=-1;

        }
    // Ouvrir le fichier HTML en écriture
$htmlFile = fopen("mendeleiev.html", "w");

// Fermer la table et la page HTML
$html .= "</table>\n</body>\n</html>\n";

// Écrire dans le fichier et fermer
fwrite($htmlFile, $html);
fclose($htmlFile);






/*			
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
            }
            // print_r($composition);
        }
    }

/*
$html .= "<td>\n";
                $html .= "<b>{$el['symbol']}</b><br>\n";
                $html .= "<small>{$el['name']} ({$el['num']})</small>\n";
                $html .= "<ul>\n";
                $html .= "<li>Masse: {$el['mass']}</li>\n";
                $html .= "</ul>\n</td>\n";
                $found = true;
                break;



<table>
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
*/