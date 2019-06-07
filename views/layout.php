<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title> Web Tin Tức</title>
    <base href="http://webtintuc.ago.vn/">
    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" role="search" method="get" action="timkiem.php">
                   <div class="form-group">
                     <input type="text" id="txtSearch" class="form-control" placeholder="Search">
                 </div>
                 <button type="button" id="search" class="btn btn-default">Tìm</button>
             </form>

             <ul class="nav navbar-nav pull-right">
                <?php
                if(isset($_SESSION['user_name'])){
                    ?>
                    <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class ="glyphicon glyphicon-user"></span>
                      <?=$_SESSION['user_name']?>
                  </a>
                  <?php  
                  if($_SESSION['user_name'] == 'admin'){ 
                    ?>
                    <ul class="dropdown-menu">
                      <li><a href="dang-bai">Đăng bài</a></li>
                  </ul>
                  <?php
              }
              ?>
          </li>

          <li>
             <a href="dang-xuat">Đăng xuất</a>
         </li>
         <?php
     }
     else{
        ?>

        <li>
            <a href="dang-ki">Đăng ký</a>
        </li>
        <li>
            <a href="dang-nhap">Đăng nhập</a>
        </li>
        <?php
    }
    ?>
</ul>
</div>



<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>
<div class="container" id="datasearch">
    <?php
    include("views/$view.php");
    ?>
    <!-- end Page Content -->
</div>
<!-- Footer -->
<hr>
<footer>
      <div class="row">
            <div class="footer-copyright text-center py-3">
                <div id="ctl06_portlet_b3917e1e-f112-43e1-9790-8aaf1dbb24da" style="padding:15px 0px 10px 0px;

                "><div>
                    <div class="school">
                        <p>Copyright © 2013, Trường Đại Học Sư Phạm Kỹ Thuật - Tp.HCM</p>
                        <p><strong>Địa chỉ:</strong> 1 Võ Văn Ngân, Phường Linh Chiểu, Quận Thủ Đức, Thành phố Hồ Chí Minh.<br>
                            <strong>Điện thoại:</strong>&nbsp;(+84 - 028) 38968641 - (+84 -028) 38961333 -&nbsp;(+84 -028)&nbsp;37221223<br>
                            <strong>Hotline Tư vấn tuyển sinh:</strong>&nbsp;(+84 - 028)    37222764<br>
                            <strong>Fax:</strong> (+84 - 028) 38964922<br>
                            <strong>E-mail:</strong> pmo@hcmute.edu.vn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- end Footer -->
<!-- jQuery -->
<script src="public/js/jquery.js"></script>
<!-- Bootstrap public/js/Core JavaScript -->
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/my.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
    $(document).ready(function(){
        $("#search").click(function(){
            var keyword = $('#txtSearch').val();
            $.post("views/timkiem.php",{tukhoa:keyword},function(data){
                $('#datasearch').html(data)
            })
        })
    })
</script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>

</html>