<?php

require_once 'vendor/autoload.php';

/*
use GuzzleHttp\Client;

$client = new  Client();
$response = $client->request('GET', 'https://catfact.ninja/fact');


$body = $response->getBody();

$bodyObj  = json_decode($body);

echo $bodyObj->fact;
*/

$user = new \App\Model\User();

$dto = new \App\Dto\UserRegisterationDto();

logger();
