<?php
session_start();
//check if user came using single_product form Add To Cart or not
if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        // If cart is not empty
        // Check if the new product is already in the cart
        $products_array_ids = array_column($_SESSION['cart'], "product_id");//returns all product id's already in the cart
        // checks if the new product id is already in the array list
        if(!in_array($_POST['product_id'], $products_array_ids)){

            $product_id = $_POST['product_id'];
            
            // If product is not in cart already
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            //place in a single array
            $product_array = array(
                'product_id'=>$product_id,
                'product_name'=>$product_name,
                'product_price'=>$product_price,
                'product_image'=>$product_image,
                'product_quantity'=>$product_quantity
            );

            $_SESSION['cart'][$product_id]=$product_array;
        }else{
            echo '<script>alert("This product is already in your cart");</script>';
            
        }
    }else{
        //If this is the first product. Cart is empty
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        //place in a single array
        $product_array = array(
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'product_price'=>$product_price,
            'product_image'=>$product_image,
            'product_quantity'=>$product_quantity
        );

        $_SESSION['cart'][$product_id]=$product_array;
    }

}else if(isset($_POST['remove_item'])){
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]); //remove product from cart
} else if(isset($_POST['edit_quantity'])) { // to edit the quantity in the cart
    $product_quantity = $_POST['product_quantity'];
    $product_id = $_POST['product_id'];

    $product_array = $_SESSION['cart'][$product_id];
    $product_array['product_quantity'] = $product_quantity; //old quantity is equals to the new quantity

    $_SESSION['cart'][$product_id] = $product_array;

}

else{
    //take them back to index page
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>ShopItAll</title>
</head>
<body>
    <!--Nav Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3">
        <div class="container">
            <div>
                <a href="index.php" class="navbar-brand">ShopItAll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            
            <div class="collapse navbar-collapse nav-buttons nowrap" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="shop.html" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Conctact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nav Start-->

    <!--Cart Start-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            foreach($_SESSION['cart'] as $key => $value){

            
            ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/<?php echo $value['product_image'];?>" alt="">
                        <div>
                            <p><?php echo $value['product_name'];?></p>
                            <small><span>R </span><?php echo $value['product_price'];?></small>
                            <br>
                            <form action="cart.php" method="POST">
                                
                                <input type="submit" name="remove_item" class="remove-btn" href="#" value="Remove">
                                <input type="hidden" name="product_id" class="remove-btn-id" value="<?php echo $value['product_id'];?>">
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <!-- <a class="edit-btn" href="single_product.html">Edit</a> -->
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']?>">
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                        <input type="submit" class="edit-btn" value="Save Quantity" name="edit_quantity">
                    </form>
                </td>
                <td>
                    <span>R</span>
                    <span class="product-price"><?php echo $value['product_quantity']*$value['product_price'] ?></span>
                </td>
            </tr>
            <?php } ?>
            
        </table>

        <div class="cart-total">
            <table>
                
                <tr>
                    <td>Total</td>
                    <td>R1500</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Check Out</button>
        </div>
        
    </section>
    <!--Cart End-->

        <!--Footer start-->
        <footer class="mt-5 py-5">
            <div class="d-flex justify-content-around container">
                <div class="footer-one col-lg-4 col-md-6 col-sm-12 ">
                    <img src="assets/images/IMG_20211102_124420.png" alt="" class="img-fluid w-75">
                    <p class="pt-3">Trust us with your Christmas shopping</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-one">
                    <h5 class="pb-5">
                        Featured
                    </h5>
                    <ul class="text-uppercase">
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">pants</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">fragrances</a></li>
                        <li><a href="#">New Arrivals</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-one">
                    <h5 class="pb-2">Contact Us</h5>
                    <div>
                        <h6 class="text-uppercase">Address</h6>
                        <p>1234 Main Strees, Pretoria, 0001</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Phone</h6>
                        <p>0120345 6789</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Email</h6>
                        <p>support@shop.com</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-one">
                    <h5 class="pb-2">Social Media</h5>
                    <div class="row socials">
                        <a href="#"><i class="fab fa-instagram py-2"></i> Instagram</a>
                        <a href="#"><i class="fab fa-facebook py-2"></i> Facebook</a>
                        <a href="#"><i class="fab fa-twitter py-2"></i> Twitter</a>
                        <a href="#"><i class="fab fa-tiktok py-2"></i> TikTok</a>
                    </div>
                </div>
            </div>
    
            <div class="copyright mt-5">
                <div class="row container mx-auto">
                    <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
    
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer end-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>