<?php

if($id && $id > 0){
    $value = 'id_trangthai = 2';
    $param = 'Where id= '.$id;
    $update = update($conn, 'projects', $value, $param);

    if($update){
        header('Location: index.php?m=project&a=list');
    }
}


?>