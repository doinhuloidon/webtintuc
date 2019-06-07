<?php
include('database.php');
class M_tintuc extends database{

	//1
	function getSlide(){
		$sql = 'select * from slide';
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	//2 
	function getTheloai()
	{
		$sql="select t.*, GROUP_CONCAT(DISTINCT l.id, ':', l.Ten,':', l.TenKhongDau) AS tenLoaitin, tt.id as idTin, tt.TieuDe as TieuDeTin, tt.TieuDeKhongDau as TDKDTin, tt.TomTat as TomTatTin, tt.Hinh as HinhTin  from theloai t inner join loaitin l on t.id = l.idTheLoai inner join tintuc tt on tt.idLoaiTin = l.id group by t.id";
		$this->setQuery($sql);
		return $this->loadAllRows();	
	}
	//lấy tên thể loại trên title trang loaitin
	function getLoaiTinById($id_loai){
		$sql = "Select Ten from loaitin where id = $id_loai";
		$this->setQuery($sql);
		return $this->loadRow(array($id_loai));
	}
	//lấy tất cả thể loại trên table loaitin
	function getLoaitin(){
		$sql = "Select Ten, id from loaitin";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	//phân trang
	function getTintucPhantrang($id_loai,$vt=-1,$limit=-1)
	{
		$sql="select tt.*, lt.TenKhongDau as ten_khong_dau from tintuc tt inner join loaitin lt on tt.idLoaiTin = lt.id where idLoaiTin = $id_loai";
		if ($vt>-1 && $limit>0) {
			$sql .=" limit $vt,$limit";
		}
		$this->setQuery($sql);
		return $this->loadAllRows();	
	}
	//chi tiết tin
	function getTintucById($id_tin){
		$sql = "Select * from tintuc where id = $id_tin";
		$this->setQuery($sql);
		return $this->loadRow(array($id_tin));
	}
	//lấy tất cả bình luận
	function getComment($id_tin){
		$sql = "select cm.*, u.name from comment cm inner join users u on u.id = cm.idUser where idTinTuc = $id_tin";
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_tin));
	}

	//tin liên quan
	function getRelatedNews($alias){

		$sql = "select tt.*,lt.TenKhongDau as ten_khong_dau from tintuc tt inner join loaitin lt on lt.id = tt.idLoaiTin where lt.TenKhongDau = '$alias' limit 0,4";
		$this->setQuery($sql);
		return $this->loadAllRows(array($alias));
	}
	//tin nổi bật không cần truyền tham số
	function getTinNoibat(){
		$sql = "select tt.*,lt.TenKhongDau as ten_khong_dau from tintuc tt inner join loaitin lt on lt.id = tt.idLoaiTin where tt.NoiBat = 1 limit 0,4";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


	//thêm bình luận sau khi thực hiện chức năng đăng nhập và đăng kí
	function addComment($id_user,$id_tin,$noidung){
		$query = "INSERT INTO comment(idUser, idTinTuc, NoiDung) VALUES(?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($id_user, $id_tin, $noidung));

	}

	function themBaiviet($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$noibat,$id_loaitin){
		$query = "INSERT INTO tintuc(TieuDe, TieuDeKhongDau, TomTat, NoiDung, Hinh, NoiBat, idLoaiTin) VALUES(?,?,?,?,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($tieude,$tieudekhongdau,$tomtat,
			$noidung,$hinh,$noibat,$id_loaitin));

	}

	function search($key){
		$sql = "select tt.*,lt.TenKhongDau as ten_khong_dau from tintuc tt inner join loaitin lt on lt.id = tt.idLoaiTin where TieuDe like '%$key%' or TomTat like '%$key%'";
		$this->setQuery($sql);
		return $this->loadAllRows(array($key));
	}




}

?>