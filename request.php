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
}
if (isset($_GET['getTable'])) {
    $data = array();
    //print_r($_SESSION['cart']);
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key=>$val) {
            foreach ($val as $k=>$v) {
                $data['data'][] = array($v['name'],$v['price'],$v['sku'] , $v['webspace'], $v['bandwidth'], $v['domain'], $v['language'], $v['mailbox']);
            }
        } 
    }
    echo json_encode($data);
}
?>