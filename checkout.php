<?php
session_start();

if(!empty($_SESSION['cart']) && isset($_POST['checkout'])){
    //let user into page

}else{
    //send user to homepage
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
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nav Start-->

    <!--Payment Start-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="server/place_order.php" method="POST">
                <div class="form-group checkout-small">
                    <label>Name</label>
                    <input id="checkout-name" type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small">
                    <label>Email</label>
                    <input id="checkout-email" type="text" class="form-control" name="email" placeholder="email" required>
                </div>
                <div class="form-group checkout-small">
                    <label>Phone</label>
                    <input id="checkout-phone" type="tel" class="form-control" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group checkout-small">
                    <label>City</label>
                    <input id="chekout-city" type="text" class="form-control" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large">
                    <label>Address</label>
                    <input id="chekout-address" type="text" class="form-control" name="address" placeholder="Address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p class="total-text">Order Total: <span>R <?php echo $_SESSION['total']?></span></p>
                    <input id="checkout-btn" type="submit" class="btn" value="Place Order" name="place_order">
                </div>
                
            </form>
        </div>
    </section>
    <!--Payment End-->

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