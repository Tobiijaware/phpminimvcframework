<?php

function truncate(string $str, $endAt = 100, $end='...') : string {
	return strlen($str) <= 0 ? '' : substr($str, 0, $endAt) . $end;
}


$str = truncate('Welcome to a wonderful world', 10);


$str2 = call_user_func('truncate', 'Welcome to a wonderful world', 10, '---');

function home() {
	echo "Home page";
}

function about() {
	echo "about page";
}

function contact() {
	include 'contact.php';
}


$functionToCall = isset($_GET['func']) ? trim($_GET['func']) : 'home';

$str = call_user_func('truncate', 'data to truncate', 5);

/*switch ($functionToCall) {

	case 'contact':
		contact();
		break;
	case 'about':
		about();
		break;
	default:
		home();
		break;
}*/


$str3 = call_user_func_array('truncate', ['this is the data to truncate', 10, '***']);

echo $str3;
