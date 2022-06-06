
<?php
	ob_start();
	session_start();

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	require_once ('libs/db.php');
	require_once ('libs/utils.php');
	
	$module = isset($_GET['m']) ? $_GET['m'] : 'home';
	$action = isset($_GET['a']) ? $_GET['a'] : 'list';
	$deleted = isset($_GET['deleted']) ? $_GET['deleted'] : -1;
	$id = isset($_GET['id']) ? $_GET['id'] : null; 
	$page_index = isset($_GET['page']) ? $_GET['page'] : 1;
	$page_size = isset($_GET['page_size']) ? $_GET['page_size'] : 1;
	$timkiem = isset($_GET['timkiem']) ? $_GET['timkiem'] : null;
	$trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : null;

	$date = isset($_GET['time']) ? $_GET['time'] : date('Y/m/d');

	if(isset($_SESSION['id_nhanvien'])):
		$tasks = query($conn, '*', 'task t LEFT JOIN projects p ON t.maduan = p.maduan', "Where p.id_trangthai = 2 and t.id_nhanvien = ".$_SESSION['id_nhanvien']);
		if(is_array($tasks) && count($tasks) > 0){
			$count = count($tasks);
		}else $count = 0;
	endif;


	$file = '';
	switch ($module) {
		case 'home':
            $file = 'modules/home/home.php';
            break;
        case 'nhanvien':
            $file = 'modules/nhanvien/nhanvien.php';
			break;
		case 'project':
			$file = 'modules/project/project.php';
			break;
		case 'account':
			$file = 'modules/account/account.php';
			break;
		case 'chamcong':
			$file = 'modules/chamcong/chamcong.php';
			break;
		default: $file = 'modules/home/home.php';
	}


	// Check xem đã login chưa?

	if( isset($_SESSION['username'])){
		if( in_array($module, ['account'])){
			if(in_array($action, ['login']))
			header('Location: index.php?m=home');
		}
	}else {
        if (!in_array($module, ['home', 'account'])) {
			if(!in_array($action, ['login']))
            header('Location: index.php?m=account&a=login');
        }
	}
	

	
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>LOTUS: <?php echo $module ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="publics/css/bootstrap.css" rel='stylesheet' type='text/css' crossorigin="anonymous" />
<link href="public/css/style.css" rel='stylesheet' type='text/css' crossorigin="anonymous" />
<!-- Custom CSS -->
<link href="publics/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="publics/css/font-awesome.css" rel="stylesheet"> 
<link href="public/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<!-- //font-awesome icons -->
 <!-- js-->
<script src="publics/js/jquery-1.11.1.min.js"></script>
<script src="publics/js/modernizr.custom.js"></script>

<!--animate-->
<link href="publics/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="publics/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="publics/js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->

<script src="publics/js/underscore-min.js" type="text/javascript"></script>
<script src= "publics/js/moment-2.2.1.js" type="text/javascript"></script>

