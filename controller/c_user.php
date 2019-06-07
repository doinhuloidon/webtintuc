<?php
include('controller.php');
include('model/m_user.php');

class C_user extends Controller{

	public function getDangki(){
		return $this->loadView('dangki');
	}
	public function postDangki($name,$email,$password)
    {
    	//return $this->loadView('dangki',)
        
    	$m_user = new M_user();
        $id_user = $m_user->register($name, $email, $password);
        if($id_user>0){
        	$_SESSION['success'] = "Đăng kí thành công";
			header("location:trang-chu");
			if(isset($_SESSION['error'])){
				unset($_SESSION['error']); 
			}
        }
        else{
        	$_SESSION['error']="Đăng kí không thành công";
			header("location:dang-ki");
        }
        
    }
    function getDangnhap(){
    	return $this->loadView('dangnhap');
    }
    function luu_dang_nhap($ten,$mk)
	{	
		$m_user = new M_user();
		$user = $m_user->timUser($ten,$mk);
		if($user == true){
			$_SESSION['user_name'] = $user->name;
			$_SESSION['user_id'] = $user->id; //luc them binh luan
			unset($_SESSION['chua_dang_nhap']); //lúc thêm bình luận
			header('location:trang-chu');
		}
		else{
            $_SESSION['user_error'] = "Thông tin đăng nhập không hợp lệ";
            header("location:dang-nhap");   
        }
	}
	
	function dangxuat()
	{
		session_destroy();
		header("location:trang-chu");	
	}
   
}

?>