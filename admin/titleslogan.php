<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Cập nhật tiêu đề trang và nội dung</h2>
        <div class="block sloginblock">               
         <form>
            <table class="form">					
                <tr>
                    <td>
                        <label>Tiêu đề trang web</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhập tiêu đề trang web"  name="title" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Đặc trưng trang web</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhập khẩu hiệu trang web" name="slogan" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>