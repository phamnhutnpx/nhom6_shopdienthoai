<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check) {
	echo "<script>window.location ='index.php'</script>";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

	$login_Customers = $cs->login_customers($_POST);
}
?>
<link href="css/style_newlogin.css" rel="stylesheet" type="text/css" media="all" />
<div class="main" >
	<div class="content">
		<div class="login_panel">
			<h3>Đăng nhập</h3>
			<?php
			if (isset($login_Customers)) {
				echo $login_Customers;
			}
			?>
			<form action="" method="post">
				<input type="email" name="email" class="field" placeholder="Email của bạn">
				<input type="password" name="password" class="field" placeholder="Mật khẩu">
				<p class="note"><a href="#">Quên mật khẩu</a></p>
				<div class="buttons">
					<a href="index.php">Quay lại</a>
					<input type="submit" name="login" class="grey" value="Đăng nhập">
					<a class= "sign_up" href="signup.php">Tạo tài khoản</a>
				</div>
			</form>
		</div>
		
		
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>