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
                }
                else {
                    $available ="enable";
                }
                $data["data"][] = array($row['prod_name'] ,$row['link'], $available , $row['prod_launch_date'],"<input type='button' data-id=".$row['id']." class='deleteCategory' name='delete' value='delete'>","<input type='button' data-id=".$row['id']." class='editCategory' name='edit' data-toggle='modal' data-target='#myModal' value='edit'>","<input type='button' data-id=".$row['id']." class='enableCategory' name='enable' value='enable'>","<input type='button' data-id=".$row['id']." class='disableCategory' name='desable' value='disable'>");
            }
        }
        echo json_encode($data);
    }
?>