<?php
require_once 'Models/TaiKhoan.php';
require_once 'Models/Nguoi.php';
class SachController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'index':
                $this->index();
                break;
            
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $index = "Views/Sach/index.php";
        $addlink = "index.php?controller=sach&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = NhanVien::getData();
        include "Views/Shared/HomeView/layout.php";
        
    }

    
}
?> 