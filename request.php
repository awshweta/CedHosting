<?php
include_once("Dbcon.php");
include_once("User.php"); 
include_once("Product.php");
if(isset($_POST['action'])) {
	if($_POST['action'] == "addToCart") {
		$id = isset($_POST['id']) ? $_POST['id'] : "";
		//echo $id;
		$db = new Dbcon();
		$product = new Product();
		$result = $product->addToCart($id, $db->conn);
		echo json_encode($result);
	}
}
?>