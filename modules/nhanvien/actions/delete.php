<?php

if($_SESSION['chucvu'] !== 'SupperAdmin'):

   echo '<h2>Không được phép truy cập<h2>' ;
else :


 $id = isset($_GET['id']) ? $_GET['id'] : null;
 $param = " Where id_nhanvien = $id";
 $delete = delete($conn, 'nhan_vien', $param);
 if($delete){
    header('Location: index.php?m=nhanvien&a=list&deleted=1');
 }else{
    header('Location: index.php?m=nhanvien&a=list&deleted=0');
 }
endif;
?>
