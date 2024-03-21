<?php
require_once 'Models/TheLoai.php';
require_once 'Models/DauSach.php';
class ThongKeController {
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
        $index = "Views/TheLoai/index.php";
        $addlink = "index.php?controller=theloai&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = TheLoai::getAllTL();
        include "Views/Shared/HomeView/layout.php";
        
    }


    
}
?> 