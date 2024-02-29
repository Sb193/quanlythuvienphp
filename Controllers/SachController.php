<?php
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
        $content = "Views/Sach/index.php";
        include "Views/Shared/HomeView/layout.php";
    }

    
}
?> 