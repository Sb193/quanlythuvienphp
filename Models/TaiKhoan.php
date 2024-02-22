<?php
require_once 'Models/dbconfig.php';

class User {
    public static function getByUsernameAndPassword($username, $password) {
        $db = Database::getInstance();
        $stmt = $db->prepare('SELECT * FROM taikhoan WHERE TaiKhoan = :username AND MatKhau = :password');
        $stmt->execute([':username' => $username, ':password' => $password]);
        return $stmt->fetch();
    }
}
?>
