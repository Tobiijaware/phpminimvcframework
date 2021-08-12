<?php


$app = new App();

class Response {

	public function send(string  $message) {
		echo $message;
	}
}

class Request {


}


class App {

	public function get(string $path, callable $func) {
		$func(new Request(), new Response());
	}

	public function post(string $path, callable $func) {
		$func(new Request(), new Response());
	}
}

$app->get('/', function(Request $req, Response $res) {
	$res->send('Welcome to our site');
});



$app->post('/', function(Request $req, Response $res) {
	$res->send('Welcome to our site');
});


$app->get('/user', function(Request $req, Response $res) {
	$res->send('Welcome to users again');
});


$a  = function() {};

function map(array $collection, callable  $func) {
	$output = [];
	foreach($collection as $item) {
		$output[]  = $func($item);
	}

	return $output;
}

$numbers = [1,2,3,4,5,6];

$raiseToPower = map($numbers, function($item) {
	return $item * $item;
});

