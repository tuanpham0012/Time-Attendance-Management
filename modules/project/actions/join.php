<?php 

    if($id && $id > 0){
        $maduan = isset($_GET['maduan']) ? $_GET['maduan'] : null;
        $id_u = $_SESSION['id_nhanvien'];
        if($maduan && $id){
            $check = query($conn, '*', 'task', "Where maduan like '$maduan' and id_nhanvien = ".$id_u);
            
            if( is_array($check) && count($check) > 0){
                header('Location: index.php?m=project&a=list');
            }
            else{
                $dates = date('Y/m/d');
                $column = 'maduan, id_nhanvien, ngayvao';
                $value = "'$maduan', $id_u, '$dates'";
                $join = insert($conn, 'task', $column, $value);
            }
        }
    }
?>