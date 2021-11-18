<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class brand
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_brand($brand_Name)
	{

		$brand_Name = $this->fm->validation($brand_Name);
		$brand_Name = mysqli_real_escape_string($this->db->link, $brand_Name);

		if (empty($brand_Name)) {
			$alert = "<span class='error'>Không được để trống thương hiệu</span>";
			return $alert;
		} else {
			$query_check = "SELECT * FROM tbl_brand WHERE brandName = '$brand_Name'";
				if($this->db->select($query_check))
				{
					$alert = "<span class='error'>Thương hiệu đã tồn tại!</span>";
					return $alert;
				}
				else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brand_Name')";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'>Thêm thương hiệu thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm thương hiệu thất bại</span>";
				return $alert;
			}
			}
		}
	}
	public function show_brand()
	{
		$query = "SELECT * FROM tbl_brand order by brandId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_product_by_brand($id)
	{
		$query = "SELECT * FROM tbl_product WHERE brandId='$id' order by brandId desc LIMIT 8";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_name_by_brand($id)
	{
		$query = "SELECT tbl_product.*,tbl_brand.brandName,tbl_brand.brandId FROM tbl_product,tbl_brand WHERE tbl_product.brandId=tbl_brand.brandId AND tbl_brand.brandId ='$id' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_brand_home()
	{
		$query = "SELECT * FROM tbl_brand order by brandId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function getbrandbyId($id)
	{
		$query = "SELECT * FROM tbl_brand where brandId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_brand($brandName, $id)
	{

		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		$id = mysqli_real_escape_string($this->db->link, $id);

		if (empty($brandName)) {
			$alert = "<span class='error'>Thương hiệu không được để trống</span>";
			return $alert;
		} else {
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='success'>Cập nhật thương hiệu thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Cập nhật thương hiệu thất bại</span>";
				return $alert;
			}
		}
	}
	public function del_brand($id)
	{
		$query_check = "SELECT * FROM tbl_brand as br, tbl_product as pro where br.brandId = pro.brandId and br.brandId = '$id'";
		$result_check = $this->db->select($query_check);
		if ($result_check) {
			$alert = '<span class = "error">Thương hiệu đang còn sản phẩm! Không thể xóa được!</span>';
			return $alert;
		} else {
			$query = "DELETE FROM tbl_brand where brandId = '$id'";
			$result = $this->db->delete($query);
			if ($result) {
				$alert = "<span class='success'>Xóa thương hiệu thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Xóa thương hiệu thất bại</span>";
				return $alert;
			}
		}
	}
}
?>