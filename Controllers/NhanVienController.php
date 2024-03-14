<?php
require_once 'Models/NhanVien.php';
class NhanVienController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'add':
                $this->add();
                break;
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $index = "Views/NhanVien/index.php";
        $addlink = "index.php?controller=nhanvien&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = NhanVien::getData();
        include "Views/Shared/HomeView/layout.php";
    }

    private function add() {
        $erorr ="";
        $erorr_manv ="";
        $erorr_hoten ="";
        $erorr_ngaysinh ="";
        $erorr_diachi ="";
        $erorr_sdt ="";
        $erorr_taikhoan ="";
        $erorr_matkhau ="";
        if (isset($_POST["add_nhanvien"])) {
            $manv =$_POST["manv"];
            $hoten =$_POST["hoten"];
            $ngaysinh =$_POST["ngaysinh"];
            $diachi =$_POST["diachi"];
            $sdt =$_POST["sdt"];
            $taikhoan =$_POST["taikhoan"];
            $matkhau =$_POST["matkhau"];

            if ($manv == "") {
                $erorr_manv = "Vui lòng nhập mã nhân viên";
            } else if ($hoten == "") {
                $erorr_hoten = "Vui lòng nhập họ tên";
            } else if ($ngaysinh == "") {
                $erorr_ngaysinh = "Vui lòng nhập ngày sinh";
            } else if ($diachi == "") {
                $erorr_diachi = "Vui lòng nhập địa chỉ";
            } else if ($sdt == "") {
                $erorr_sdt = "Vui lòng nhập số điện thoại";
            } else if (strlen($sdt) != 10) {
                $erorr_sdt = "Vui lòng nhập đúng định dạng số điệ thoại gồm 10 chữ số";
            } else if ($taikhoan == ""){
                $erorr_taikhoan = "Vui lòng nhập tài khoản";
            } else if (strlen($taikhoan) < 6) {
                $erorr_taikhoan = "Vui lòng nhập tài khoản tối thiểu 6 ký tự";
            } else if ($matkhau == ""){
                $erorr_matkhau = "Vui lòng nhập mật khẩu";
            } else if (strlen($matkhau) < 6) {
                $erorr_matkhau = "Vui lòng nhập mật khẩu tối thiểu 6 ký tự";
            }

            
            
            
        }
        $content = "Views/NhanVien/add.php";
        include "Views/Shared/HomeView/layout.php";
    }


    
}
?> 