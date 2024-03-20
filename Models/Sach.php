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

        $result = $db->insert_data($table, $data);
        if($result > 0){
            $dausach = DauSach::getDS($this->MaDS);
            $dausach->setSoLuong($dausach->getSoLuong() + 1);
            $r = $dausach->updateDauSach();
        } else {
            return 0;
        }

        // Gọi hàm thêm dữ liệu vào bảng
        return $r;
    }

    public function editSach(){
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

        $result =  $db->delete_data($table, $where);
        if($result > 0){
            $dausach = DauSach::getDS($this->MaDS);
            $dausach->setSoLuong($dausach->getSoLuong() - 1);
            $r = $dausach->updateDauSach();
        } else {
            return 0;
        }

        // Gọi hàm thêm dữ liệu vào bảng
        return $r;
    }

}
?>
