<?php
function array2hash(array $tableau ) : array{
	$newtable=[];
	
	foreach($tableau as [$nom, $age] ){
		$newtable[$age] = $nom;
	}
	return $newtable;
}
