<?php
include "C:/xampp/htdocs/dbms/Food-delivery-software/floating-login-signup/partials/_dbconnect.php";
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("Location: ../floating-login-signup");
    exit;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restraunt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css" />
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <ul class="menu-items">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <!-- <li><a href="#food">Category</a></li> -->
                <li><a href="#food-menu">Menu</a></li>
                <li><a href="#testimonials">Testimonial</a></li>
                <li><a href="../profile_page_user/index1.php">Profile</a></li>
                <li><a href="../floating-login-signup/partials/logout.php">Logout</a></li>
                <!-- <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> (<span
              class="total-count"></span>)</button>
            </li> -->
              <!-- <button class="clear-cart btn btn-danger">Clear Cart</button> -->
            </ul>
            <button type="button" class="btn btn-primary" style= 'order:3' data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i> (<span
              class="total-count"></span>)</button>
            <h1 class="logo">Desi Restraunt</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home">Eat Right Food</h1>
            <p>Eat Healty, it is good for our health.</p>
            <a href="#food-menu" class="btn btn-primary">Menu</a>
        </div>
    </section>

    <!--===================================== about ============================================-->

    <section id="about">
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
        
    </section>
   
    <!--===================================== testiomonials ============================================-->

    <section id="testimonials">
        <h2 class="testimonial-title">Reviews</h2>
        <div class="testimonial-container container">
            <div class="testimonial-box">
             
                <div class="star-rating">
                   
                    <p>10,000+</p>
                </div> 
                <p class="testimonial-text">
                    Order's Delivered
                </p>

            </div>
            <div class="testimonial-box">
                <div class="customer-detail">
                   
                </div>
                <div class="star-rating">
                   
                    <p>4.9 <span class="fa fa-star checked"></span></p>
                    <!-- <span ></span> -->

                </div>
                <p class="testimonial-text">
                    Customer Ratings
                </p>

            </div>
            <div class="testimonial-box">
                
                <div class="star-rating">
                    
                    <p>450</p>
                </div>
                <p class="testimonial-text">
                    
                    Receipts Produced
                </p>

            </div>
            <div class="testimonial-box">
                
                <div class="star-rating">
                    
                    <p>98%</p>
                </div>
                <p class="testimonial-text">
                    
                    Natural Products Used
                </p>

            </div>
        </div>
    </section>

    <!--===================================== food menu ============================================-->

    <section id="food-menu">
        <h2 class="food-menu-heading">Food Menu</h2>
        <div class="food-menu-container container">
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 1</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_1" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>

            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/sgzXPzzd/food-menu2.jpg" alt="error" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 2</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_2" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/8zbCtYkF/food-menu3.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 3</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food Menu Item 3" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/Yq98p5Z7/food-menu4.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 4</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_4" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/KYnDqxkP/food-menu5.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 5</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_5" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 6</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_6" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
            <div class="food-menu-item">
                <div class="food-img">
                    <img src="https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-titile">Food Menu Item 7</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
                        quae.
                    </p>
                    <p class="food-price">Price: &#8377; 250</p>
                    <!-- <button class="btn btn-primary">Add</button> -->
                    <a href="#" data-name="Food_Menu_Item_7" data-price="250" class="add-to-cart btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
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
            <div>Total price: $<span class="total-cart"></span></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Order now</button>
          </div>
        </div>
      </div>
    </div>

    <!-- //<=======================footer==============================> -->
    
    <footer class="foot_sec">
        <div class="foot_top">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="foot_left">
                  <h2>DESI RESTRAUNT</h2>
                  <p>WINDOW KING, PROFESSIONAL WINDOW CLEANING, <br>
                    IS A LOCAL FAMILY RUN WINDOW CLEANING SERVICE <br>
                    THAT BEEN IN BUSINESS SINCE 1998.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="foot_rt">
                  <h3>CONTACTS</h3>
                  <p>
                    <span>Address: </span>
                     West Littleton Boulevard Littleton, Colorado 80187
                  </p>
                  <p>
                    <span>Phone: </span>
                    <a href="tel:#">(123) 731-4000</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="foot_btm">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p> Desi Restraunt © 2023. Allright Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    <!-- .................../ JS Code for smooth scrolling /...................... -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>

</html>

</body>

</html>