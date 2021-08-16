<?php

use App\ApplicationManager;


$app = ApplicationManager::getInstance();

$app->get('/', function ($req, $res){
	$res->sendJson(['name' => 'aj', 'messages' => ['1,2,2',2,222]]);
});

$app->get('/users', function (){
	echo "users";
});

$app->get('/customers',  [\App\Controllers\HomeController::class, 'index']);

$app->post('/customers', function (){});
$app->put('/customers', function (){});
$app->patch('/customers', function (){});


