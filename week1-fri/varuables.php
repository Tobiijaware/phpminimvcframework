<?php 

$name = "Joe"; // string
$age = 25; // integer


$x = 3.14; // float

is_numeric($x);

$name = "Abah";


echo "\t\tYour name is  $name  and your age is  $age and you can run at  $x speed\n";

printf("Your name is %s  and your age is  %d and you can run at %.2f speed\n", $name, $age, $x);

$formattedString  = sprintf("Your name is %s  and your age is  %d and you can run at %.2f speed\n", $name, $age, $x);

echo $formattedString;

$isPlaying = true; // bool = true & false
$isStopped = false; 

$lastName = NULL;
// EOF

define('DB_NAME', 'aj');

if(!defined('DB_NAME'))  define('DB_NAME', 'mysql');



echo DB_NAME;