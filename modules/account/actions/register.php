<?php

	if( isset($_SESSION['regester']) && isset($_POST['maNhanVien']) && $_SESSION['regester'] === $_POST['maNhanVien']){
		unset($_POST['maNhanVien']);
	}

    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
        
    $rand = generateRandomString();

    $maNV = query($conn, 'manhanvien', 'nhan_vien', '');
	$userName = query($conn, '*', 'account', '');
	
	$r_manv = isset($_POST['maNhanVien']) ? $_POST['maNhanVien'] : null;
	$r_email = isset($_POST['Email']) ? $_POST['Email'] : null;
	$r_username = isset($_POST['userName']) ? $_POST['userName'] : null;
	$r_pass = isset($_POST['password']) ? $_POST['password'] : null;

	if( $r_manv && $r_email && $r_username && $r_pass){
		$columns = 'username, password, email, manhanvien';
		$values = "'$r_username', '$r_pass', '$r_email', '$r_manv'";

		$register = insert($conn, 'account', $columns, $values);


		if($register){
			$_SESSION['regester'] = $_POST['maNhanVien'];
			echo '<script language="javascript">';
			echo 'alert("Đăng kí thành công")';
			echo '</script>';

			header('Location: index.php?m=account&a=login');
		}
	
	}

?>




	<div class="main-page signup-page">
		<h3 class="title1">Đăng kí tài khoản</h3>
		
		<div class="sign-up-row widget-shadow">
                <h5>Thông tin cá nhân :</h5>
                <form action = "" method = "POST" onsubmit="return check();">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mã Nhân Viên* :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" id="maNhanVien" name = "maNhanVien">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email* :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" id="Email" name = "Email">
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Thông tin đăng nhập :</h6>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Tên Đăng Nhập* :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" id="userName" name = "userName">
						</div>
						<div class="clearfix"> </div>
					</div>
					
						
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mật Khẩu* :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" id="password" name = "password">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Xác Nhân Mật Khẩu* :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" id="cPassword">
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Mã Xác Nhận* :</h4>
						</div>
						<div class="sign-up2">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="CodeRand"> 
							</div>
							
							<div class="form-group col-md-4">
								<input type="text" class="form-control" disabled="disabled" value = "<?php echo $rand; ?>" id="cCodeRand">
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						<input type="submit" value="Đăng Kí">
						<a style = "margin-left:50px;" href = "index.php?m=account&a=login"><button style="height:40px;" type="button" class="btn btn-primary">Đăng Nhập</button></a>
						<div class="clearfix"> </div>
					</div>
					</form>
		</div>
	</div>

<script>
	function check(){
		var manhanvien = document.getElementById("maNhanVien").value;

		var email = document.getElementById("Email").value;
		var user_name = document.getElementById("userName").value;

		var pass = document.getElementById("password").value;
		var cpass = document.getElementById("cPassword").value;

		var code = document.getElementById("CodeRand").value;
		var cCode = document.getElementById("cCodeRand").value;

		var size = pass.length;

			if ( manhanvien === '' || email === '' || user_name === '' || pass === '' || code === ''){
				alert("Không để trống thông tin");
				return false;
			}

			if ( code !== cCode){
				alert("Mã xác nhận sai!");
				return false;
			}

			if(size <8){
				alert("Mật khẩu quá ngắn!(nhiều hơn 8 kí tự)");
				return false;
			}

		var ch = false;
			<?php
				if( is_array($maNV) && count($maNV) > 0){
				foreach($maNV as $key => $ma){ ?>
					if ( manhanvien === '<?php echo $ma['manhanvien']; ?>'){
						ch = true;
					}
				<?php }} ?>
			if (!ch){
				alert("Mã nhân viên không tồn tại!");
					return false;
			}
		
		
			<?php
				if( is_array($userName) && count($userName) > 0){
				foreach($userName as $key => $user){ ?>
					if ( manhanvien === '<?php echo $user['manhanvien']; ?>'){
						alert("Mã nhân viên đã được sử dụng!");
						return false;
					}
					if (email === '<?php echo $user['email']; ?>'){
						alert("Email nhân viên đã tồn tại!");
						return false;
					}
					if (user_name === '<?php echo $user['username']; ?>'){
						alert("Tên đăng nhập đã tồn tại!");
						return false;
					}
			<?php }} ?>
		
		
			if( pass !== cpass){
				alert("Mật khẩu xác nhận sai! Vui lòng nhập lại!");
				return false;
			}

		return true;
	}

	function success_regester() {
		alert("Đăng kí thành công!");
			return false;
	}
</script>