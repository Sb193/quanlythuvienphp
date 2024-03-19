<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

require_once 'Models/TaiKhoan.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/SachController.php';
require_once 'controllers/NhanVienController.php';
require_once 'controllers/TaiKhoanController.php';
require_once 'controllers/DocGiaController.php';


$controller = null;

if (!isset($_SESSION['user'])) {
    $controller = new LoginController();
} else {
    $user = $_SESSION['user'];
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
            case 'nhanvien':
                $controller = new NhanVienController();
                break;
            case 'taikhoan':
                $controller = new TaiKhoanController();
                break;
            case 'docgia':
                $controller = new DocGiaController();
                break;
            default:
                $controller = new HomeController();
                break;
        }
}

$controller->handleRequest();
?>