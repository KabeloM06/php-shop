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
                <a href="#" class="navbar-brand">ShopItAll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            
            <div class="collapse navbar-collapse nav-buttons nowrap" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
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
                        <i class="fas fa-shopping-cart"><a href="cart.php"></a></i>
                        <i class="fas fa-user"><a href="account.php"></a></i>
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Nav Start-->

    <!--Hero start-->
    <!--Find a hero page image-->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1>The Latest Fashion <br> At The Best Prices</h1>
            <p>
                We offer high quality products at the most affordable prices
            </p>
            <button>Shop Now</button>
        </div>
    </section>
    <!--Hero end-->

    <!--Brand start-->
    <!--I need to make this a slider. Find long but short images-->
    <section id="brand" class="container">

    </section>
    <!--Brand end-->

    <!--New start-->
    <section id="new" class="w-100">
        <div class="card m-3 p-3 mx-auto">
            <div class="carousel slide carousel-fade" id="carouselExampleControls" data-bs-ride="carousel">
    <div class="carousel-inner text-center">
        <div class="carousel-item active">
            <img src="assets/images/shoe-slider.jpg" class="d-block w-100" alt="Black Shoe">
        </div>
        <div class="carousel-item">
            <img src="assets/images/cap-slider.jpg" class="d-block w-100" alt="White cap">
        </div>
        <div class="carousel-item">
            <img src="assets/images/Sandals-slider.jpg" class="d-block w-100" alt="Brown Sandals">
        </div>
        <div class="carousel-item">
            <img src="assets/images/slops-slider.jpg" class="d-block w-100" alt="Flip flops">
        </div>
        <div class="carousel-item">
            <img src="assets/images/sneakers-slider.jpg" class="d-block w-100" alt="Brown Sandals">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="">Next</span>    
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
        
    </button>
            </div>
        </div>
    </section>
    <!--New end-->

    <!--Featured Sart-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>
                Featured Items
            </h3>
            <hr class="mx-auto">
            <p>
                Check out our featured products
            </p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php
            include('server/get_featured_products.php');
        ?>
        <?php
            while($row= $featured_products->fetch_assoc()) {
        ?>
            <div onclick="window.location.href='single_product.php'" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <h4 class="p-price">
                R <?php echo $row['product_price'] ?>
                </h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

        <?php } ?>    
            
        </div>
    </section>
    <!--Featured End-->

    <!--Banner start-->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>END OF YEAR SALE</h4>
            <h1>Christmas Collection <br> Up to 50% off</h1>
            <button class="text-uppercase">Shop Now</button>
        </div>
    </section>
    <!--Banner end-->

    <!--Clothes Start-->
    <section id="clothes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>
                Shirts & Pants
            </h3>
            <hr class="mx-auto">
            <p>
                The best summer look in the country
            </p>
        </div>
        <div class="row mx-auto container-fluid">
        <?php
            include('server/get_shirts.php');
        ?>
        <?php
            while($row= $shirts_products->fetch_assoc()) {
        ?>
            <div onclick="window.location.href='single_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <h4 class="p-price"><?php echo $row['product_price'] ?></h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <?php } ?>
            
        </div>
    </section>
    <!--Clothes End-->

    <!--Shoes Start-->
    <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>
                Footware
            </h3>
            <hr class="mx-auto">
            <p>
                Step into summer with our amazing footware collection
            </p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include "server/get_footware.php" ?>
            <?php
            while($row= $footware_products->fetch_assoc()) {
        ?>
            <div onclick="window.location.href='single_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <button class="buy-btn">Buy Now</button>
            </div>
            <?php } ?>
            
        </div>
    </section>
    <!--Shoes End-->

    <!--Accessories start-->
    <section id="accessories" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>
                Accessories
            </h3>
            <hr class="mx-auto">
            <p>
                Complete any outfit with these beautiful accessories
            </p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php include "server/get_accessories.php" ?>
            <?php
            while($row= $accessories_products->fetch_assoc()) {
        ?>
            <div onclick="window.location.href='single_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <button class="buy-btn">Buy Now</button>
            </div>
            <?php }?>
            
        </div>
    </section>
    <!--Accessories end-->

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