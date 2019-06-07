<?php

$tintuc = $data['tintuc'];
$tenloaitin = $data['loaitin'];
$theloai = $data['theloai'];
$phantrang = $data['list'];
?>

<!-- Page Content -->
<div class="row">
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

<div id="datasearch">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;">
            <h4><b><?php echo $tenloaitin->Ten?></b></h4>
        </div>
        <?php
        foreach($tintuc as $tin){
            ?>
            <div class="row-item row">
                <div class="col-md-3">

                    <a href="<?=$tin->ten_khong_dau?>/<?=$tin->TieuDeKhongDau?>-<?=$tin->id?>.html">
                        <br>
                        <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$tin->Hinh?>" alt="">
                    </a>
                </div>

                <div class="col-md-9">
                    <h3><?=$tin->TieuDe?></h3>
                    <p><?=$tin->TomTat?></p>
                    <a class="btn btn-primary" href="<?=$tin->ten_khong_dau?>/<?=$tin->TieuDeKhongDau?>-<?=$tin->id?>.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div class="break"></div>
            </div>
            <?php
        }
        ?>
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <?=$phantrang?>
            </div>
        </div>
        <!-- /.row -->

    </div>
</div> 

</div>

<!-- end Page Content -->



