
<?php
$c_user = new C_user();
if(isset($_POST['submit']))
{ 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if($password == $repassword){
        $dangki = $c_user->postDangki($name,$email,$password);
        
    }
    else{
        $_SESSION['error']="Đăng kí không thành công";
        header("location:dangki.php");
    }
}
?>
<!-- Page Content -->
<div class="container">

   <!-- slider -->
   <div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <?php
        if(isset($_SESSION['error'])){
            echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
        }
        ?>
        <div class="panel panel-default">
         <div class="panel-heading">Đăng ký tài khoản</div>
         <div class="panel-body">
           <form method="POST"  action="dangki.php">
              <div>
                 <label>Họ tên</label>
                 <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
             </div>
             <br>
             <div>
                 <label>Email</label>
                 <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
                 >
             </div>
             <br>	
             <div>
                 <label>Nhập mật khẩu</label>
                 <input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
             </div>
             <br>
             <div>
                 <label>Nhập lại mật khẩu</label>
                 <input type="password" class="form-control" name="repassword" aria-describedby="basic-addon1">
             </div>
             <br>
             <div style="text-align: center;">
                 <button type="submit" name="submit" class="btn btn-success">Đăng ký</button>
             </div>
         </form>
     </div>
 </div>
</div>
<div class="col-md-2">
</div>
</div>
<!-- end slide -->
</div>
<!-- end Page Content -->
