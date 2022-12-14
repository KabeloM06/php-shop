<?php 
include('server/connection.php');

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM `products` WHERE product_id = ?");
    $stmt->bind_param("i",$product_id);

    $stmt->execute();

    $product = $stmt->get_result();
} else{
    // in case of no product ID
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
                    <a href="shop.php" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Conctact Us</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <a href="account.php"><i class="fas fa-user"></i></a>
                </li>
                <li class="nav-item">
                    
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Nav End-->

<section class="container single-product my-5 pt-5">
    <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()){ ?>
            
                
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img id="mainImg" class="img-fluid w-100 pb-1" src="assets/images/<?php echo $row['product_image'] ?>" alt="">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/images/<?php echo $row['product_image'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="assets/images/<?php echo $row['product_image2'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="assets/images/<?php echo $row['product_image3'] ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="assets/images/<?php echo $row['product_image4'] ?>" width="100%" class="small-img" alt="">
                </div>
                
            </div>
        </div>
        

        <!--Product Details-->
        <div class="col-lg-6 col-md-12 col-12">
            <h6 class="text-capitalize"><?php echo $row['product_category']; ?></h6>
            <h3><?php echo $row['product_name'] ?></h3>
            <h2><?php echo $row['product_price'] ?></h2>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">
            <input type="number" value="1" name="product_quantity">
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>
            <h4 class="mt-5 mb-5">Product Details</h4>
            <span><?php echo $row['product_description'] ?></span>
        </div>
        
        <?php }?>
    </div>

</section>

<!--Related Products start-->
<!--Featured Sart-->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>
            Related Items
        </h3>
        <hr class="mx-auto">
        
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/images/Lace-up-Sneakers-NAVY-505479330.jpg" class="img-fluid mb-3" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">
                Navy Sneakers
            </h5>
            <h4 class="p-price">R600</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/images/Adventure-Outdoor-Sandals-BROWN-505479460-side.jpg" class="img-fluid mb-3" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">
                Brown Sandals
            </h5>
            <h4 class="p-price">R400</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/images/Australian-Cotton-Stripe-Pique-Polo-NAVY-505691304.jpg" class="img-fluid mb-3" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">
                Polo Shirt
            </h5>
            <h4 class="p-price">R700</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/images/StayNew-Slim-Fit-V-neck-Cotton-T-shirt-ICE-506080516-top.jpg" class="img-fluid mb-3" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">
                V-Neck T-Shirt
            </h5>
            <h4 class="p-price">R150</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>
<!--Featured End-->
<!--Related Products end-->

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
<script src="assets/js/scripts.js">
 
</script>
</body>
</html>