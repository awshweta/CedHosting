<?php
include_once("Dbcon.php");
include_once("User.php"); 
include_once("Product.php");
if (isset($_POST['action'])) {
    if ($_POST['action'] == "addToCart") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        $db = new Dbcon();
        $product = new Product();
        $result = $product->addToCart($id, $price, $db->conn);
        echo json_encode($result);
    }
    if ($_POST['action'] == "deleteProduct") {
        $id = $_POST['id'];
        $ret = "";
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key=>$val) {
                foreach ($val as $k=>$v) {
                    if($v['id'] == $id) {
                        unset($_SESSION['cart'][$key][$k]);
                        $ret = "Record deleted successfully";
                    }
                }
            } 
        }
        echo json_encode($ret);
    }
}

if (isset($_GET['getTable'])) {
    $data = array();
    //print_r($_SESSION['cart']);
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key=>$val) {
            foreach ($val as $k=>$v) {
                $data['data'][] = array($v['category'] ,$v['name'] ,$v['billing'],$v['price'],$v['sku'] , "<input type='button' data-id=".$v['id']." class='deleteCartProduct btn btn-danger' name='deleteCartProduct' value='delete'>");
            }
        } 
    }
    echo json_encode($data);
}
?>