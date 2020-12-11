<?php 
include_once("Dbcon.php");
class Product {
    public $prod_name;
    public $link;
    public function getCategory($conn) {
		$sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` = 0";
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
    public function addProduct($name,$category, $link,$mplan,$aplan,$sku,$web,$bandwidth,$domain, $language,$mailbox, $conn) {
        $arr = array('webspace'=> $web,
         'bandwidth'=>$bandwidth, 
         'free_domain'=>$domain, 
         'language'=>$language, 
         'mailbox'=>$mailbox );
        $desc = json_encode($arr);
        $pid = 1;
        $prod_available =1;
        $ret = "";
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='$pid'  AND `id` NOT IN (SELECT MIN(`id`) FROM tbl_product)";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['prod_name'] == $category) {
                    $catId = $row['id'];
                    //echo $catId;
                    $sql = "INSERT INTO tbl_product(`prod_parent_id`, `prod_name` , `link`, `prod_available`) VALUES ('".$catId."','".$name."', '".$link."','".$prod_available."')";
                    if ($conn->query($sql) === true) {
                        $last_id = $conn->insert_id;
                        $sqldesc ="INSERT INTO tbl_product_description (`prod_id`,`description`,`mon_price`,`annual_price`,`sku`) VALUES ('$last_id','$desc','$mplan','$aplan','$sku')";
                        if ($conn->query($sqldesc) === true) {
                        }
                        $ret = "product added successfully";
                    } else {
                        $ret = $conn->error;
                    }
                    return $ret;
                }
            }
        }
    }
    public function fetchCategory($conn) {
        $pid = 1;
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='$pid'  AND `prod_available`='1'";
        $result = $conn->query($sql);
        return $result;
    }
    public function fetchAllProduct($conn) {
        $pid = 1;
        $data= array();
        $sql = "SELECT *  FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id ";
        $result = $conn->query($sql);
        return $result;
    }
    public function deleteCategory($id, $conn) 
    {
        $sql = "DELETE FROM tbl_product WHERE `prod_parent_id` ='1' AND`id`='$id'";
        if ( $conn->query($sql) == TRUE )
        {
            $ret = "Record deleted successfully"; 
        } 
        else 
        {
            $ret = "Error deleting record: " . $conn->error;
        }
        return $ret;
    }
    public function editCategory($id, $conn ) 
    {
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='1' AND `id`='$id'";
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