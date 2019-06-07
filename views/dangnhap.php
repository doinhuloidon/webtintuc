<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $c_user = new C_user();
    $user = $c_user->luu_dang_nhap($email,$password);
    
}

?>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
            <?php
                if(isset($_SESSION['user_error'])){
                    echo '<div class="alert alert-danger">'.$_SESSION['user_error'].'</div>';
                }
            ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form method="post" action="dangnhap.php">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
                            <div style="text-align: center;">
							<button type="submit" name="login" class="btn btn-success">Đăng nhập
							</button>
                            </div>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
