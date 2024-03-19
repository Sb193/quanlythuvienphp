<?php
    require_once "Models/dbconfig.php";
    class DauSach{
        private $MaDS;
        private $TenDS;
        private $SoLuong;
        private $TenTG;
        private $TheLoai;
        

        public function __construct($MaDS, $TenDS, $SoLuong, $TenTG, $TheLoai){
            $this->MaDS = $MaDS;
            $this->TenDS = $TenDS;
            $this->SoLuong = $SoLuong;
            $this->TenTG = $TenTG;
            $this->TheLoai = $TheLoai;
        }

        public function getMaDS(){
            return $this->MaDS;
        }
        public function getTenDS(){
            return $this->TenDS;
        }
        public function getSoLuong(){
            return $this->SoLuong;
        }
        public function getTenTG(){
            return $this->TenTG;
        }
        public function getTheLoai(){
            return $this->TheLoai;
        }
        public function setMaDS($MaDS){
            $this->MaDS = $MaDS;
        }
        public function setTenDS($TenDS){
            $this->TenDS = $TenDS;
        }
        public function setSoLuong($SoLuong){
            $this->SoLuong = $SoLuong;
        }
        public function setTenTG($TenTG){
            $this->TenTG = $TenTG;
        }
        public function setTheLoai($TheLoai){
            $this->TheLoai = $TheLoai;
        }

        public static function getSachs($MaDS){

        }

        public static function getDS($MaDS){
            $db = Database::getInstance();
            $sql = "";

            // $result = $db->getData($table, $field, $MaDS);
            // while($row = $result->fetch()){
            //     return new DauSach($row['MaDS'] , $row['TenDS'] , $row['SoLuong'] , $row['TenTG'] , $row[''])
            // }
        }

        public function deleteDauSach(){

        }

    }
?>