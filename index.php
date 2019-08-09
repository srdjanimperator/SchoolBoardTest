<?php

define('ROOT', dirname(__FILE__));
include ROOT . "/autoloader.php";

$app = new App();
$app->run();