<?php

$dates = date('Y/m/d H:i:s');

$month = date('m',strtotime($dates));
$year = date('Y',strtotime($dates));
$day = date('d',strtotime($dates));

$param = " Where id_nhanvien = ".$_SESSION['id_nhanvien']." and Day(thoigian) = $day and Month(thoigian) = $month and Year(thoigian) = $year and status = 1";

$params = " Where id_nhanvien = ".$_SESSION['id_nhanvien']." and Day(thoigian) = $day and Month(thoigian) = $month and Year(thoigian) = $year";

$check = query($conn, '*', 'chamcong', $param);

if(is_array($check) && count($check) > 0){
    //header('Location: index.php?m=chamcong&a=add&user=99');
}
else{
    $tinhtrang = '';
    if( date('H',strtotime($dates)) > 8) $tinhtrang = 'Đi Muộn';
    else $tinhtrang = 'Đúng Giờ';
    $value = "thoigian = '$dates', tinhtrang = '$tinhtrang', status = 1";
    $chamcong = update($conn, 'chamcong', $value, $params);
    if($chamcong)
    header('Location: index.php?m=chamcong&a=detail&deleted=1&id='.$_SESSION['id_nhanvien']);
    else header('Location: index.php?m=nhanvien&a=detail&deleted=0&id='.$_SESSION['id_nhanvien']);
}


?>