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
    
    public function getTaiKhoan(){
        return $this->taikhoan;
    }
    public function getMatKhau(){
        return $this->matkhau;
    }
    public function getLoaitk(){
        return $this->loaitk;
    }
    public function setTaiKhoan($TaiKhoan){
        $this->taikhoan = $TaiKhoan;
    }
    public function setMatKhau($matkhau){
        $this->matkhau = $matkhau;
    }
    public function setLoaitk($loaitk){
        $this->loaitk = $loaitk;
    }
    public static function getAllUser() {
        $db = Database::getInstance();
        $result = $db->getData('TaiKhoan');
        $users = [];

        while ($row = $result->fetch()) {
            $users[] = new User($row['TaiKhoan'], $row['MatKhau'], $row['LoaiTK']);
        }

        return $users;
    }

    public static function getUserbyID($TaiKhoan) {
        $user = $_SESSION['user'];
        if ($user == null) {
            return null;
        } else if ($user->getLoaitk() == '1') {
            return $user;
        }
        $db = Database::getInstance();
        $result = $db->getData('TaiKhoan','TaiKhoan', $TaiKhoan);
        $users = [];

        while ($row = $result->fetch()) {
            $users[] = new User($row['TaiKhoan'], $row['MatKhau'], $row['LoaiTK']);
        }

        return $users;
    }
    
    public function addTaiKhoan(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "TaiKhoan";

        // Mảng dữ liệu
        $data = array(
            "TaiKhoan" => $this->taikhoan,
            "MatKhau" => $this->matkhau,
            "LoaiTK" => $this->loaitk
        );

        // Gọi hàm thêm dữ liệu vào bảng
        return $db->insert_data($table, $data);
    }

}
?>
