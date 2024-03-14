<?php
require_once("Models/TaiKhoan.php");
require_once("Models/Nguoi.php");
require_once 'Models/dbconfig.php';
class NhanVien extends Nguoi{
    private $MaNV;
    private $TaiKhoan;
    public function __construct($MaNguoi = null , $HoTen = null , $NgaySinh = null , $DiaChi = null , $Sdt = null , $MaNV = null , $TaiKhoan = null){
        parent::__construct($MaNguoi , $HoTen , $NgaySinh , $DiaChi , $Sdt);
        $this->MaNV = $MaNV;
        $this->TaiKhoan = $TaiKhoan;
    }

    public function getMaNV(){
        return $this->MaNV;
    }
    public function getTaiKhoan(){
        return $this->TaiKhoan;
    }

    public function setMaNV($MaNV){
        $this->MaNV = $MaNV;
    }
    public function setTaiKhoan($TaiKhoan){
        $this->TaiKhoan=$TaiKhoan;
    }

    public static function getData(){
        $nhanviens = [];
        $sql = "SELECT nhanvien.MaNV,nguoi.MaNguoi,taikhoan.TaiKhoan,nguoi.HoTen,nguoi.NgaySinh,nguoi.DiaChi,nguoi.Sdt,taikhoan.MatKhau,taikhoan.LoaiTK FROM nhanvien , nguoi , taikhoan WHERE nhanvien.MaNguoi = nguoi.MaNguoi AND nhanvien.TaiKhoan = taikhoan.TaiKhoan;";
        $db = Database::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $TaiKhoan = new User($row['TaiKhoan'],$row['MatKhau'],$row['LoaiTK']);
            $nhanviens[] = new NhanVien($row['MaNguoi'],$row['HoTen'],$row['NgaySinh'],$row['DiaChi'],$row['Sdt'],$row['MaNV'],$TaiKhoan);
        }

        return $nhanviens;
    }

    public function addNhanVien(){
        $db = Database::getInstance();

        // Tên của bảng
        $table = "NhanVien";

        $nguoi = new Nguoi($this->getMaNguoi(),$this->getHoTen(), $this->getNgaySinh(), $this->getDiaChi(),$this->getSdt());
        $taikhoan = new User($this->TaiKhoan->getTaiKhoan(),$this->TaiKhoan->getMatKhau(),$this->TaiKhoan->getLoaiTK());

        if ($taikhoan->addTaiKhoan() > 0){
            if ($nguoi->addNguoi() > 0){
                $nguoinew = $nguoi->getNguoinew();
                $data = array(
                    "MaNV" => $this->MaNV,
                    "TaiKhoan" => $taikhoan->getTaiKhoan(),
                    "MaNguoi" => $nguoinew->getMaNguoi(),
                );
                return $db->insert_data($table, $data);
            } else {
                // Xoa Tai khoan vừa tạo
                return -3;
            }
        } else {
            return -2;
        }
        
    }
}
?>