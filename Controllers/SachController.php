<?php
require_once 'Models/DauSach.php';
require_once 'Models/Sach.php';
require_once 'Models/TheLoai.php';
class SachController {
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
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        $index = "Views/Sach/index.php";
        $addlink = "index.php?controller=sach&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = DauSach::getDSs();
        include "Views/Shared/HomeView/layout.php";
        
    }

    private function add() {
        $erorr = "";
        $erorr_namebook = "";
        $erorr_nametg = "";
        $erorr_cateid = "";
        $choicetl = TheLoai::getAllTL();

        if (isset($_POST["add_sach"])) {
            $TenDS =$_POST["TenDS"];
            $TenTG = $_POST["TenTG"];
            $MaTL = $_POST["MaTL"];

            if ($TenDS == ""){
                $erorr_namebook = "Vui lòng nhập tên sách";
                $content = "Views/Sach/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if ($TenTG == "") {
                $erorr_nametg = "Vui lòng nhập tên tác giả";
                $content = "Views/Sach/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else if($MaTL == ""){
                $erorr_cateid = "Vui lòng chọn thể loại";
                $content = "Views/Sach/add.php";
                include "Views/Shared/HomeView/layout.php";
            } else {
                $dausach = new DauSach("",$TenDS,"",$TenTG,new TheLoai($MaTL , ""));
                $result = $dausach->addDauSach();
                if($result < 0){
                    $erorr = "Thêm đầu sách không thành công";
                    $content = "Views/Sach/add.php";
                    include "Views/Shared/HomeView/layout.php";
                } else {
                    header("location:index.php?controller=sach&action=index");
                }
            } 
            
        } else {
            $content = "Views/Sach/add.php";
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

    private function details(){
        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $dausach = DauSach::getDS($id);
            if($dausach){
                $sachs = DauSach::getSachs($id);
                
            }
        }
    }

    
}
?> 