<?php
use App\ApplicationManager;

require_once '../constants.php';

require_once '../vendor/autoload.php';

$app = ApplicationManager::getInstance();

require_once '../routes.php';

$app->mount();
// end of file
