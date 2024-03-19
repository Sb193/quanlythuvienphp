<?php
require_once 'Models/TheLoai.php';
require_once 'Models/DauSach.php';
class TheLoaiController {
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
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $index = "Views/TheLoai/index.php";
        $addlink = "index.php?controller=theloai&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = TheLoai::getAllTL();
        include "Views/Shared/HomeView/layout.php";
        
    }

    private function add() {
        $erorr = "";
        $erorr_name = "";

        if (isset($_POST["add_theloai"])) {
            $tl =$_POST["TenTL"];

            if ($tl == ""){
                $erorr_taikhoan = "Vui lòng nhập tên thể loại";
                $content = "Views/TheLoai/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if (strlen($tl) < 6) {
                $erorr_taikhoan = "Vui lòng nhập tên thể loại tối thiểu 6 ký tự";
                $content = "Views/TheLoai/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else {
                $theloai = new TheLoai("",$tl);
                $result = $theloai->addTheLoai();
                if($result < 0){
                    $erorr = "Thêm thể loại không thành công";
                    $content = "Views/TaiKhoan/add.php";
                    include "Views/Shared/HomeView/layout.php";
                } else {
                    header("location:index.php?controller=theloai&action=index");
                }
            } 
            
        } else {
            $content = "Views/TheLoai/add.php";
            include "Views/Shared/HomeView/layout.php";
        }

    }

    private function edit() {
        $erorr = "";
        $erorr_name = "";
        if (isset($_GET["id"])) {
            $data = TheLoai::getTLbyID(intval($_GET["id"]));
        } else {
            echo "404 not found";
        }

        

        if (isset($_POST["add_theloai"])) {
            $tl =$_POST["TenTL"];

            if ($tl == ""){
                $erorr_taikhoan = "Vui lòng nhập tên thể loại";
                $content = "Views/TheLoai/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if (strlen($tl) < 6) {
                $erorr_taikhoan = "Vui lòng nhập tên thể loại tối thiểu 6 ký tự";
                $content = "Views/TheLoai/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else {
                $theloai = new TheLoai("",$tl);
                $result = $theloai->addTheLoai();
                if($result < 0){
                    $erorr = "Thêm thể loại không thành công";
                    $content = "Views/TaiKhoan/add.php";
                    include "Views/Shared/HomeView/layout.php";
                } else {
                    header("location:index.php?controller=theloai&action=index");
                }
            } 
            
        } else {
            $content = "Views/TheLoai/add.php";
            include "Views/Shared/HomeView/layout.php";
        }
    }

    private function delete() {

    }

    
}
?> 