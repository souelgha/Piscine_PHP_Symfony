<?php
function array2hash_sorted(array $tableau ) : array{
	$newtable=[];
	
	foreach($tableau as [$nom, $age] ){
		$newtable[$nom] = $age;
	}
	krsort($newtable);
	return $newtable;
}
