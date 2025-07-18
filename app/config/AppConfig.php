<?php

const APP_DEFAULT_CONTROLLER = "authentication";
const APP_DEFAULT_ACTION = "index";

CONST APP_AUTHENTICATION_CONTROLLER = "authentication";
CONST APP_LOGIN_ACTION = "login";


const APP_URL = "http://localhost/lab_prog_2025_Gonzalez_Nicolas/public/";

const APP_TOKEN = "$2y$10$4IgjNTpoqOpC.1oAHkdvEecXU5KRyKoTSqSbPS4wXISbRo20U8dL.";

define ('APP_URI', $_SERVER["DOCUMENT_ROOT"] . '/lab_prog_2025_Gonzalez_Nicolas/app/');

//APP URI ES LA URL DEL BACKEND. APP URL ES LA DIRECCION DEL FRONT.

// $_SERVER["DOCUMENT_ROOT"] devuelve c/xampp/htdocs


define ("APP_DIR_TEMPLATE", APP_URI . 'resources/template/');

define ("APP_DIR_VIEWS", APP_URI . 'resources/views/');

define ("APP_FILE_TEMPLATE", APP_DIR_TEMPLATE . 'template.php');



define ('APP_FILE_LOGS_ACCESS', APP_URI . 'logs/access.log');

define ('APP_FILE_LOG_ERRORS', APP_URI . 'logs/error.log');




define ('APP_FILE_LOGIN', APP_DIR_VIEWS . 'authentication/index.php');

define ('APP_FILE_LOGOUT', APP_DIR_VIEWS . 'authentication/logout.php');











