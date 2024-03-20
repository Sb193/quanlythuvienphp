<?php 
    require_once "Models/dbconfig.php";
    require_once "Models/ChiTietPhieuMuon.php";
    require_once "Models/NhanVien.php";
    class PhieuMuon{
        private $MaPM;
	    private $MaTTV;
	    private $MaNV;
	    private $NgayMuon;
	    private $NgayTra;
	    private $LuaChon;
	    private $TrangThai;
        private $PhieuPhat;
    
	/**
	 * @return mixed
	 */
	public function getMaPM() {
		return $this->MaPM;
	}
	
	/**
	 * @param mixed $MaPM 
	 * @return self
	 */
	public function setMaPM($MaPM): self {
		$this->MaPM = $MaPM;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getMaTTV() {
		return $this->MaTTV;
	}
	
	/**
	 * @param mixed $MaTTV 
	 * @return self
	 */
	public function setMaTTV($MaTTV): self {
		$this->MaTTV = $MaTTV;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getMaNV() {
		return $this->MaNV;
	}
	
	/**
	 * @param mixed $MaNV 
	 * @return self
	 */
	public function setMaNV($MaNV): self {
		$this->MaNV = $MaNV;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNgayMuon() {
		return $this->NgayMuon;
	}
	
	/**
	 * @param mixed $NgayMuon 
	 * @return self
	 */
	public function setNgayMuon($NgayMuon): self {
		$this->NgayMuon = $NgayMuon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNgayTra() {
		return $this->NgayTra;
	}
	
	/**
	 * @param mixed $NgayTra 
	 * @return self
	 */
	public function setNgayTra($NgayTra): self {
		$this->NgayTra = $NgayTra;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getLuaChon() {
		return $this->LuaChon;
	}
	
	/**
	 * @param mixed $LuaChon 
	 * @return self
	 */
	public function setLuaChon($LuaChon): self {
		$this->LuaChon = $LuaChon;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTrangThai() {
		return $this->TrangThai;
	}
	
	/**
	 * @param mixed $TrangThai 
	 * @return self
	 */
	public function setTrangThai($TrangThai): self {
		$this->TrangThai = $TrangThai;
		return $this;
	}

    public function __construct($MaPM , $MaTTV , $MaNV , $NgayMuon , $NgayTra , $LuaChon , $TrangThai) {
        $this->MaPM = $MaPM;
        $this->MaTTV = $MaTTV;
        $this->MaNV = $MaNV;
        $this->NgayMuon = $NgayMuon;
        $this->NgayTra = $NgayTra;
        $this->LuaChon = $LuaChon;
        $this->TrangThai = $TrangThai;
    }

    public static function getPhieuMuon() {
        $db = Database::getInstance();
        $phieumuon = [];
        $table = "PhieuMuon";
        $result = $db->getData($table);
        while ($row = $result->fetch()) {
            $phieumuon[] = new PhieuMuon($row['MaPM'] , $row['MaTTV'] ,$row['MaNV'], $row['NgayMuon'] , $row['NgayTra'] , $row['LuaChon'] , $row['TrangThai']);
        }
        return $phieumuon;
    }
}
?>