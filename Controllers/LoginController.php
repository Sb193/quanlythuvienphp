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
                $error = '';
                $usernamenull = '';
                $passwordnull = '';
                if ($username == ''){
                    $error = 'Tài khoản không được để trống';
                    $usernamenull = 'border-danger';
                    include 'Views/Login/login.php';
                } elseif ($password == ''){
                    $error = 'Mật khẩu không được để trống';
                    $passwordnull = 'border-danger';
                    include 'Views/Login/login.php';
                } else {
                    $error = 'Tài khoản hoặc mật khẩu không đúng';
                    include 'Views/Login/login.php';
                }
                
            }
        }
    }
}
?>