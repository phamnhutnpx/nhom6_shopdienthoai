<?php
include 'inc/header.php';
?>
<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location ='404.php'</script>";
} else {
	$id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

		$quantity = $_POST['quantity'];
		$insertCart = $ct->add_to_cart($quantity, $id, $customer_id);
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php

			$get_product_details = $product->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {


			?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result_details['productName'] ?></h2>
							<p><?php echo $fm->textShorten($result_details['product_desc'], 150) ?></p>
							<div class="price">
								<p>Giá: <span><?php echo $fm->format_currency($result_details['price']) . " " . "VNĐ" ?></span></p>
								<p>Danh mục: <span><?php echo $result_details['catName'] ?></span></p>
								<p>Thương hiệu:<span><?php echo $result_details['brandName'] ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" min="1" />
									<?php
									$login_check = Session::get('customer_login');
									$temp='';
									if ($login_check == false) 
										$temp = '<a style="background:#333; color: #fff; text-decoration: none; padding: 9px 18px; ";  class"buttons" onclick = "return confirm(\'Bạn phải đăng nhập để vào giỏ hàng?\') " href="login.php">Thêm vào giỏ hàng</a>';
									else
										$temp = '<input style="background:#333; color: #fff; text-decoration: none; padding: 6px 12px; ";  type="submit" class="buttons" name="submit" value="Thêm vào giỏ hàng" />';

										echo $temp;
									?>
								</form>
								<?php
								if (isset($insertCart)) {
									echo $insertCart;
								}
								?>
							</div>
						</div>
						<div class="product-desc">
							<h2>Nội dung sản phẩm</h2>
							<?php echo $fm->textShorten($result_details['product_desc'], 150) ?>
						</div>

					</div>
			<?php
				}
			}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>Danh mục sản phẩm</h2>
				<ul>
					<?php
					$getall_category = $cat->show_category_fontend();
					if ($getall_category) {
						while ($result_allcat = $getall_category->fetch_assoc()) {
					?>
							<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
					<?php
						}
					}
					?>
				</ul>

			</div>
		</div>
		<div class="binhluan">
			<div class="row">

				<div class="col-md-8">
					<h5>Bình luận sản phẩm</h5>

					<form action="" method="POST">
						<p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
						<p><input type="text" placeholder="Điền tên" class="form-control" name="tennguoibinhluan"></p>
						<p><textarea rows="5" style="resize: none;" placeholder="Bình luận...." class="form-control" name="binhluan"></textarea></p>
						<p><input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận"></p>
					</form>
				</div>
			</div>
			</textarea>
		</div>
	</div>

	<?php
	include 'inc/footer.php';

	?>