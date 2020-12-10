<?php 
include_once("Dbcon.php");
class Product {
    public $prod_name;
    public $link;
    public function getCategory($conn) {
		$sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` = 1 ORDER BY `id` LIMIT 1";
		$result = $conn->query($sql);
		return $result;
    }
    public function addCategory($name , $link ,$conn) {
        $prod_parent_id =1;
        $prod_available =1;
        $sql = "INSERT INTO tbl_product(`prod_parent_id`, `prod_name` , `link`, `prod_available`) VALUES ('".$prod_parent_id."','".$name."', '".$link."','".$prod_available."')";
        if ($conn->query($sql) === true) {
            $ret = "Category added successfully";
        } else {
            $ret =$conn->error;
        }
        return $ret;
    }
    public function fetchCategory($conn) {
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` = 1";
		$result = $conn->query($sql);
		return $result;
    }
    public function deleteCategory($id, $conn) {
        $sql = "DELETE FROM tbl_product WHERE `id`='$id'";
		if ($conn->query($sql) === TRUE) {
			$ret = "Record deleted successfully";
		} else {
			$ret = "Error deleting record: " . $conn->error;
		}
		return $ret;
    }
    public function editCategory($id, $conn) {
        $sql = "SELECT *  FROM tbl_product WHERE `id`='$id'";
		$result = $conn->query($sql);
		return $result;
    }
    public function saveCategory($id, $name, $link, $conn) {
        $sql = "UPDATE tbl_product SET `prod_name`='$name' ,`link`='$link'  WHERE `id` = '$id'";

		if ($conn->query($sql) === TRUE) {
			$ret = "update successfully";
		} else {
			$ret = "Error updating record: " . $conn->error;
		}
		return $ret;
    }
    public function enableCategory($id, $conn) {
        $available = 1;
        $sql = "UPDATE tbl_product SET `prod_available`='$available' WHERE `id` = '$id'";

		if ($conn->query($sql) === TRUE) {
			$ret = "enable successfully";
		} else {
			$ret = "Error updating record: " . $conn->error;
		}
		return $ret;
    }
    public function disableCategory($id, $conn) {
        $available = 0;
        $sql = "UPDATE tbl_product SET `prod_available`='$available' WHERE `id` = '$id'";

		if ($conn->query($sql) === TRUE) {
			$ret = "disable successfully";
		} else {
			$ret = "Error updating record: " . $conn->error;
		}
		return $ret;
    }
}

?>