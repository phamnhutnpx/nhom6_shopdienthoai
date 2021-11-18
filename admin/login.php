<?php
	include '../classes/adminlogin.php';
?>
<?php
	$class = new adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$adminUser = $_POST['adminUser'];
     	$adminPass = sha1($_POST['adminPass']);

     	$login_check = $class->login_admin($adminUser,$adminPass);
     	
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin đăng nhập</h1>
			<span><?php

			if(isset($login_check)){
				echo $login_check;
			}
			 ?></span>
			
			<div class="user-box">
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div class="user-box">
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div class="btn_login">
				
				<input type="submit" value="Đăng nhập" />
			</div>
		</form><!-- form -->
		<!-- <div class="button">
			<a href="#">Nhóm 07 - LTW</a>
		</div> -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>