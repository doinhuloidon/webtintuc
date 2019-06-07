<?php

include('controller/c_user.php');
$c_user = new C_user();
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if($password == $repassword){
        $dangki = $c_user->dang_ky($name,$email,$password);
        
    }
    else{
        $_SESSION['error']="Đăng kí không thành công";
        header("location:dangki.php");
    }
}
?>
