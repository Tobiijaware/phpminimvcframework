<?php
// AND  -> A && B && C && D
// OR   -> A || B || C || D
// NOT -> !A ?? 


$condition = 10 < 20 && true;

if($condition) {
    echo "Hello there!\n";
}


$name = 'Welcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our siteWelcome to our site\n';

$nameLen = strlen($name);

if(strlen($name) >= 3  && !is_numeric($name)) {
    echo "Name is valid\n";
} else {
    echo "Name is not valid\n";
}

// Loops
// foreach, for, while, do-while
for($i = 0; $i < strlen($name); $i++) {
    echo $name[$i] . PHP_EOL;
}

if(isset($name[100])) {
    echo "INDEX 100 IS $name[100]";
}

$flight = 'ss';

if(isset($flight) && !empty($flight)) {
    echo "FLIGHT IS NOT EMPTY\n";
}



$dbConfig = [
    'host' => 'locahost',
    'port' => 3306,
    'user' => 'root',
    'password' => 'root',
];

foreach($dbConfig as $key=>$char) {
    echo "$key is pointing to $char" . PHP_EOL;
}

// while
$i = 0;
while($i < 10) {
    echo $i . PHP_EOL;

    $i++;
}

echo "\n\n";

$i = 0;
do {
    echo $i . PHP_EOL;

    $i++;
}while($i < 10) ;


$bus = [
    ['1,1', '1,2', '1,3', '1,4', '1,5'],
    ['2,1', '2,2', '2,3', '2,4', '2,5'],
];

echo "\n\n";

for($i = 0; $i < count($bus); $i++) {
    for($j = 0; $j < count($bus[$i]); $j++) {
        echo "$i,$j ";
    }
}