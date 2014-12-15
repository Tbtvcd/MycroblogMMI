<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../application/Controller.php';

$controller = new Controller();
if(isset($_GET['action'])) {

    switch($_GET['action']) {
        case 'login':
            $controller->login();
            break;
        case 'register':
            $controller->register();
            break;
        case 'logout':
            $controller->logout();
            break;
        default:
            $controller->index();
    }
}
else
    $controller->index();




