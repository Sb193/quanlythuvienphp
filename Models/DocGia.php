<?php
require_once 'Models/dbconfig.php';
require_once("Models/Nguoi.php");
require_once("TheThuVien.php");

class DocGia extends Nguoi
{
    private $MaDG;
    public $LoaiDG;
    public $MaTTV;
    public function __construct($MaDG = null, $LoaiDG = null, $MaTTV = null, $MaNguoi = null , $HoTen = null , $NgaySinh = null , $DiaChi = null , $Sdt = null) {
        parent::__construct($MaNguoi , $HoTen , $NgaySinh , $DiaChi , $Sdt);
        $this->MaDG = $MaDG;
        $this->LoaiDG = $LoaiDG;
        $this->MaTTV = $MaTTV;   
    }
    public function getMaDG() {
        return $this->MaDG;
    }
    public function setMaDG($MaDG) {
        $this->MaDG = $MaDG;
    }
    public function getLoaiDG() {
        return $this->LoaiDG;
    }
    public function setLoaiDG($LoaiDG) {
        $this->LoaiDG = $LoaiDG;
    }
    public function getMaTTV() {
        return $this->MaTTV;
    }
    public function setMaTTV($MaTTV) {
        $this->MaTTV = $MaTTV;
    }
    public static function getData() {
        $docgias = [];
        $sql = "SELECT docgia.MaDG, docgia.LoaiDG, docgia.MaTTV, nguoi.MaNguoi, nguoi.HoTen, nguoi.NgaySinh, nguoi.DiaChi, nguoi.Sdt FROM docgia, nguoi WHERE docgia.MaNguoi = nguoi.MaNguoi;";
        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $docgias[] = new DocGia($row['MaDG'], $row['LoaiDG'], $row['MaTTV'], $row['MaNguoi'], $row['HoTen'],$row['NgaySinh'],$row['DiaChi'],$row['Sdt']);
        }
        return $docgias;
    }
    public static function getDocGiaById($id) {
        $docgia = null;
        $sql = "SELECT docgia.MaDG, docgia.LoaiDG, docgia.MaTTV, nguoi.HoTen, nguoi.NgaySinh, nguoi.DiaChi, nguoi.Sdt FROM docgia, nguoi WHERE docgia.MaNguoi = nguoi.MaNguoi AND docgia.MaDG = '$id';";
        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $docgia = new DocGia($row['MaDG'], $row['MaTTV'], $row['HoTen'],$row['NgaySinh'],$row['DiaChi'],$row['Sdt']);
        }
        return $docgia;
    }
    public function addDocGia(){
        $db = Database::getInstance();
        // Tên của bảng
        $table = "DocGia";
        $nguoi = new Nguoi($this->getMaNguoi(),$this->getHoTen(), $this->getNgaySinh(), $this->getDiaChi(),$this->getSdt());
        // Mảng dữ liệu
        $data = array(
            "MaDG"      =>  $this->MaDG,
            "MaTTV"     =>  $this->MaTTV,
            "LoaiDG"    =>  $this->LoaiDG,
            "MaNguoi"   =>  $this->MaNguoi
        );

        // Gọi hàm thêm dữ liệu vào bảng
        return $db->insert_data($table, $data);
    }
}
?>