<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}

//logout
if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
    }
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
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.php"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nav Start-->

    <!--user details Start-->
    <section class="mt-5 pt-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span><?php echo$_SESSION['user_name']?></span></p>
                    <p>Email: <span><?php echo$_SESSION['user_email']?></span></p>
                    <p><a href="#orders" id="order-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" action="">
                    <h3 class="mt-2">Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input id="account-password" type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input id="account-password-confirm" type="password" class="form-control" name="confirmPassword" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-password-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--user details End-->

    <!--Orders Start-->
    <section id="orders" class="orders container mb-5 pb-5">
        <div class="container">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Date</th>
                
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/Adventure-Outdoor-Sandals-BROWN-505479460.jpg" alt="">
                        <div>
                            <p class="mt-3">Sandals</p>
                        </div>
                    </div>
                </td>
                <td>
                    <span>2022-11-20</span>
                    
                </td>
            </tr>
            
        </table>

        
        
    </section>
    <!--orders End-->


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