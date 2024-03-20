<?php
require_once 'Models/DauSach.php';
require_once 'Models/Sach.php';
require_once 'Models/TheLoai.php';
require_once 'Models/PhieuMuon.php';
require_once 'Models/ChiTietPhieuMuon.php';

class PhieuMuonController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'add':
                $this->add();
                break;
            case 'edit':
                $this->edit();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'detail':
                $this->detail();
                break;
            case 'addbook':
                $this->addbook();
                break;
            case 'deletebook':
                $this->deletebook();
                break;
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $index = "Views/PhieuMuon/index.php";
        $addlink = "index.php?controller=phieumuon&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = PhieuMuon::getPhieuMuon();
        include "Views/Shared/HomeView/layout.php";
        
    }

    private function add() {
        $erorr = "";
        $erorr_mattv = "";
        $erorr_manv = "";
        $erorr_ngaymuon = "";
        $erorr_ngaytra = "";
        

        if (isset($_POST["add_sach"])) {
            $MaTTV =$_POST["MaTTV"];
            $MaNV = $_POST["MaNV"];
            $NgayMuon = $_POST["NgayMuon"];
            $NgayTra = $_POST["NgayTra"];
            $LuaChon = $_POST["LuaChon"];
            $TrangThai = $_POST["TrangThai"];

            $thethuvien = TheThuVien::getTTVbyID($MaNV);

            if ($MaTTV == ""){
                $erorr_mattv = "Vui lòng nhập mã thẻ thư viện";
                $content = "Views/PhieuMuon/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if (!$thethuvien) {
                $erorr_mattv = "Thẻ thư viện không tồn tại!";
                $content = "Views/PhieuMuon/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if($thethuvien->getThoiHan() < date("Y-m-d",time())) {
                $erorr_mattv = "Thẻ thư viện đã hết hạn!";
                $content = "Views/PhieuMuon/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if($thethuvien->getThoiHan() < date("Y-m-d",time())) {
                $erorr_mattv = "Thẻ thư viện đã hết hạn!";
                $content = "Views/PhieuMuon/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else {
                $dausach = new DauSach("",$TenDS,"",$TenTG,new TheLoai($MaTL , ""));
                $result = $dausach->addDauSach();
                if($result < 0){
                    $erorr = "Thêm đầu sách không thành công";
                    $content = "Views/Sach/add.php";
                    include "Views/Shared/HomeView/layout.php";
                } else {
                    header("location:index.php?controller=phieumuon&action=add");
                }
            } 
            
        } else {
            $content = "Views/PhieuMuon/add.php";
            include "Views/Shared/HomeView/layout.php";
        }
    }

    private function edit() {
        $erorr = "";
        $erorr_namebook = "";
        $erorr_nametg = "";
        $erorr_cateid = "";
        $choicetl = TheLoai::getAllTL();

        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $data = DauSach::getDS($id);
            if ($data){
                if (isset($_POST["edit_sach"])) {
                    $MaDS = $_POST["MaDS"];
                    $TenDS =$_POST["TenDS"];
                    $TenTG = $_POST["TenTG"];
                    $MaTL = $_POST["MaTL"];
        
                    if ($TenDS == ""){
                        $erorr_namebook = "Vui lòng nhập tên sách";
                        $content = "Views/Sach/edit.php";
                        include "Views/Shared/HomeView/layout.php";
                    } else if ($TenTG == "") {
                        $erorr_nametg = "Vui lòng nhập tên tác giả";
                        $content = "Views/Sach/edit.php";
                        include "Views/Shared/HomeView/layout.php";
                    } else if($MaTL == ""){
                        $erorr_cateid = "Vui lòng chọn thể loại";
                        $content = "Views/Sach/edit.php";
                        include "Views/Shared/HomeView/layout.php";
                    } else {
                        $dausach = new DauSach($MaDS ,$TenDS,"",$TenTG,new TheLoai($MaTL , ""));
                        $result = $dausach->editDauSach();
                        if($result < 0){
                            $erorr = "Cập nhật đầu sách không thành công";
                            $content = "Views/Sach/edit.php";
                            include "Views/Shared/HomeView/layout.php";
                        } else {
                            header("location:index.php?controller=sach&action=index");
                        }
                    } 
                    
                } else {
                    $content = "Views/Sach/edit.php";
                    include "Views/Shared/HomeView/layout.php";
                }
            } else {}
        } else {}
    }

    private function delete() {
        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $dausach = DauSach::getDS($id);
            if($dausach){
                $result = $dausach->deleteDauSach();
                if ($result >= 0){
                    header("location:index.php?controller=sach&action=index");
                } else {
                    
                }
            } else {
                
            }
        } else {}
    }

    private function detail(){
        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $dausach = DauSach::getDS($id);
            if($dausach){
                $sachs = DauSach::getSachs($id);
                $content = "Views/Sach/detail.php";
                include "Views/Shared/HomeView/layout.php";
            }
        }
    }

    private function addbook(){
        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $dausach = DauSach::getDS($id);
            $erorr = "";
            $erorr_masach = "";
            $erorr_trangthai = "";

            if (isset($_POST["add_sach"])) {
                $MaSach =$_POST["MaSach"];
                $MaDS = $_POST["MaDS"];
                $TrangThai = $_POST["TrangThai"];

                if ($MaSach == ""){
                    $erorr_masach = "Vui lòng nhập mã sách";
                    $content = "Views/Sach/addbook.php";
                    include "Views/Shared/HomeView/layout.php";
                } else {
                    $sach = new Sach($MaSach , $MaDS ,$TrangThai);
                    $result = $sach->addSach();
                    if($result < 0){
                        $erorr = "Thêm sách không thành công";
                        $content = "Views/Sach/addbook.php";
                        include "Views/Shared/HomeView/layout.php";
                    } else {
                        header("location:index.php?controller=sach&action=detail&id=$MaDS");
                    }
                } 
                
            } else {
                $content = "Views/Sach/addbook.php";
                include "Views/Shared/HomeView/layout.php";
            }
        }
    }

    private function deletebook(){
        if (isset($_GET["id"])){
        $id = $_GET["id"];
            $sach = Sach::getSachbyID($id);
            if($sach){
                $result = $sach->deleteSach();
                $mads = $sach->getMaDS();
                if ($result >= 0){
                    header("location:index.php?controller=sach&action=detail&id=$mads");
                } else {
                    
                }
            } else {
                
            }
        } else {}
    }

    
}
?> 