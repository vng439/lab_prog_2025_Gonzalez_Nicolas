<?php

require_once "../app/config/AppConfig.php";
require_once "../app/config/DBConfig.php";
require_once "../app/vendor/autoload.php";

use app\App;

App::run();


/* $controller = $_GET["controller"] ?? APP_DEFAULT_CONTROLLER;
$action = $_GET["action"] ?? APP_DEFAULT_ACTION;

$base = "../app/resources/views/" . $controller. "/" . $action . ".html";

require_once $base;

 */

/* require_once "../app/resources/views/authentication/index.html";
require_once "../app/resources/views/authentication/index.html"; */