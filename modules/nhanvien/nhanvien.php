<?php

$file = 'list_NhanVien.php';

switch($action){
    case 'list':
        $file = 'actions/list_nhanvien.php';
        break;
    case 'add':
        $file = 'actions/add_nhanvien.php';
        break;
    case 'edit':
        $file = 'actions/edit_nhanvien.php';
        break;
    case 'detail':
        $file = 'actions/detail_nhanvien.php';
        break;
    case 'delete':
        $file = 'actions/delete.php';
        break;
    default: $file = 'actions/list_nhanvien.php';
}

require_once($file);

?>