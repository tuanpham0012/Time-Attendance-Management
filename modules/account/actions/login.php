<?php

	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;

	if($username && $password){
		$param = " Where username like '$username' && password like '$password'";
		$login = query($conn, '*', 'account', $param);
		if(is_array($login) && count($login) > 0){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$manhanvien = $login[0]['manhanvien'];
			$param = " Where manhanvien like '$manhanvien'";
			$thongtinNV = query($conn, '*', 'nhan_vien', $param);

			$_SESSION['manhanvien'] = $thongtinNV[0]['manhanvien'];
			$_SESSION['id_nhanvien'] = $thongtinNV[0]['id_nhanvien'];
			$_SESSION['fullname'] = $thongtinNV[0]['hoten'];
			$_SESSION['chucvu'] = $thongtinNV[0]['chucvu'];
			$_SESSION['anh'] = $thongtinNV[0]['anh'];

			$time = date('Y-m-d H:i:s');
			$value = "dangnhapcuoi ='$time'";
			$param = 'Where id_nhanvien = '.$_SESSION['id_nhanvien'];
			$lg = update($conn, 'nhan_vien', $value, $param);


			header('Location: index.php?m=home');
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Đăng nhập thất bại! Sai tên đăng nhập hoặc mật khẩu!")';
			echo '</script>';
		}
	}
	

?>





<div class="main-page login-page ">
	<h3 class="title1">Đăng Nhập</h3>
		<div class="widget-shadow">
			<div class="login-top">
				<h4>Xin Chào!  <br> Chưa Có Tài Khoản? <a href="index.php?m=account&a=register"> Đăng kí ngay »</a> </h4>
			</div>
			<div class="login-body">
				<form action= "" method="POST" onsubmit = "return check();">
					<input type="text" class="user" id="username"  name="username" placeholder="Tên đăng nhập" required="">
					<input type="password" id="password"  name="password" class="lock" placeholder="Mật khẩu">
					<div class="forgot">
							<a href="index.php?m=account&a=get">Quên mật khẩu?</a>
						</div>
					<div class="forgot-grid">
						
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Sign In">
				</form>
			</div>
			</div>
</div>

<script>

	function check(){
		var username = document.getElementById("username").value;
		var pass = document.getElementById("password").value;

		if(username === '' || pass ===''){
			alert("Tài Khoản hoặc  Mật khẩu trống!");
			return false;
		}

		return true;
	}
</script>
