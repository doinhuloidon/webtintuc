<?php

$chitiettin = $data['tintuc'];
$comment = $data['comment'];
$tinlienquan = $data['tinlienquan'];
$tinnoibat = $data['tinnoibat'];
$loaitin = $data['loaitin'];
if(isset($_POST['binhluan'])){
    if(isset($_SESSION['user_id'])){
        $c_tintuc = new C_tintuc();
        $noidung = $_POST['noidung'];
        $id_tin = $_POST['id_tin'];
        $id_user = $_SESSION['user_id'];
        $c_tintuc->them_binh_luan($id_user,$id_tin,$noidung);
    }
    else{
        $_SESSION['chua_dang_nhap'] = 'Bạn vui lòng đăng nhập để thêm bình luận';
        //header("location:" . $_SERVER['HTTP_REFERER']);
    }
}
// $target_dir = "public/image/tintuc/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// $loaitin = $data['loaitin'];
// // Check if file already exists
// if (file_exists($target_file)) {
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif" ) {
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     } else {
//     }
// }
?>


<!-- Page Content -->
<div class="container">
    <div class="row" id="article">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1 id="title-edit"><?=$chitiettin->TieuDe?> <?php
            if(isset($_SESSION['user_name'])){
              if($_SESSION['user_name'] == 'admin'){ 
                ?>
               <!--  <button class="btn" id="edit-article" name="edit-article"><i class="glyphicon glyphicon-edit"></i></button> -->
                <?php
            }
        }
        ?></h1> 
        <!-- Author -->
        <p class="lead" id="brief-edit">
            <?=$chitiettin->TomTat?>
        </p>

        <!-- Preview Image -->
        <img class="img-responsive" id="img-edit" src="public/image/tintuc/<?=$chitiettin->Hinh?>" alt="">
        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time" id="date-edit"></span>Ngày cập nhật <?=$chitiettin->updated_at?></p>
        <hr>

        <!-- Post Content -->
        <p class="lead" id="detail-edit"><?=$chitiettin->NoiDung?></p>

        <hr>

        <!-- Blog Comments -->
        <?php
        if(isset($_SESSION['chua_dang_nhap'] )){
            echo '<div class="alert alert-danger">'.$_SESSION['chua_dang_nhap'] .'</div>';
        }
        ?>

        <!-- Comments Form -->
        <div class="well">
            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form" method="post" action="">
                <input type="hidden" name="id_tin" value="<?=$chitiettin->id?>">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="noidung"></textarea>
                </div>
                <button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->
        <?php
        foreach($comment as $cm){
            ?>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?=$cm->name?>
                    <small> <?=$cm->created_at?></small>
                </h4>
                <?=$cm->NoiDung?>
            </div>
        </div>

        <?php
    }
    ?>
</div>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-3">

    <div class="panel panel-default">
        <div class="panel-heading"><b>Tin liên quan</b></div>
        <div class="panel-body">
            <?php 
            foreach($tinlienquan as $tinlq){
                ?>
                <!-- item -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-5">
                        <a href="chitiet.php?loai_tin=<?=$tinlq->ten_khong_dau?>&alias=<?=$tinlq->TieuDeKhongDau?>&id_tin=<?=$tinlq->id?>">
                            <img class="img-responsive" src="public/image/tintuc/<?=$tinlq->Hinh?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="chitiet.php?loai_tin=<?=$tinlq->ten_khong_dau?>&alias=<?=$tinlq->TieuDeKhongDau?>&id_tin=<?=$tinlq->id?>"><b><?=$tinlq->TieuDe?></b></a>
                    </div>
                    <div class="break"></div>
                </div>
                <!-- end item -->
                <?php
            }
            ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><b>Tin nổi bật</b></div>
        <div class="panel-body">
            <?php
            foreach($tinnoibat as $tinnb){
                ?>
                <!-- item -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-5">
                        <a href="chitiet.php?loai_tin=<?=$tinnb->ten_khong_dau?>&alias=<?=$tinnb->TieuDeKhongDau?>&id_tin=<?=$tinnb->id?>">
                            <img class="img-responsive" src="public/image/tintuc/<?=$tinnb->Hinh?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="chitiet.php?loai_tin=<?=$tinnb->ten_khong_dau?>&alias=<?=$tinnb->TieuDeKhongDau?>&id_tin=<?=$tinnb->id?>"><b><?=$tinnb->TieuDe?></b></a>
                    </div>
                    <div class="break"></div>
                </div>
                <!-- end item -->
                <?php
            }
            ?>
        </div>
    </div>
    <select class="form-control" id="loaitin" name="loaitin" style="display: none;">
        <?php
        foreach($loaitin as $lt){                       
            ?>
            <option value="<?=$lt->id?>">
                <?=$lt->Ten?>
            </option> 
            <?php
        }
        ?>
    </select>
    <div class="input-group image-preview">
        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">
            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>
            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="fileToUpload" id="fileToUpload" /> <!-- rename it -->
            </div>
        </span>
    </div><!-- /input-group image-preview [TO HERE]--> 
</div>

</div>
<!-- /.row -->
</div>
<!-- end Page Content -->
