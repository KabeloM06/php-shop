<?php
session_start();

include('server/connection.php');

// Take user to account page if already logged in
if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // check if password is equal to confirm password
    if($password!==$confirmPassword){
        header('location: register.php?error=passwords do not match');
    }

    // check password length
    else if(strlen($password) < 8){
        header('location: register.php?error=password must be at least 8 characters long');
    }
    //if there is no error
    else{

    //check if user already exists
    $user_already_exist_stmt = $conn->prepare("SELECT count(*) FROM `users` WHERE user_email=?");

    $user_already_exist_stmt->bind_param('s',$email);
    $user_already_exist_stmt-> execute();
    $user_already_exist_stmt-> bind_result($num_rows);
    $user_already_exist_stmt->store_result();
    $user_already_exist_stmt->fetch();

    if($num_rows != 0){//num_rows will return a number if there is a matching email
        header('location: register.php?error=user already exists');
    } else{//if there is no user with the email

    //Create a new user
    $stmt = $conn->prepare("INSERT INTO `users` (user_name, user_email,user_password) VALUES (?,?,?)");

    $stmt->bind_param('sss',$name,$email,md5($password));

    //if accout is created successfully
    if($stmt->execute()){
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;

        header('location: account.php?register=Ypu registered successfully');
    //if account was not able to be created
    } else{
        header('location: register.php?error=Could not create the account'); 
    }
}
}
//if user is already registered, take user to account page
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
                <a href="index.html" class="navbar-brand">ShopItAll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            
            <div class="collapse navbar-collapse nav-buttons nowrap" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Home</a>
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

    <!--Register Start-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="registration-form" action="register.php" method="POST">
            <p class="text-danger"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>    
            <div class="form-group">
                    <label>Name</label>
                    <input id="register-name" type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input id="register-email" type="text" class="form-control" name="email" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input id="register-password" type="password" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input id="register-confirm-password" type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    
                    <input id="register-btn" type="submit" class="btn" value="Register" name="register">
                </div>
                <div class="form-group">
                    
                    <a href="login.php" class="btn" id="login-url">Already have an acount? Login.</a>
                </div>
            </form>
        </div>
    </section>
    <!--Registration End-->


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