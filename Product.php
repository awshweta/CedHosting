<?php 
include_once("Dbcon.php");
class Product {
    public $prod_name;
    public $link;
    public function getCategory($conn) {
		$sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` = 1";
		$result = $conn->query($sql);
		return $result;
	}
}

?>