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
    $period_max=8;
    $group_max=18;
	$group = 0;
	$previous_elem = 0;
	
    // $index = 0; //position
    for($period = 0; $period <$period_max; $period++)
    {
		echo "period: ".$period."  \n";
              
		foreach($number as $key => $value)
		{
			// echo " chgt de value: ".$value."  \n";
			echo "begin foreach group: ". $group." \n";
			if(empty($value)){
				break;
			}
			
			$line = $value;
			echo $line."\n";
			preg_match('/^(\w+) = position:(\d+), (.+)$/', $line, $matches);
			// print_r($matches); 
			//revoir cette partie;
			if($previous_elem > $matches[2])
			{
				$html .= "<tr>"; 

			}
			else{
				$html .= "<tr>";  
			}
			
			$previous_elem=$matches[2];
			for($group = 0; $group < $group_max ; $group++)
			{
				echo "for group: ". $group." \n";
				if( $group != $matches[2] && $group != 17 )
				{
					// echo "dans le if:  \n";
					$html .= "<td></td>\n";
					// echo "pas d element dans cette ligne.\n";
					// echo $matches[2]." \n";
					// echo $group." \n";
				}
				else{
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
					$html .= "<td>\n";
                    $html .= "<h4>{$composition["name"]}</h4>\n";
                    $html .=  "<ul>\n";
                    $html .=   "<li>{$composition["number"]}</li>\n";
                    $html .=   "<li>{$composition["small"]}</li>\n";
                    $html .=   "<Li>{$composition["molar"]} </ li>\n";
                    $html .=   "<li>{$composition["electron"]}</li>\n";
                    $html .=   "<ul>\n";
                    $html .=   "</td>\n";
					// echo "dans else composition :\n";
					print_r($composition);
					break;
				}
				//fin de la ligne, fermer <tr> 
			}
		}
	}






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