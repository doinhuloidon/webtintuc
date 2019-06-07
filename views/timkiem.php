<?php
include('../model/m_tintuc.php');

if(isset($_POST['tukhoa'])){
	$key = $_POST['tukhoa'];
    $m_tintuc = new M_tintuc();
    $tintuc = $m_tintuc->search($key);
?>
Tìm thấy <?=count($tintuc).' kết quả cho <strong>'.$_POST['tukhoa'].'<strong>'?>
<div class="panel panel-default">
    <?php
        foreach($tintuc as $tin){
    ?>
    <div class="row-item row">
        <div class="col-md-3">

            <a href="chitiet.php?loai_tin=<?=$tin->ten_khong_dau?>&alias=<?=$tin->TenKhongDau?>&id_tin=<?=$tin->id?>">
                <br>
                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$tin->Hinh?>" alt="">
            </a>
        </div>

        <div class="col-md-9">
            <h3><?=$tin->TieuDe?></h3>
            <p><?=$tin->TomTat?></p>
            <a class="btn btn-primary" href="chitiet.php?loai_tin=<?=$tin->ten_khong_dau?>&alias=<?=$tin->TieuDeKhongDau?>&id_tin=<?=$tin->id?>">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="break"></div>
    </div>
    <?php
    }
    ?>
</div>
<?php
}
?>