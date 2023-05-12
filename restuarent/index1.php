<?php
include '../floating-login-signup/partials/_dbconnect.php';
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: ../");
    exit;
}
$shop_number = $_POST['shop_number'];
$_SESSION['shop_number'] = $_POST['shop_number'];
$details_result = ($conn->query("SELECT * FROM `shop-list` where shop_number = $shop_number "))->fetch_assoc();
$shop_name = $details_result['shop_name'];
$shop_description = $details_result['shop_description'];
$shop_address = $details_result['shop_address'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restraunt</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="style1.css" /> -->
    <link rel="stylesheet" href="style1.css" />
    <script>
        window.onbeforeunload = function(event) {
            shoppingCart.clearCart();
        };

        <?php
        // include '../floating-login-signup/partials/_dbconnect.php';
        $sql = "TRUNCATE TABLE cart";
        mysqli_query($conn, $sql);
        // mysqli_close($conn);
        ?>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <ul class="menu-items">
                <li style="margin-left:100px;"><a href="#home"><a href="../shops_list/index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <!-- <li><a href="#food">Category</a></li> -->
                <li><a href="#food-menu">Menu</a></li>
                <li><a href="#testimonials">Reviews</a></li>
                <li><a href="../profile/index.php">Profile</a></li>
                <li><a href="../floating-login-signup/partials/logout.php">Logout</a></li>
            </ul>
            <button type="button" class="btn btn-primary" style='order:3' data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> (<span class="total-count"></span>)</button>
            <h1 class="logo" style="font-size:25px;"><?php echo $shop_name; ?></h1>
        </div>
    </nav>
    <!-- <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home">We belive good food offer great smile</h1>
            <p>Eat Healty, it is good for our health.</p>
            <a href="#food-menu" class="btn btn-primary">Menu</a>
        </div>
    </section> -->
    <section style="min-height: 100vh;
    padding:1rem 10%;
    padding-top: 8.5rem; " class="home" id="home">

        <div class="content" data-aos="fade-right">
            <h3>We belive good food offer great smile</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, odit distinctio error corporis adipisci molestias eveniet optio quaerat tempore asperiores!</p>
            <!-- <a href="#"><button class="add-to-cart btn btn-primary">get started</button></a> -->
        </div>

        <div class="image" data-aos="fade-up">
            <img src="../restuarent/image/home-img.png" alt="">
        </div>

    </section>


    <!--===================================== about ============================================-->

    <!-- <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p class="small">About Us</p>
                <h2>We've beem making healthy food last for 10 years</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ab
                    eos omnis, nobis dignissimos perferendis et officia architecto,
                    fugiat possimus eaque qui ullam excepturi suscipit aliquid optio,
                    maiores praesentium soluta alias asperiores saepe commodi
                    consequatur? Perferendis est placeat facere aspernatur!
                </p>
            </div>
            <div class="about-img">
                <img src="https://i.postimg.cc/mgpwzmx9/about-photo.jpg" alt="food" />
            </div>
        </div>
        
    </section> -->
    <hr class="dotted" id="about">
    <h1 class="food-menu-heading">About Us </h1>
    <section class="about" id="about">

        <div class="image" data-aos="fade-right"></div>

        <div class="content" data-aos="fade-left">
            <h3>a word about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea accusantium eligendi a totam consequatur! Quis minus amet iusto iure repudiandae, incidunt enim fugiat ipsa? Iure quam et quo quos quisquam!</p>
            <a href="#"><button class="add-to-cart btn btn-primary">learn more</button></a>
        </div>

    </section>
    <!--===================================== testiomonials ============================================-->
    <hr class="dotted">
    <section id="testimonials">
        <h2 class="testimonial-title">Reviews</h2>
        <div class="testimonial-container container">
            <div class="testimonial-box">

                <div class="star-rating">

                    <h3>10,000+</h3>
                </div>
                <h3 class="testimonial-text">
                    Order's Delivered
                </h3>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">

                </div>
                <div class="star-rating">

                    <h3>4.9 <span class="fa fa-star checked"></span></h3>
                    <!-- <span ></span> -->

                </div>
                <h3 class="testimonial-text">
                    Customer Ratings
                </h3>

            </div>
            <div class="testimonial-box">

                <div class="star-rating">

                    <h3>450</h3>
                </div>
                <h3 class="testimonial-text">

                    Receipts Produced
                </h3>

            </div>
            <div class="testimonial-box">

                <div class="star-rating">

                    <h3>98%</h3>
                </div>
                <h3 class="testimonial-text">

                    Natural Products Used
                </h3>

            </div>
        </div>
    </section>


    <hr class="dotted">
    <!--===================================== food menu ============================================-->

    <section id="food-menu">
        <h2 class="food-menu-heading">Food Menu</h2>
        <div class="food-menu-container container" data-aos="fade-up">
            <?php
            $qry = $conn->query("SELECT * FROM `menu` where shop_number='$shop_number' AND status = 1");
            while ($row = $qry->fetch_assoc()) :
            ?>
                <div class="food-menu-item" data-aos="fade-up">
                    <div class="food-img">
                        <img src="../photos/<?php echo $row['img'] ?>" alt="" />
                    </div>
                    <div class="food-description">
                        <h2 class="food-titile"><?php echo $row['name'] ?></h2>
                        <!-- <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div> -->
                        <p>
                            <?php echo $row['description'] ?>
                        </p>
                        <p class="food-price">Price: &#8377; <?php echo $row['price'] ?></p>
                        <!-- <button class="btn btn-primary">Add</button> -->
                        <a href="view_prod.php" data-name="<?php echo $row['name'] ?>" data-price="<?php echo $row['price'] ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- gallery section  -->
    <!-- gallery section starts  -->

    <hr class="dotted">
    <section class="gallery" id="gallery">

        <h1 class="food-menu-heading"> our food <span>gallery</span> </h1>

        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img1.jpg" alt="">
                <h3>Pizza</h3>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img2.jpg" alt="">
                <h3>Burger</h3>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img3.jpg" alt="">
                <h3>Fries</h3>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img4.jpg" alt="">
                <h3>Rice</h3>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img5.jpg" alt="">
                <h3>Noodles</h3>
            </div>

            <div class="box" data-aos="zoom-in">
                <img src="../restuarent/image/img6.jpg" alt="">
                <h3>Chicken</h3>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->
    <!--=============================================== Modal =============================================================-->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title" id="exampleModalLabel">Cart</h1>
                </div>
                <div class="modal-body">
                    <table class="show-cart table">

                    </table>
                    <div>Total price: &#8377;<span class="total-cart"></span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="../file/index.php"><button type="button" class="btn btn-primary" onclick="fun()">Order now</button></a>
                </div>
            </div>
        </div>
    </div>
    <hr class="dotted">

    <!-- //<=======================footer==============================> -->

      <!-- footer section starts  -->

    <div class="footer">
        <div class="box-container">
            <div class="box">
                <h1 style="color:white;"><?php echo $shop_name; ?></h1>
                <p><?php echo $shop_description; ?></p>

            </div>

            <div class="box" style="margin-left:100px;">
                <h2>contact info</h2>
                <p> <i class="fas fa-map-marker-alt"></i><?php echo $shop_address; ?></p>
                <p> <i class="fas fa-envelope"></i> example@gmail.com </p>
                <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
                <!-- <p> <i class="fas fa-phone"></i> +111-222-333 </p> -->
            </div>



            <div class="box" style="margin-left:100px;">
                <h2>follow us</h2>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </div>

        </div>

        <h1 class="credit">create by <a href="#">Aditya/Milan/Yuvraj/Naman/Pragya</a> all rights reserved. </h1>

    </div>

    <!-- footer section ends -->
    <!-- .................../ JS Code for smooth scrolling /...................... -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>

    <script>
        AOS.init({
            delay: 200,
            duration: 1000
        })
    </script>
</body>

</html>