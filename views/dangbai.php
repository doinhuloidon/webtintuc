<?php
error_reporting(0);
function CovertVn($str)
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|� �|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|� �|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|� �|Ặ|Ẳ|Ẵ)/", 'A', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|� �|Ợ|Ở|Ỡ)/", 'O', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	$str = preg_replace("/(Đ)/", 'D', $str);
	$str = preg_replace("/( )/", '-', $str);
	return $str;
}
$c_tintuc = new C_tintuc();
if(isset($_POST['submit']))
{ 
	$title = $_POST['title'];
	$tieudekhongdau = CovertVn($title);
	$loaitin = $_POST['loaitin'];
	if(isset($_POST['tinnoibat']))
		$tinnoibat = $_POST['tinnoibat'];
	
	else 
		$tinnoibat = 0;
	
	$tomtat = $_POST['tomtat'];
	$noidung = $_POST['noidung'];
	$hinh = $_FILES["fileToUpload"]["name"];
	$dangbai = $c_tintuc->postDangbai($title,$tieudekhongdau,$tomtat,$noidung,$hinh,$tinnoibat,$loaitin);
}
$target_dir = "public/image/tintuc/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$loaitin = $data['loaitin'];
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    } else {
    }
}
?>

<!-- Page Content -->
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Đăng bài viết</div>
		<div class="panel-body">
			<form method="POST"  action="dangbai.php"  enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Tiêu đề</label>
					<input type="text" class="form-control" id="title" name="title" aria-describedby="basic-addon1" required>
				</div>
				<br>
				<div class="form-inline">
					<div class="form-group">
						<label for="loaitin">Loại tin</label>
						<select class="form-control" id="loaitin" name="loaitin">
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
					</div>
					<div class="checkbox">
						<label for="tinnoibat">
							<input type="checkbox" id="tinnoibat" name="tinnoibat" value="1"> 
						Tin nổi bật</label>
					</div>
				</div>
				<br>
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
				<br>
				<div class="form-group">
					<label for="tomtat">Tóm tắt</label>
					<textarea class="form-control" id="tomtat" name="tomtat" required>
					</textarea>
				</div>
				<br>
				<div class="form-group">
					<label for="noidung">Nội dung</label>
					<textarea class="form-control" id="noidung" name="noidung" required>
					</textarea>
				</div>
				<br>
				<div style="text-align: center;">
				<button type="submit" name="submit" class="btn btn-success">Đăng bài</button>
				</div>
			</form>
		</div>
	</div>
</div>