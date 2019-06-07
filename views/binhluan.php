<?php
session_start();
include('../controller/c_tintuc.php');
if(isset($_SESSION['user_id'])){

	if(isset($_POST['binhluan'])){
		$c_tintuc = new C_tintuc();
		$noidung = $_POST['noidung'];
		$id_tin = $_POST['id_tin'];
		$id_user = $_SESSION['user_id'];
		$c_tintuc->them_binh_luan($id_user,$id_tin,$noidung);
	}
}
else{
	$_SESSION['chua_dang_nhap'] = 'Bạn vui lòng đăng nhập để thêm bình luận';
	header("location:" . $_SERVER['HTTP_REFERER']);
}
?>