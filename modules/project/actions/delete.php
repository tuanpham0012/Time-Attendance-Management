<?php

 $id = isset($_GET['id']) ? $_GET['id'] : null;
 $param = " Where id = $id";
 $delete = delete($conn, 'projects', $param);
 if($delete){
    header('Location: index.php?m=project&a=list&deleted=1');
 }else{
    header('Location: index.php?m=project&a=list&deleted=0');
 }

?>
