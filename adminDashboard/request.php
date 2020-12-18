<?php
include_once("../Dbcon.php");
include_once("../Product.php");

    if (isset($_POST['action'])) {
        if ($_POST['action'] == "addCategory") {
            $name = isset($_POST["name"]) ? trim($_POST["name"]) :"";
            $link = isset($_POST['link']) ? $_POST['link'] :"";
            $link = json_encode($link);
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
        if ($_POST['action'] == "deleteProduct") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $arr = $product->deleteProduct($id, $db->conn);
            echo json_encode($arr);
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
        if ($_POST['action'] == "editProduct") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $catdata = array();
            $arr = $product->editProduct($id, $db->conn);
            $cat = $product->fetchCategory($db->conn);
            if ($arr->num_rows > 0) {
                while ($rowdata = $arr->fetch_assoc()){
                    $data[] = $rowdata;
                }
            }
            if ($cat->num_rows > 0) {
                while ($row = $cat->fetch_assoc()){
                    $catdata[] = $row;
                }
            }
            $prod_data = $data[0];
            $prod_data['description'] = json_decode($prod_data['description']);
            $alldata = array('product'=>$prod_data, 'category'=>$catdata);
            echo json_encode($alldata);
        }
        if ($_POST['action'] == "saveProduct") {
            $id = $_POST['id'];
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
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->saveProduct($id,$name,$category, $link,$mplan,$aplan,$sku,$web,$bandwidth,$domain, $language,$mailbox, $db->conn);
            echo json_encode($arr);
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
        if ($_POST['action'] == "enableProduct") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->enableProduct($id, $db->conn);
            echo json_encode($arr);
        }
        if ($_POST['action'] == "disableProduct") {
            $id = $_POST['id'];
            $db = new DbCon();
            $product = new Product();
            $data = array();
            $arr = $product->disableProduct($id, $db->conn);
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
        $arr = $product->fetchAllCategory($db->conn);
        echo json_encode($arr);
    }
    if (isset($_GET['getProductTable'])) {
        $db = new DbCon();
        $product = new Product();
        $data["data"] = array();
        $arr = array();
        $available ="";
        $category = "";
        $arr = $product->fetchAllProduct($db->conn);
        echo json_encode($arr);
    }
?>