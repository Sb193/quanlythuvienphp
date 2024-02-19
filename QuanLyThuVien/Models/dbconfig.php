<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'quanlythuviendb';

        private $conn = NULL;
        private $result = NULL;

        // Ket noi voi database
        public function connect(){
            $this->conn = new mysqli($this->hostname , $this->username , $this->pass , $this->dbname);
            if (!$this->conn){
                echo "Kết nối thất bại";
                exit();
            } else {
                mysqli_set_charset( $this->conn , 'utf8');
            }
            return $this->conn;
        }

        // Thuc thi cau lenh truy van
        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // Phuong thuc lay du lieu
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            } else {
                $data = 0;
            }

            return $data;
        }

        // Phuong thuc lay toan bo du lieu
        public function getAllData(){
            if(!$this->result){
                $data = 0;
            } else {
                while ($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        // Phuong thuc dem so ban ghi

        // Phuong thuc them du lieu

        public function insertData($table, $data) {
            // Tạo danh sách các cột và giá trị tương ứng
            $columns = implode(", ", array_keys($data));
            $values  = "'" . implode("', '", array_values($data)) . "'";
        
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        
            // Thực hiện câu lệnh SQL
            if ($this->conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        
        }

        // Phuong thuc xoa du lieu

        public function deleteData($table, $condition) {     
            // Kiểm tra kết nối
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        
            // Tạo câu lệnh SQL
            $sql = "DELETE FROM $table WHERE $condition";
        
            // Thực hiện câu lệnh SQL
            if ($this->conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $this->conn->error;
            }
        
        }
    }
?>