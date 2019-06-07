<?php
$theloai = $data['theloai'];
$slide = $data['slide'];
?>
<!-- Page Content -->
<div class="container">
    <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
          <?php
          foreach($theloai as $tl){
            $loaitin = explode(',', $tl->tenLoaitin);
            ?>
            <li href="#" class="dropdown menu1">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?=$tl->Ten?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    foreach($loaitin as $pair)
                    {
                        list($id,$ten, $tenkhongdau) = explode (':',$pair);
                        ?>
                        <li>
                            <a href="<?=$tenkhongdau?>-<?=$id?>"><?=$ten?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
</nav>
<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php
                for($i=0; $i<count($slide);$i++){
                   if($i==0){


                    ?>
                    <div class="item active">
                        <img class="slide-image" src="public/image/slide/<?=$slide[$i]->Hinh?>" alt="" style="height:550px">
                        <div class="carousel-caption">
                          <h3><?=$slide[$i]->Ten?></h3>
                      </div>
                  </div>
                  <?php
              }
              else{


               ?>
               <div class="item">
                <img class="slide-image" src="public/image/slide/<?=$slide[$i]->Hinh?>" style="height: 550px" alt="">
                <div class="carousel-caption">
                  <h3><?=$slide[$i]->Ten?></h3>
              </div>
          </div>
          <?php
      }
  }
  ?>
</div>
<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>
</div>
</div>
<!-- end slide -->

<div class="space20"></div>

<div class="row main-left">

    <div>
       <div class="panel panel-default">            
          <div class="panel-heading" style="background-color:#337AB7; color:white;" >
             <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
         </div>

         <div class="panel-body">
             <!-- item -->
             <?php
             foreach($theloai as $tl){
                 $loaitin = explode(',', $tl->tenLoaitin);
                 ?>
                 <div class="row-item row">
                     <h3>
                        <a href="#"><?=$tl->Ten?></a> | 	
                        <?php
                        foreach ($loaitin as $pair)
                        {
                          list($id,$ten,$tenkhongdau) = explode (':',$pair);
                          ?>
                          <small><a href="<?=$tenkhongdau?>-<?=$id?>"><i><?=$ten?></i></a>/</small>
                          <?php
                      }
                      ?>
                  </h3>
                  <div class="col-md-12">
                    <div class="col-md-3">
                     <a href="<?=$tenkhongdau?>/<?=$tl->TDKDTin?>-<?=$tl->idTin?>.html">
                         <img class="img-responsive" src="public/image/tintuc/<?=$tl->HinhTin?>" alt="">
                     </a>
                 </div>

                 <div class="col-md-9">
                     <h3><?=$tl->TieuDeTin?></h3>
                     <p><?=$tl->TomTatTin?></p>
                     <a class="btn btn-primary" href="<?=$tenkhongdau?>/<?=$tl->TDKDTin?>-<?=$tl->idTin?>.html">Xem chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                 </div>

             </div>
             <div class="break"></div>
         </div>
         <!-- end item -->
         <?php
     }
     ?>
 </div>
</div>
</div>

</div>
<!-- /.row -->
</div>
<!-- end Page Content -->
