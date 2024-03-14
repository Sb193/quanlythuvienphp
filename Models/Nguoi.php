<?php
require_once 'Models/dbconfig.php';

class Nguoi{
    private $MaNguoi;
    private $HoTen;
    private $NgaySinh;
    private $DiaChi;
    private $Sdt;

    public function __construct($MaNguoi, $HoTen, $NgaySinh, $DiaChi, $Sdt){
        $this->MaNguoi = $MaNguoi;
        $this->HoTen = $HoTen;
        $this->NgaySinh = $NgaySinh;
        $this->DiaChi = $DiaChi;
        $this->Sdt = $Sdt;
    }
    
    public function getMaNguoi(){
        return $this->MaNguoi;
    }
    public function getHoTen(){
        return $this->HoTen;
    }
    public function getNgaySinh(){
        return $this->NgaySinh;
    }
    public function getDiaChi(){
        return $this->DiaChi;
    }
    public function getSdt(){
        return $this->Sdt;
    }
    public function setMANguoi($MaNguoi){
        $this->MaNguoi = $MaNguoi;
    }
    public function setHoTen($HoTen){
        $this->HoTen = $HoTen;
    }
    public function setNgaySinh($NgaySinh){
        $this->NgaySinh = $NgaySinh;
    }
    public function setDiaChi($DiaChi){
        $this->DiaChi = $DiaChi;
    }
    public function setSdt($Sdt){
        $this->Sdt = $Sdt;
    }

    public static function getNguoibyID($MaNguoi){
        $db = Database::getInstance();
        $result = $db->getData('Nguoi','MaNguoi',$MaNguoi);
        $data = [];
        foreach($result as $row){
            $nguoi = new Nguoi($row['MaNguoi'],$row['HoTen'],$row['NgaySinh'],$row['DiaChi'],$row['Sdt']);
            $data[] = $nguoi;
        }
        return $data;
    }

    public static function getNguoinew(){
        $db = Database::getInstance();
        $result = $db->getData('Nguoi');
        $nguoi = null;
        foreach($result as $row){
            $nguoi = new Nguoi($row['MaNguoi'],$row['HoTen'],$row['NgaySinh'],$row['DiaChi'],$row['Sdt']);
        }
        return $nguoi;
    }

    public function addNguoi(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "Nguoi";

        // Mảng dữ liệu
        $data = array(
            "HoTen" => $this->HoTen,
            "NgaySinh" => $this->NgaySinh,
            "DiaChi" => $this->DiaChi,
            "Sdt"=> $this->Sdt
        );

        // Gọi hàm thêm dữ liệu vào bảng
        return $db->insert_data($table, $data);
    }
    
}
?>