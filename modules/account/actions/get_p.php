<?php

$user = isset($_POST['user']) ? $_POST['user'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

if($email){
    $param = "Where email like '$email' and username like '$user'";
    $check = query($conn, '*', 'account', $param);

    if( is_array($check) && count($check) > 0){
        function generateRandomString($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        
        $new_p = generateRandomString();
        $change_p = update($conn, 'account',"password = '$new_p'", $param);
        $email_address = $email;
        $subject = 'Lấy Mật Khẩu';
        $content = 'Mật khẩu của bạn là: '.$new_p;
        
        $send_mail = sendEmailByGoogle($email_address, $subject, $content);

        if($send_mail){
            
            header('Location: index.php?m=account&a=login');
            echo 'Lấy mật khẩu thành công! Hãy kiểm tra trong email của bạn! ';
            echo '<a href=index.php?m=account&a=login>Về trang đăng nhập</a>';
        }
        else{
            header('Location: index.php?m=account&a=get');
            echo 'Lấy mật khẩu thất bại! Hãy thử lại! ';
            echo '<a href=index.php?m=account&a=get>Thử lại</a>';
        }
        
        
    }
}
?>