<!--End Calender-->
<!-- Metis Menu -->
<script src="publics/js/metisMenu.min.js"></script>
<script src="publics/js/custom.js"></script>
<link href="publics/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push <?php if($module !== 'home' || (!isset($_SESSION['username']))) echo 'cbp-spmenu-push-toright'; ?>" onload="script();">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left <?php if($module !== 'home' || (!isset($_SESSION['username']))	) echo 'cbp-spmenu-open'; ?>" id="cbp-spmenu-s1">
					
					<ul class="nav" id="side-menu">
						<li>
							<a href="index.php?m=home"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<?php if(isset($_SESSION['username']) && $_SESSION['username']): ?>
						<?php if(isset($_SESSION['chucvu']) && ($_SESSION['chucvu'] === 'Admin' || $_SESSION['chucvu'] === 'SupperAdmin')): ?>
						<li>
							<a href="#"><i class="fa fa-cogs nav_icon"></i>Quản Lý<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="index.php?m=nhanvien&a=list">Nhân Viên</a>
								</li>
								<li>
									<a href="index.php?m=chamcong&a=list">Chấm công</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<?php endif; ?>
						<li class="">
							<a href="#"><i class="fa fa-book nav_icon"></i>Dự Án <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="index.php?m=project&a=list">Danh Sách Dự Án</a>
								</li>
								<li>
									<a href="index.php?m=project&a=list&trangthai=1">Dự Án Chờ Duyệt</a>
								</li>
								<li>
									<a href="index.php?m=project&a=add">Dự Án Mới</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li>
							<a href="widgets.html"><i class="fa fa-th-large nav_icon"></i>Cá nhân <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="index.php?m=chamcong&a=detail&id=<?php echo $_SESSION['id_nhanvien'];?>">Chấm Công</a>
								</li>

							</ul>
						</li>
						
						<?php endif; ?>
					</ul>
					<div class="clearfix"> </div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="index.php?m=home">
						<h1>LOTUS</h1>
						<span><?php echo isset($_SESSION['chucvu']) ? $_SESSION['chucvu'] : "GUEST" ?></span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box" style = "display:none;">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>

			<?php if(isset($_SESSION['username']) && $_SESSION['username']): ?>
			<div class="header-right">
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new messages</h3>
									</div>
								</li>
								<li><a href="#">
								   <div class="user_img"><img src="publics/images/1.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								</a></li>
								<li class="odd"><a href="#">
									<div class="user_img"><img src="images/2.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								  <div class="clearfix"></div>	
								</a></li>
								<li><a href="#">
								   <div class="user_img"><img src="images/3.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								</a></li>
								<li>
									<div class="notification_bottom">
										<a href="#">See all messages</a>
									</div> 
								</li>
							</ul>
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new notification</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/2.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p><span>1 hour ago</span></p>
									</div>
								  <div class="clearfix"></div>	
								 </a></li>
								 <li class="odd"><a href="#">
									<div class="user_img"><img src="images/1.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li><a href="#">
									<div class="user_img"><img src="images/3.png" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li>
									<div class="notification_bottom">
										<a href="#">See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>	
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1"><?php echo $count;?></span></a>
							<ul class="dropdown-menu">
								
								<li>
									<div class="notification_header">
										<h3>Bạn đang tham gia <?php echo $count;?> dự án</h3>
									</div>
								</li>
									<?php if(is_array($tasks) && count($tasks) > 0): ?>
									<?php foreach($tasks as $key => $t): ?>
								<li class="text-center">
										<?php echo $t['tenduan'];?>
								</li>
									<?php endforeach; endif; ?>
								<li>
									<div class="notification_bottom">
										<a href="index.php?m=project&a=list">See all pending tasks</a>
									</div> 
								</li>
							</ul>
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img style="max-width:50px;max-height:50px;" src="publics/images/normal.png" alt=""> </span> 
									<div class="user-name">
										<p><?php echo $_SESSION['fullname']; ?></p>
										<span><?php echo $_SESSION['chucvu']; ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
							<li> <a href="index.php?m=account&a=change"><i class="fa fa-cog"></i> Đổi Mật Khẩu</a> </li> 
								<li> <a href="index.php?m=nhanvien&a=edit&id=<?php echo $_SESSION['id_nhanvien']; ?>"><i class="fa fa-cog"></i> Sửa Thông Tin</a> </li> 
								<li> <a href="index.php?m=nhanvien&a=detail&id=<?php echo $_SESSION['id_nhanvien']; ?>"><i class="fa fa-user"></i> Thông Tin User</a> </li> 
								<li> <a href="index.php?m=account&a=logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
								<div class="clearfix"></div>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<?php else : ?>
			<div <?php if($action  == 'login') echo "style='display:none;'" ?> class="profile_details">
				<ul >
					<li class="dropdown profile_details_drop" >
						<a href="index.php?m=account&a=login" class="dropdown-toggle" aria-expanded="false">
								<div class="profile_img" >
									<div class="user-name" >
									<p style="padding:13px;border:2px solid #FF0000;border-radius:5px;"><i class="fa fa-sign-in "></i> Login</p>
									</div>
								</div>
						</a>
					</li>
				</ul>
			</div>	
			<?php endif; ?>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<main role="main">
			<div id="page-wrapper">
				<div class="main-page">
					
					
						<div class="container">
							<div class="row" style="position: relative">
								<?php include($file) ?>
							</div>
						</div>
					
					<div class="clearfix"> </div>	
					
					
				</div>
			</div>
		</main>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="publics/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
		
	<!--scrolling js-->
	<script src="publics/js/jquery.nicescroll.js"></script>
	<script src="publics/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="publics/js/bootstrap.js"> </script>
</body>
</html>



<?php isset($conn) ? mysqli_close($conn) : null ?>