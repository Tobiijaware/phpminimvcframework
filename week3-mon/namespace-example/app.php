<?php

require_once 'file1.php';
require_once 'file2.php';
require_once 'file3.php';

use Data\User as DataUser;
use Bar\User ;

$user = new User();

\Foo\Logger("Hello AJ");
