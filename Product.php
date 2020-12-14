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
        $sql = "INSERT INTO tbl_product(`prod_parent_id`, `prod_name` , `html`, `prod_available`) VALUES ('".$prod_parent_id."','".$name."', '".$link."','".$prod_available."')";
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
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='$pid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['prod_name'] == $category) {
                    $catId = $row['id'];
                    //echo $catId;
                    $sql = "INSERT INTO tbl_product(`prod_parent_id`, `prod_name` , `html`, `prod_available`) VALUES ('".$catId."','".$name."', '".$link."','".$prod_available."')";
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
    public function fetchAllCategory($conn) {
        $pid = 1;
        $sql = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='$pid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $id = $row['prod_parent_id'];
                $sqlcat = "SELECT *  FROM tbl_product WHERE `id`='$id'";
                $resultcat = $conn->query($sqlcat);
                if ($resultcat->num_rows > 0) {
                    while ($rowcat = $resultcat->fetch_assoc()) {
                          $category = $rowcat['prod_name'];
                    }
                }
                if($row['prod_available'] == 1) {
                    $available ="enable";
                    $data["data"][] = array($category ,$row['prod_name'] ,$row['html'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='disableCategory btn btn-danger' name='desable' value='disable'>");
                }
                else {
                    $available ="disable";
                    $data["data"][] = array($category ,$row['prod_name'] ,$row['html'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='enableCategory btn btn-success' name='enable' value='enable'>");
                }
            }
        }
        return $data;
    }
    public function fetchAllProduct($conn) {
        $pid = 1;
        $data= array();
        $sql = "SELECT *  FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $id = $row['prod_parent_id'];
                $desc = json_decode($row['description']);
                //print_r($arr);
                $sqlcat = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='1'  AND `id`='$id'";
                $resultcat = $conn->query($sqlcat);
                if ($resultcat->num_rows > 0) {
                    while ($rowcat = $resultcat->fetch_assoc()) {
                          $category = $rowcat['prod_name'];
                    }
                }
                $data["data"][] = array($row['prod_name'], $category, $row['html'],$row['mon_price'],$row['annual_price'] ,$row['sku'],$row['prod_available'] ,$row['prod_launch_date'],$desc->webspace,$desc->bandwidth,$desc->free_domain,$desc->language,$desc->mailbox ,"<input type='button' data-id=".$row['prod_id']." class='deleteProduct btn btn-danger' name='deleteProduct' value='delete'>","<input type='button' data-id=".$row['prod_id']." class='editProduct btn btn-success' name='editProduct' data-toggle='modal' data-target='#editModal' value='edit'>");
            }
        }
        return $data;
    }
    public function getSpecificCategory($id ,$conn) {
        $category = "";
        $sqlcat = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='1'  AND `id`='$id'";
        $resultcat = $conn->query($sqlcat);
        if ($resultcat->num_rows > 0) {
            while ($rowcat = $resultcat->fetch_assoc()) {
                $category = $rowcat['prod_name'];
                //echo $category;
            }
            return $category;
        }
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
    public function deleteProduct($id, $conn) {
        $sqldesc = "DELETE FROM tbl_product_description WHERE`prod_id`='$id'";
        if ( $conn->query($sqldesc) == TRUE )
        {
            $sql = "DELETE FROM tbl_product WHERE `id`='$id'";
            if ( $conn->query($sql) == TRUE )
            {
                $ret = "Record deleted successfully"; 
            } 
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
    public function editProduct($id, $conn) {
        $sql = "SELECT a.* , b.*  FROM tbl_product as a INNER JOIN tbl_product_description as b ON a.id = b.prod_id WHERE a.id= '$id'";
        $result = $conn->query($sql);
		return $result;
    }
    public function saveCategory($id, $name, $link, $conn) {
        $sql = "UPDATE tbl_product SET `prod_name`='$name' ,`html`='$link'  WHERE `id` = '$id'";

		if ($conn->query($sql) === TRUE) {
			$ret = "update successfully";
		} else {
			$ret = "Error updating record: " . $conn->error;
		}
		return $ret;
    }
    public function saveProduct($id,$name,$category, $link,$mplan,$aplan,$sku,$web,$bandwidth,$domain, $language,$mailbox, $conn) {
        $arr = array('webspace'=> $web,
         'bandwidth'=>$bandwidth, 
         'free_domain'=>$domain, 
         'language'=>$language, 
         'mailbox'=>$mailbox );
        $ret ="";
        $desc = json_encode($arr);
        $sqlcat = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='1'";
        $resultcat = $conn->query($sqlcat);
        if ($resultcat->num_rows > 0) {
            while ($rowcat = $resultcat->fetch_assoc()) {
                if ($rowcat['prod_name'] == $category) {
                    $catId = $rowcat['id'];
                    $sql = "UPDATE tbl_product SET `prod_parent_id`='$catId' ,`prod_name`='$name' ,`html`='$link'  WHERE `id` = '$id'";
                    if ($conn->query($sql) === TRUE) {
                        $sqldesc = "UPDATE tbl_product_description SET `description`='$desc' ,`mon_price`='$mplan',`annual_price`='$aplan' ,`sku`='$sku'  WHERE `prod_id` = '$id'";
                        if ($conn->query($sqldesc) === TRUE) {
                            $ret = "update successfully";
                        }
                    } else {
                        $ret = "Error updating record: " . $conn->error;
                    }
                    return $ret;
                }
            }
        }
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