<?php

    $users = query($conn, '*', 'nhan_vien', 'Where trangthai = 1');

    $date = date('Y/m/d H:i:d');
    $month = date('m',strtotime($date));
    $year = date('Y',strtotime($date));
    $day = date('d',strtotime(lastday($month, $year)));
    
    //$count = count($users);
    if(is_array($users) && count($users) > 0){
        foreach($users as $key => $user){
            $id_user = $user['id_nhanvien'];
            $columns = 'id_nhanvien,thoigian';
            for ($i = 1;$i <= $day; $i++){ 
                $check = query($conn, '*', 'chamcong', " Where id_nhanvien = $id_user and Day(thoigian) = $i and Month(thoigian) = $month and Year(thoigian) = $year");
                if( is_array($check) && count($check) > 0){
                    continue;
                }
                else{
                    $t = $year.'/'.$month.'/'.$i.' 00:00:01';
                    $values = $id_user.",'$t'";
        
                    //$sql = "Insert INTO chamcong ($columns) VALUES ($values)";
                    $new = insert($conn, 'chamcong', $columns, $values);
                }
                
                // echo $sql." - $day <br/>";
            }
        }
    }
    $l = isset($_GET['user']) ?  $_GET['user'] : null;

    if($l) header('Location: index.php?m=chamcong&a=update');

    header('Location: index.php?m=chamcong&a=list');


?>