<?php
use \App\Controllers\HomeController;
use \App\Controllers\Dashboard;

$app->get('/', [HomeController::class]);
$app->get('/dashboard', [Dashboard::class]);

$app->handle404(function ($req, $res) {
	return $res->redirect();
});
