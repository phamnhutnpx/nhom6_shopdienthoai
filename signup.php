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

<link href="css/style_signup.css" rel="stylesheet" type="text/css" media="all" />
<div class="main">
	<div class="content">
					
		<div class="register_account">
			<h3>Đăng kí Tài khoản</h3>
			<?php
			if (isset($insertCustomers)) {
				echo $insertCustomers;
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Họ tên">
								</div>
								<div>
									<input type="email" name="email" class="field" placeholder="Email">
								</div>
								<div>
									<input type="password" name="password" class="field" placeholder="Mật khẩu">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Địa chỉ">
								</div>
								<div>
									<input type="text" name="phone" placeholder="Điện thoại">
								</div>

							</td>
						</tr>
					</tbody>
				</table>
				
					<div class="buttons">
						<a href="login.php">Đăng nhập</a>
						<input type="submit" name="submit" class="grey" value="Tạo tài khoản">
					</div>
				
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>