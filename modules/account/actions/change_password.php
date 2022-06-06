<?php

    
    $password = isset($_POST['password_change']) ? $_POST['password_change'] : null;
    if($password){
        $manhanvien = $_SESSION['manhanvien'];
        $values = " password = '$password'";
        $param = "Where manhanvien like '$manhanvien'";
        $change_pass = update($conn, 'account', $values, $param);

        if($change_pass){
            echo '<script language="javascript">';
            echo 'window.location.href = "index.php?m=account&a=logout"';
			echo '</script>';
        }

    }


?>


<div class="col-lg-8 pms-mt-10">
    <h3 class="title1">Đổi Mật Khẩu</h3>
    <a href="index.php?m=home">       
        <button class="btn btn-info btn-sm" style="margin-bottom:30px"><< Quay lại</button>
    </a>
    <form action="" method="POST" onsubmit="return check();">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Mật Khẩu Cũ</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu cũ">
        </div>
        <div class="form-group col-md-8">
            <label for="inputState">Mật Khẩu Mới</label>
            <input type="password" class="form-control" id="password_change" name="password_change" placeholder="Mật khẩu mới">
        </div>
        <div class="form-group col-md-8">
            <label for="inputAddress">Xác Nhận Mật Khẩu</label>
            <input type="password" class="form-control" id="confilm_password" name="confilm_password" placeholder="Xác nhận mật khẩu">
        </div>
    </div>
    <div style="padding:10px 50px;" class="form-group col-md-12">
        <button  type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
    </div>
    
    </form>
        
</div>



<script>

        function check(){
            var pass = document.getElementById('password').value;
            var pass_n = document.getElementById('password_change').value;
            var pass_c = document.getElementById('confilm_password').value;

            if( pass == '' || pass_n == '' || pass_c == ''){
                alert('Không để trống thông tin!');
                return false;
            }
            if( pass !== "<?php echo $_SESSION['password']; ?>"){
                alert('Mật khẩu không đúng!');
                return false;
            }
            if( pass_n !== pass_c){
                alert('Mật khẩu mới không khớp!');
                return false;
            }
            if( pass_n.length < 8 || pass_c.length < 8){
                alert('Mật khẩu mới quá ngắn!');
                return false;
            }
            if( pass !== pass_n){
                alert('Mật khẩu mới và mật khẩu cũ trùng nhau!');
                return false;
            }

            var ask = confilm('Bạn có chắc muốn đổi mật khẩu không?');
            if( ask == true){
                return true;
            }
            return false;

        }
</script>
