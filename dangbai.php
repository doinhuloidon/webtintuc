<?php

include('controller/c_tintuc.php');
$tintuc = new C_tintuc;
$loaitin = $tintuc->getLoaitin();
?>