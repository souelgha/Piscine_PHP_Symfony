<?php

$handle=file_get_contents("ex01.txt");
// echo $handle;
$number=explode(",", $handle);
echo $number[0], "\n";
echo $number[1], "\n";
echo $number[2], "\n";
echo $number[3], "\n";

