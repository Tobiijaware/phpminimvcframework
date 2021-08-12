<?php 
require_once 'vendor/autoload.php';

use Carbon\Carbon;

echo Carbon::now()->subMinutes(160)->diffForHumans(); 