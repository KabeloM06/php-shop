<?php
include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM `products`");

$stmt->execute();

$products = $stmt->get_result();

?>

<!DOCTYPE html>
<htm lang="en">
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
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="shop.html" class="nav-link">Shop</a>
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
    <!--Nav End-->

    
    <div class="row">

    <!--Search side bar start-->
    <section id="search" class="my-5 py-5 ms-2 col-lg-2 col-md-2 col-sm-12">
        <div class="container mt-5 py-5">
            <h3>Filter</h3>
            <hr>
        </div>

        <form action="">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_one">
                        <label for="flexRadioDefault1" class="form-check-label">Footwaer</label>

                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_one">
                        <label for="flexRadioDefault1" class="form-check-label">Shirts & Pants</label>

                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_one">
                        <label for="flexRadioDefault1" class="form-check-label">Accessories</label>

                    </div>
                </div>

            </div>

            <div class="row mx-auto conatainer mt-5">
                <div class="col=lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input id="customRange2" type="range" class="form-range w-100" min="1" max="1000">

                    <div class="w-100">
                        <span style="float: left;">1</span>
                        <span style="float: right;">1000</span>
                    </div>
                </div>
            </div>

            <div>
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </form>

    </section>

    <!--Search side bar end-->
<!--Featured Sart-->
<section id="shop" class="my-5 py-5 col-lg-9 col-md-9 col-sm-12">
    <div class="container mt-5 py-5">
        <h3>
            Products
        </h3>
        <hr>
        <p>
            Check out our Catalogue
        </p>
    </div>
    <div class="row mx-auto container">

        <?php while ($row = $products->fetch_assoc()) {?>
        <div onclick="window.location.href='single_product.html'" class="product card text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/images/<?php echo $row['product_image'] ?>" class="img-fluid mb-3" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">
            <?php echo $row['product_name'] ?>
            </h5>
            <h4 class="p-price">R <?php echo $row['product_price'] ?></h4>
            <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
        </div>
    
        <?php }?>
        <!--pagination-->
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</section>
<!--Featured End-->

    
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