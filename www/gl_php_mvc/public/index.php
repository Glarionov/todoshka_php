<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\router\WebRouter;

$webRouter = new WebRouter();
$webRouter->doActionByRoute();
