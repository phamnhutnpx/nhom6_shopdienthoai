<?php 
	include 'inc/header.php';
?>
<?php

$customer_id = Session::get('customer_id');
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart($customer_id);
    }
    

 
?>
<style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
    float: right;
    padding: 4px;
	}
	a.a_order {
    background: red;
    padding: 7px 20px;
    color: #fff;
    font-size: 21px;
}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
	    		<h3>Thanh toán bằng tiền mặt</h3>
	    	</div>
	    		
	    	<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage">
			    	
			    	<?php
			    	 if(isset($update_quantity_cart)){
			    	 	echo $update_quantity_cart;
			    	 }
			    	?>
			    	<?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">Mã</th>
								<th width="15%">Tên</th>
								
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart($customer_id);
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i = 0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
								<td>

									<?php echo $result['quantity'] ?>

								</td>
								<td><?php
								$total = $result['price'] * $result['quantity'];
								echo $fm->format_currency($total).' '.'VNĐ' ;
								 ?></td>
								
							</tr>
						<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
						}
						?>
							
						</table>
						<?php
							$check_cart = $ct->check_cart($customer_id);
								if($check_cart){
								?>
						<table style="float:right;text-align:left;margin:5px" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 

									echo $fm->format_currency($subtotal).' '.'VNĐ' ;
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $fm->format_currency($vat = $subtotal * 0.1).' '.'VNĐ'; ?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 

								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal).' '.'VNĐ' ;
								?></td>
							</tr>

					   </table>
					  <?php
					}else{
						echo 'Giỏ của bạn đang trống! <a href ="index.php">Hãy đi mua sắm ngay bây giờ.</a>';
					}
					  ?>
					
					
					</div>
    		</div>
    		<div class="box_right">
    			<table class="tblone">
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
				<tr>
					<td>Họ tên</td>
					<td>:</td>
					<td><?php echo $result['name'] ?></td>
				</tr>
				
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['address'] ?></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>
				</tr>
				<tr>
					<td colspan="3"><a href="editprofile.php">Cập nhật hồ sơ</a></td>
					
				</tr>
				
				<?php
					}
				}
				?>
			</table>
    		</div>

 		</div>

 	</div>
	<center><a href="?orderid=order" class="a_order" >Đặt hàng ngay</a></center><br>
 </div>
</form>
<?php 
	include 'inc/footer.php';
	
 ?>
