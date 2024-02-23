<?php
require_once 'Models/dbconfig.php';

class User {

    private $taikhoan;
    private $matkhau;
    private $loaitk;

    public function __construct($taikhoan , $matkhau , $loaitk){
        $this->taikhoan = $taikhoan;
        $this->matkhau = $matkhau;
        $this->loaitk = $loaitk;
    }


    public static function getByUsernameAndPassword($username, $password) {
        $db = Database::getInstance();
        $stmt = $db->prepare('SELECT * FROM taikhoan WHERE TaiKhoan = :username AND MatKhau = :password');
        $stmt->execute([':username' => $username, ':password' => $password]);
    
        $result = $stmt->fetch();
        if ($result){
            $tk = $result['TaiKhoan'];
            $mk = $result['MatKhau'];
            $ltk = $result['LoaiTK'];
            $user = new User($tk ,$mk  , $ltk);
            return $user;
        } else {
            return NULL;
        }
    }
    


}
?>
