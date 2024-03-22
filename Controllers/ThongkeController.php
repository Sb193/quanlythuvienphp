<?php
require_once 'Models/TheLoai.php';
require_once 'Models/DauSach.php';
require_once 'Models/dbconfig.php';
require_once 'Models/PhieuMuon.php';
require_once 'Models/DocGia.php';

class ThongKeController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'index':
                $this->thongkesach();
                break;
            case 'data':
                $this->datasach();
                break;
                case 'datapie':
                    $this->datasachpie();
                    break;
            case 'docgia':
                $this->docgia();
                break;
            case 'muontra':
                $this->muontra();
                break;
            default:
                $this->thongkesach();
                break;
        }
    }

    private function thongkesach() {
        $content = "Views/ThongKe/thongkesach.php";
        include "Views/Shared/HomeView/layout.php";
        
    }

    private function datasach() {
        $db = Database::getInstance();
        $sql = "SELECT AllMonths.Thang, IFNULL(SachMuon.SoLuongSachMuon, 0) AS SoLuong FROM ( SELECT 1 AS Thang UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 ) AS AllMonths LEFT JOIN ( SELECT MONTH(NgayMuon) AS Thang, COUNT(*) AS SoLuongSachMuon FROM PhieuMuon PM JOIN ChiTietPhieuMuon CT ON PM.MaPM = CT.MaPM GROUP BY MONTH(NgayMuon) ) AS SachMuon ON AllMonths.Thang = SachMuon.Thang ORDER BY AllMonths.Thang;";
        // Truy vấn dữ liệu từ cơ sở dữ liệu
        $result = $db->getDatas($sql);
        $data = array();
        while ($row = $result->fetch()) {

            $thang = $row["Thang"];
            $data[] = array(
                "Thang"=> "Tháng $thang",
                "SoLuong"=> $row["SoLuong"],
            ); 
        }
        // Chuyển đổi dữ liệu thành định dạng JSON
        echo json_encode($data);
    }

    private function datasachpie() {
        $db = Database::getInstance();
        $sql = "SELECT TrangThai, COUNT(*) AS SoLuong FROM Sach WHERE TrangThai IN (0, 1) GROUP BY TrangThai;";
        // Truy vấn dữ liệu từ cơ sở dữ liệu
        $result = $db->getDatas($sql);
        $data = array();
        while ($row = $result->fetch()) {
            $field = "Thư viện";
            if ($row["TrangThai"] == 0) {
                $field = "Đang cho mượn";
            }
            $data[] = array(
                "TrangThai"=> $field,
                "SoLuong"=> $row["SoLuong"],
            ); 
        }
        // Chuyển đổi dữ liệu thành định dạng JSON
        echo json_encode($data);
    }
    private function docgia() {
       
        $index = "Views/DocGia/index.php";
        $addlink = "index.php?controller=docgia&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = DocGia::getData();
        include "Views/Shared/HomeView/layout.php";
        
    }

    private function datadocgia() {
        $db = Database::getInstance();
        $sql = "SELECT AllMonths.Thang, IFNULL(SachMuon.SoLuongSachMuon, 0) AS SoLuong FROM ( SELECT 1 AS Thang UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12 ) AS AllMonths LEFT JOIN ( SELECT MONTH(NgayMuon) AS Thang, COUNT(*) AS SoLuongSachMuon FROM PhieuMuon PM JOIN ChiTietPhieuMuon CT ON PM.MaPM = CT.MaPM GROUP BY MONTH(NgayMuon) ) AS SachMuon ON AllMonths.Thang = SachMuon.Thang ORDER BY AllMonths.Thang;";
        // Truy vấn dữ liệu từ cơ sở dữ liệu
        $result = $db->getDatas($sql);
        $data = array();
        while ($row = $result->fetch()) {

            $thang = $row["Thang"];
            $data[] = array(
                "Thang"=> "Tháng $thang",
                "SoLuong"=> $row["SoLuong"],
            ); 
        }
        // Chuyển đổi dữ liệu thành định dạng JSON
        echo json_encode($data);
    }
    private function muontra() {
        
        $index = "Views/PhieuMuon/index.php";
        $addlink = "index.php?controller=phieumuon&action=add";
        $content = "Views/Shared/IndexView/layout.php";
        $data = PhieuMuon::getPhieuMuon();
        include "Views/Shared/HomeView/layout.php";
            
        
    }


    
}
?> 