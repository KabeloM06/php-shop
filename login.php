<?php
session_start();

include('server/connection.php');

// Take user to account page if already logged in
if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM `users` WHERE user_email=? AND user_password=? LIMIT 1");

    $stmt->bind_param('ss', $email,$password);

    if($stmt->execute()){
        $stmt->bind_result($user_id, $user_name,$user_email, $user_password);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;

            header('location: account.php?message=Logged in successfully');
        } else{
            header('location: login.php?error=Unable to varify your account');
        }
    }else{// if there is an error
        header('location: login.php?error=Unable to login. Please check your information and try again');
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
                        <a href="shop.php" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Conctact Us</a>
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

    <!--Login Start-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" action="login.php" method="POST">
                <p class="text-center  text-danger"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input id="login-email" type="text" class="form-control" name="email" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    
                    <input id="login-btn" name="login_btn" type="submit" class="btn" value="Login">
                </div>
                <div class="form-group">
                    
                    <a href="register.php" class="btn" id="register-url">Don't have an acount? Register.</a>
                </div>
            </form>
        </div>
    </section>
    <!--Login End-->


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