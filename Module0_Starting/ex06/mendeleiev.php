<?php

$array_colors=[
    [        
        'group'=> [1],
        'period' => [1],
        'color' => 'rgb(142, 185, 235);'
    ],
    [
        'group'=> [1],
        'period' => [2,3,4,5,6,7],
        'color' => 'rgb(158, 49, 63);'

    ],
    [
        'group'=> [2],
        'period' => [2,3,4,5,6,7],
        'color' => 'rgb(235, 152, 29);'
    ],
       [
        'group'=> [3,4,5,6,7,8,9,10,11,12],
        'period' => [4,5,6,7],
        'color' => 'rgb(221, 235, 142);'
    ],
    [
        'group'=> [13],
        'period' => [2],
        'color' => 'rgb(58, 205, 241);'
    ],
    [
        'group'=> [13],
        'period' => [3,4,5,6,7],
        'color' => 'rgb(74, 214, 70);'
    ],
    [
        'group'=> [14,15,16],
        'period' => [2],
        'color' => 'rgb(36, 111, 182);'
    ],
    [
        'group'=> [14],
        'period' => [3,4],
        'color' => 'rgb(58, 205, 241);'
    ],
    [
        'group'=> [14],
        'period' => [5,6,7],
        'color' => 'rgb(74, 214, 70);'
    ],
    [
        'group'=> [15],
        'period' => [4,5],
        'color' => 'rgb(58, 205, 241);'
    ],
    [
        'group'=> [15],
        'period' => [6,7],
        'color' => 'rgb(74, 214, 70);'
    ],
    [
        'group'=> [15,16],
        'period' => [3],
        'color' => 'rgb(36, 111, 182);'
    ],
    [
        'group'=> [16],
        'period' => [4],
        'color' => 'rgb(36, 111, 182);'
    ],
    [
        'group'=> [16],
        'period' => [5,6],
        'color' => 'rgb(58, 205, 241);'
    ],
    [
        'group'=> [16],
        'period' => [7],
        'color' => 'rgb(74, 214, 70);'
    ],
    [
        'group'=> [17],
        'period' => [2,3,4,5,6,7],
        'color' => 'rgb(168, 70, 214);'
    ],
    [
        'group'=> [18],
        'period' => [1,2,3,4,5,6,7],
        'color' => 'rgb(60, 10, 83);'
    ],
];


     $html = "<!DOCTYPE html>\n<html>\n<head>";
     $html .= "\n<style>\n";
     $html .= "td {\n\tborder: 1px solid black;\n\twidth: 95px;\n\theight: 95px; \n}\n";
     $html .= "dt, dd, dl, tr, td {\n\tmargin: 0;\n\tpadding: 0\n}\n";
     $html .= "h4 {\n\ttext-align: center;\n\tfont-size:50%;\n\tmargin: 0;\n\tpadding-bottom: 10px;\n}\n";
     $html .= "</style>\n";
     $html .= "\n\t<title>Tableau de Mendeleiev</title>\n</head>\n<body>\n";
     $html .= "\t<h2 style=\"text-align: center; \">Tableau Périodique des Éléments</h2>\n";
   

    $handle=file_get_contents("ex06.txt");
    $number=explode("\n", $handle);

    function get_color_for($group, $period, $array_colors) {
        foreach ($array_colors as $rule) {
            $groups = (array) $rule['group'];    
            $periods = (array) $rule['period'];
            
            if (in_array($group, $groups) && in_array($period, $periods)) {
                return $rule['color'];
            }
        }
        return null; // Pas trouvé
    }
    
   
    $period_max=8;
    $group_max=18;
	$group = 0;
	$period = 1;
	
    $html .= "<table>\n";
    $previous_elem=-1;
		foreach($number as $key => $value)
		{         
			if(empty($value)){
				break;
			}			
			$line = $value;
			// echo $line."\n";
			preg_match('/^(\w+) = position:(\d+), (.+)$/', $line, $matches);
			if($matches[2] == 0)
			{
				$html .= "\t<tr>\n";
                // $period +=1;
                // echo "new <tr>, $period \n";
			}			
            
            for($group = $previous_elem+1; $group < $group_max ; $group++)
            {
                // echo "for group: ". $group." \n";
                if( $group != $matches[2] )
                {
                    $html .= "\t\t<td style=\"border-style: none;\"></td>\n";
                    // echo $matches[2]." \n";
                }
                else
                {
                    $name= $matches[1];
                    $data = $matches[3];                  
                    $dataextract=explode(", ", $data);
                    $composition=[];               
                    $composition["name"]=$name;
                    foreach($dataextract as $value)
                    {
                        list($key,$val)=explode(":",$value);
                        $composition[$key]=$val;
                    }
                    $background = get_color_for($group + 1, $period, $array_colors);
                    // echo " background ". $background." \n";
                    $html .= "\t\t<td style=\"background-color: {$background}\">\n";
                    // $html .= "\t\t<td >\n";
                    $html .= "\t\t\t<dl>\n";
                    // $html .= "\t\t\t\t<dt><h4>{$composition["name"]}</h4></dt>\n";
                    // $html .= "\t\t\t\t<dd style=\"text-align: center; font-weight: bold; font-size:80%;\">{$composition["number"]}</dd>\n";
                    // $html .= "\t\t\t\t<dd style=\"text-align: center; font-size:150%; font-weight: bold;\">{$composition["small"]}</dd>\n";
                    // $html .= "\t\t\t\t<dd style=\"text-align: center; font-size:60%; padding-top: 30px;\">{$composition["molar"]}</dd>\n";
                    // $html .= "\t\t\t<dd>{$composition["electron"]}</dd>\n";
                    
                    $html .= "\t\t\t\t<dt style=\"text-align: left; font-weight: bold; font-size:80%;\">{$composition["number"]}</dt>\n";         
                    $html .= "\t\t\t\t<dd style=\"text-align: center; font-size:100%; font-weight: bold;padding-top: 15px;\">{$composition["small"]}</dd>\n";
                    $html .= "\t\t\t\t<dd><h4>{$composition["name"]}</h4></dd>\n";
                    $html .= "\t\t\t\t<dd style=\"text-align: center; font-size:50%; padding-top: 15px;\">{$composition["molar"]}</dd>\n";
                    $html .= "\t\t\t</dl>\n";
                    $html .= "\t\t</td>\n";
                    // print_r($composition);
                    if($matches[2] == 17)
                    {
                        $html .= "\t</tr>\n";
                    }                   
                    break;
                }               
            }
            if($matches[2] != 17)
            {
                $previous_elem=$matches[2];
                
            }
            else
            {
                $previous_elem=-1;
                $period++;
            }


        }
    $html .= "</table>\n</body>\n</html>\n";
// creation et enregistrement dans le fichier html

$htmlFile = fopen("mendeleiev.html", "w");
fwrite($htmlFile, $html);
fclose($htmlFile);

