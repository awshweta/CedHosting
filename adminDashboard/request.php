<?php
include_once("../Dbcon.php");
include_once("../Product.php");

    if (isset($_POST['action'])) {
        if ($_POST['action'] == "addCategory") {
            $name = isset($_POST["name"]) ? trim($_POST["name"]) :"";
            $link = isset($_POST['link']) ? $_POST['link'] :"";
            $db = new Dbcon();
            $product = new Product();
            $result=$product->addCategory($name, $link, $db->conn);
            echo json_encode($result);
        }
        if ($_POST['action'] == "addProduct") {
            $name = isset($_POST["name"]) ? trim($_POST["name"]) :"";
            $category = isset($_POST["category"]) ? trim($_POST["category"]) :"";
            $link = isset($_POST['link']) ? $_POST['link'] :"";
            $mplan =isset($_POST['mplan']) ? $_POST['mplan'] :"";
            $aplan =isset($_POST['aplan']) ? $_POST['aplan'] :"";
            $sku =isset($_POST['sku']) ? $_POST['sku'] :"";
            $web = isset($_POST['web']) ? $_POST['web'] :"";
            $bandwidth =isset($_POST['bandwidth']) ? $_POST['bandwidth'] :"";
            $domain =isset($_POST['domain']) ? $_POST['domain'] :"";
            $language =isset($_POST['language']) ? $_POST['language'] :"";
            $mailbox =isset($_POST['mailbox']) ? $_POST['mailbox'] :"";
            $db = new Dbcon();
            $product = new Product();
            $result=$product->addProduct($name,$category, $link,$mplan,$aplan,$sku,$web,$bandwidth,$domain, $language,$mailbox, $db->conn);
            echo json_encode($result);
        }
        if ($_POST['action'] == "deleteCategory") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $arr = $product->deleteCategory($id, $db->conn);
            $cat = array('category'=>$arr);
            echo json_encode($cat);
        }
        if ($_POST['action'] == "editCategory") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->editCategory($id, $db->conn);
            if ($arr->num_rows > 0) {
                while ($row = $arr->fetch_assoc()){
                    $data[] = $row;
                }
            }
            echo json_encode($data);
        }
        if ($_POST['action'] == "saveCategory") {
            $id = $_POST['id'];
            $name = $_POST["name"];
            $link = $_POST['link'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->saveCategory($id, $name, $link, $db->conn);
            echo json_encode($arr);
        }
        if ($_POST['action'] == "enableCategory") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->enableCategory($id, $db->conn);
            echo json_encode($arr);
        }
        if ($_POST['action'] == "disableCategory") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->disableCategory($id, $db->conn);
            echo json_encode($arr);
        }
    }
    if (isset($_GET['getProduct'])) {
        $db = new DbCon();
        $product = new Product();
        $data = array();
        $available ="";
        $arr = $product->fetchCategory($db->conn);
        if ($arr->num_rows > 0) {
            while ($row = $arr->fetch_assoc()){
                if($row['prod_available'] == 1) {
                    $available ="enable";
                    $data["data"][] = array($row['prod_name'] ,$row['link'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='disableCategory btn btn-danger' name='desable' value='disable'>");
                }
                else {
                    $available ="disable";
                    $data["data"][] = array($row['prod_name'] ,$row['link'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='enableCategory btn btn-success' name='enable' value='enable'>");
                }
            }
        }
        echo json_encode($data);
    }
    if (isset($_GET['getProductTable'])) {
        $db = new DbCon();
        $product = new Product();
        $data = array();
        $arr = array();
        $available ="";
        $arr = $product->fetchAllProduct($db->conn);
        if ($arr->num_rows > 0) {
            while ($row = $arr->fetch_assoc()){
                $id = $row['prod_parent_id'];
                $arr = json_decode($row['description']);
                //print_r($arr);
                $sqlcat = "SELECT *  FROM tbl_product WHERE `prod_parent_id` ='$pid'  AND `id`='$id'";
                $resultcat = $conn->query($sqlcat);
                if ($resultcat->num_rows > 0) {
                    while ($rowcat = $resultcat->fetch_assoc()) {
                            //echo $arr->webspace;
                            $data["data"][] = array($row['prod_name'] ,$rowcat['prod_name'],$row['link'],$row['mon_price'],$row['annual_price'] ,$row['sku'],$row['prod_available'],  ,$row['prod_launch_date'],$arr->webspace,$arr->bandwidth,$arr->free_domain,$arr->language,$arr->mailbox ,"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>");
                    }
                }
                $data["data"][] = array($row['prod_name'] ,$row['link'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory btn btn-danger' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory btn btn-success' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='enableCategory btn btn-success' name='enable' value='enable'>");
            }
        }
        echo json_encode($data);
    }
?>