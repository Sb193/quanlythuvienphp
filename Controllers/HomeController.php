<?php
class HomeController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'logout':
                $this->logout();
                break;
            
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $content = "Views/Home/Home.php";
        include "Views/Shared/HomeView/layout.php";
    }

    private function logout() {
        $_SESSION['user'] = null;
        require 'index.php';
    }
}
?> 