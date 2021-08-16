<?php
use App\ApplicationManager;


$app = ApplicationManager::getInstance();


$app->get('/', function ($req, $res) {
	echo "Hello";
});


$app->get('/users', function ($req, $res) {
	echo "users";
});

$app->get('/users/{id}', function ($req, $res) {
	var_dump($req->id);
});


$app->group(['prefix' => 'accounts'], function ($route) {

	$route->get('/', function () {

	});

	$route->get('/{id}', function () {

	});

});

/*
 * accounts
 * accounts/222 & ccounts/2222
 */
