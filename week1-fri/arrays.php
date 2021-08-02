<?php 

$langs = ['PHP', 'Python', 'Java', 'Rust', 'Go'];

$langs[] = 'C#';

print_r($langs);

echo $langs[3];

$config = array('localhost', '127.0.0.1');
array_push($config, 'redis');
$config[] = 'mongo';
array_unshift($config, '192.168.0.1');

print_r($config);

// ---- Array with non-numeric keys

$dbConfig = [
    'host' => 'locahost',
    'port' => 3306,
    'user' => 'root',
    'password' => 'root',
];


print_r($dbConfig);

// Associative array - multi-d array

$bus = [
    ['1,1', '1,2', '1,3', '1,4', '1,5'],
    ['2,1', '2,2', '2,3', '2,4', '2,5'],
];

print_r($bus);

$bus[0][] = '1,6';
print_r($bus);

array_push($bus[1], '1,6');
print_r($bus);
