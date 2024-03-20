<?php
require_once "Models/dbconfig.php";
class TheThuVien
{
    private $MaTTV;
    public  $ThoiHan;
    public function __construct($MaTTV, $ThoiHan) {
        $this->MaTTV    = $MaTTV;
        $this->ThoiHan  = $ThoiHan;;
    }
    public function getMaTTV() {
        return $this->MaTTV;
    }
    public function setMaTTV($MaTTV) {
        $this->MaTTV = $MaTTV;
    }
    public function getThoiHan() {
        return $this->ThoiHan;
    }
    public function setThoiHan($ThoiHan) {
        $this->ThoiHan = $ThoiHan;
    }
    public static function getTTVnew(){
        $db = Database::getInstance();
        $result = $db->getData('TheThuVien');
        $ttv = null;
        foreach($result as $row){
            $ttv = new TheThuVien($row['MaTTV'], $row['ThoiHan']);
        } var_dump($ttv);
        return $ttv;
    }
    public function addTTV() {
        $db = Database::getInstance();

        // Tên của bảng
        $table = "TheThuVien";

        // Mảng dữ liệu
        $data = array(
            "MaDG"      => 01,
            "ThoiHan"   => null
        );

        // Gọi hàm thêm dữ liệu vào bảng
        return $db->insert_data($table, $data);
    }
}
?>