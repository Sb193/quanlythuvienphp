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
        return null;
    }
    
    
    public function addSach(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "Sach";

        // Mảng dữ liệu
        $data = array(
            "MaSach" => $this->MaSach,
            "MaDS" => $this->MaDS,
            "TrangThai" => $this->TrangThai
        );

        // Gọi hàm thêm dữ liệu vào bảng
        return $db->insert_data($table, $data);
    }

    public function editTaiKhoan(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "Sach";

        // Mảng dữ liệu
        $data = array(
            "MaDS" => $this->MaDS,
            "TrangThai" => $this->TrangThai
        );

        $where = "MaSach = '$this->MaSach'";
        // Gọi hàm thêm dữ liệu vào bảng
        return $db->update_data($table, $data, $where);
    }

    public function deleteSach(){
        $db = Database::getInstance();
        
        $table = "Sach";
        $where = "MaSach = '$this->MaSach'";

        return $db->delete_data($table, $where);
    }

}
?>
