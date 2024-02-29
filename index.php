<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/SachController.php';

$controller = null;

if (!isset($_SESSION['user'])) {
    $controller = new LoginController();
} else {
    $cont = isset($_GET['controller']) ? $_GET['controller'] : null;
        switch ($cont) {
            case 'login':
                $controller = new LoginController();
                break;
            case 'home':
                $controller = new HomeController();
                break;
            case 'sach':
                $controller = new SachController();
                break;
            default:
                $controller = new HomeController();
                break;
        }
}

$controller->handleRequest();
?>