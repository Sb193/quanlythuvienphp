<?php
require_once 'Models/dbconfig.php';

class Sach {

    private $MaSach;
    private $MaDS;
    public $TrangThai;

    public function __construct($MaSach , $MaDS , $TrangThai){
        $this->MaSach = $MaSach;
        $this->MaDS = $MaDS;
        $this->TrangThai = $TrangThai;
    }

    public function getMaSach(){
        return $this->MaSach;
    }
    public function getMaDS(){
        return $this->MaDS;
    }
    public function getTrangThai(){
        return $this->TrangThai;
    }
    public function setMaSach($MaSach){
        $this->MaSach = $MaSach;
    }
    public function setMaDS($MaDS){
        $this->MaDS = $MaDS;
    }
    public function setTrangThai($TrangThai){
        $this->TrangThai = $TrangThai;
    }

    public static function getSachbyID($masach) {
        $db = Database::getInstance();
        $table = 'Sach';
        $field = 'MaSach';
        $result = $db->getData($table, $field, $masach);
        while($row = $result->fetch()){
            return new Sach($row['MaSach'],$row['MaDS'],$row['TrangThai']);
        }
    }
    
    
    public static function getAllUser() {
        $db = Database::getInstance();
        $result = $db->getData('TaiKhoan');
        $users = [];

        while ($row = $result->fetch()) {
            $users[] = new TaiKhoan($row['TaiKhoan'], $row['MatKhau'], $row['LoaiTK']);
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
            $users[] = new TaiKhoan($row['TaiKhoan'], $row['MatKhau'], $row['LoaiTK']);
        }

        return $users;
    }

    public static function getUserByuserName($TaiKhoan) {
        $db = Database::getInstance();
        $result = $db->getData('TaiKhoan','TaiKhoan', $TaiKhoan);


        while ($row = $result->fetch()) {
            return new TaiKhoan($row['TaiKhoan'], $row['MatKhau'], $row['LoaiTK']);
        }

        return null;
    }
    
    public function addTaiKhoan(){
        if (!$this->isValidUsername($this->taikhoan)) {
            return -10;
        }
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

    public function editTaiKhoan(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "TaiKhoan";

        // Mảng dữ liệu
        $data = array(
            "MatKhau" => $this->matkhau,
            "LoaiTK" => $this->loaitk
        );

        $where = "TaiKhoan = '$this->taikhoan'";
        // Gọi hàm thêm dữ liệu vào bảng
        return $db->update_data($table, $data, $where);
    }

    public function deleteTaiKhoan(){
        $db = Database::getInstance();
        
        $table = "TaiKhoan";
        $where = "TaiKhoan = '$this->taikhoan'";

        return $db->delete_data($table, $where);
    }

}
?>
