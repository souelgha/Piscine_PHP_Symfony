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
        'color' => 'rgba(168, 70, 214, 0.88);'
    ],
    [
        'group'=> [18],
        'period' => [1,2,3,4,5,6,7],
        'color' => 'rgba(68, 11, 94, 0.85);'
    ],
];

function getColor($group, $period, $array_colors) {
	foreach ($array_colors as $rule) {
		$groups = (array) $rule['group'];    
		$periods = (array) $rule['period'];

		if (in_array($group, $groups) && in_array($period, $periods)) {
			return $rule['color'];
		}
	}
	return null;
}

function headerMendeleiev(){
	$html = "<!DOCTYPE html>\n<html>\n<head>";
	$html .= "\n<style>\n";
	$html .= "table {\n\tpadding-left: 50px; \n}\n";
	$html .= "td {\n\tborder: 1px solid black;\n\twidth: 80px;\n\theight: 80px; \n}\n";
	$html .= "ul {\n\tlist-style: none;\n}\n";
	$html .= "ul, li, tr, td {\n\tmargin: 0;\n\tpadding: 0;\n}\n";
	$html .= "h4 {\n\ttext-align: center;\n\tfont-size:50%;\n\tmargin: 0;\n\tpadding-bottom: 10px;\n}\n";
	$html .= "</style>\n";
	$html .= "\n\t<title>Tableau de Mendeleiev</title>\n</head>\n<body style=\"padding: auto;\">\n";
	$html .= "\t<h2 style=\"text-align: center; \">Tableau Périodique des Éléments</h2>\n";
	
	return $html;
}

function create_tdElement($matches, $html, $background){
	$electron = str_replace(' ', '<br>', $matches[6]);

	$html .= "\t\t<td style=\"background-color: {$background}\">\n";
	$html .= "\t\t\t<div style=\"display: flex; justify-content: space-between;\">\n";
	$html .= "\t\t\t<div>\n";
	$html .= "\t\t\t\t<ul style=\"text-align: left;\">\n";
	$html .= "\t\t\t\t\t<li style=\"font-size:80%;\">{$matches[3]}</li>\n";
	$html .= "\t\t\t\t\t<li style=\"font-size:100%; font-weight: bold; padding-top: 15px;\">{$matches[4]}</li>\n";
	$html .= "\t\t\t\t\t<li><h4>{$matches[1]}</h4></li>\n";
	$html .= "\t\t\t\t\t<li style=\"font-size:50%; padding-top: 10px;\">{$matches[5]}</li>\n";
	$html .= "\t\t\t\t</ul>\n";
	$html .= "\t\t\t</div>\n";
	$html .= "\t\t\t<div>\n";
	$html .= "\t\t\t\t<ul style=\"text-align: right; font-size:50%; padding-right:5px; padding-top: 5px;\">\n";
	$html .= "\t\t\t\t\t<li>{$electron}</li>\n";
	$html .= "\t\t\t\t</ul>\n";
	$html .= "\t\t\t</div>\n";
	$html .= "\t\t\t</div>\n";
	$html .= "\t\t</td>\n";

	return $html;
}

$handle = file_get_contents("ex06.txt");
$number = explode("\n", $handle);

$groupMax = 17;
$period = 1;
$currentGroup = 0;
$trExist = false;

$html = headerMendeleiev();
$html .= "<table>\n";

foreach ($number as $value) {
	$line = trim($value);
	if ($line === '') {
		continue;
	}
	if (!preg_match('/^(\w+) = position:(\d+), number:(\d+), small: (\w+), molar:(.+), electron:(.+)$/', $line, $matches)) {
		continue;
	}
	$groupIndex = $matches[2];

	if (!$trExist) {
		$html .= "\t<tr>\n";
		$trExist = true;
		$currentGroup = 0;
	}

	while ($currentGroup < $groupIndex) {
		$html .= "\t\t<td style=\"border-style: none;\"></td>\n";
		$currentGroup++;
	}

	$background = getColor($groupIndex + 1, $period, $array_colors);
	$html =create_tdElement($matches, $html, $background);

	$currentGroup++;
	

	if ($groupIndex == $groupMax) {
		$html .= "\t</tr>\n";
		$trExist = false;
		$period++;
	}
	
}
if ($trExist) {
	$html .= "\t</tr>\n";
}

$html .= "</table>\n</body>\n</html>\n";

$htmlFile = fopen("mendeleiev.html", "w");
fwrite($htmlFile, $html);
fclose($htmlFile);
