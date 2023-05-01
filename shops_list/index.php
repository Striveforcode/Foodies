<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shop List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <!-- Swiper -->

    <section>
        <div class="swiper swiper1">
            <div class="swiper-wrapper">
            <?php 
                    include'../floating-login-signup/partials/_dbconnect.php';
                    $qry = $conn->query("SELECT * FROM `shop-list`");
                    session_start();
                    while($row = $qry->fetch_assoc()):
            ?>
                <div class="swiper-slide">
                    <img src="../photos/<?php echo $row['shop_img'] ?>" alt="">
                    <div class="shop-content">
                        <h2><?php echo $row['shop_name'] ?></h2>
                        <p><?php echo $row['shop_description'] ?></p>
                        <!-- <i class="fa-solid fa-shop-lock fa-beat"></i> -->
                        <!-- <a><i class="fa-thin fa-shop-lock style='font-size:48px;color:red'"></i></a> -->
                        <?php if($row['open_close']==1) : ?>
                            <form method="post" action = "../restuarent/index1.php">
                                <input type="hidden" name="shop_number" value="<?php echo $row['shop_number'] ?>" >
                                <button type = "submit" name = "order" class="btn">Order</button>
                            </form>
                        <?php else : ?>
                            <p>Shop Close</p>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endwhile; ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination swiper-pagination1"></div>
        </div>

        <script type="module" src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>

</html>