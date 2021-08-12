<?php 

function greet() {
    echo "Hello!";
}

function greet2(string $name) : string {
    return "Hello $name!";
}

greet();
echo greet2("John");



function add(int $a, int $b): int {
    return $a + $b;
}

var_dump(add(10, 5));

function add2(...$items) : int  {
   return array_sum($items);
}

var_dump(add2(1,2,3,4,5,6,7));

$items = [1,2,3,4];

$mappedItems = array_map(function($i){
    return $i * 2;
}, $items);

print_r($mappedItems);

function deca_map(callable $func, array $items) {
    $output = [];
    for($i = 0; $i < count($items); $i++) {
        $output[] = $func($items[$i]);
    }
    return $output;
}

$multiplBy2 = function($i){
    return $i * 2;
};

$mappedItems2 = deca_map($multiplBy2, $items);

echo "Before our new function\n";
print_r($mappedItems2);