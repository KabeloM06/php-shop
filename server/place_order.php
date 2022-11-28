<?php
session_start();
include('connection.php');
// check if user has clicked 
if(isset($_POST['place_order'])){

    // Get user info and store it in the database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    $user_id = 1;
    $order_date = date('Y-m-d H:i:s');

    $user_stmt = $conn ->prepare("INSERT INTO `orders` (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
                    VALUES(?,?,?,?,?,?,?);");

    $user_stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);

    $user_stmt->execute();

    $order_id = $user_stmt->insert_id;

    // Get the cart products
    foreach($_SESSION['cart'] as $key=> $value){
        $product = $_SESSION['cart'][$key];

        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];
        $product_image = $product['product_image'];

        $cart_stmt = $conn->prepare("INSERT INTO `order_items` (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                        VALUES(?,?,?,?,?,?,?,?)");

        $cart_stmt->bind_param("iissiiis",$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);

        $cart_stmt->execute();
    }
    
}

?>