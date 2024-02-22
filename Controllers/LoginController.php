<?php
require_once 'Models/TaiKhoan.php';

class LoginController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'login':
                $this->login();
                break;
            default:
                include 'Views/Login/Login.php';
                break;
        }
    }

    private function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::getByUsernameAndPassword($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                echo "Đăng nhập thành công";
            } else {
                $error = 'Invalid username or password';
                include 'Views/Login/login.php';
            }
        }
    }
}
?>