<?php 
    include '../floating-login-signup/partials/_dbconnect.php';
    session_start();

    $email = $_SESSION['email'];
    $shop_number = $_SESSION['shop_number'];

    // updating orders
    $add_order = "INSERT INTO `orders` (`shop_number`, `email`, `status`) VALUES ('$shop_number', '$email',0);";
    $result = mysqli_query($conn, $add_order);

    // Finding the order id to assign to new order
    $id = 0;
    $qry = ($conn->query("SELECT * FROM `orders`"));
    while($row = $qry->fetch_assoc()){
        $id =  $row['order_id'];
    };

    // updating order list
    $card_data = ($conn->query("SELECT * FROM `cart` where email='$email' AND shop_number = $shop_number "));
    while($row = $card_data->fetch_assoc()){
        $food_id = $row['food_id'];
        $count = $row['count'];
        $add_order_list = "INSERT INTO `order_list` (`order_id`, `food_id`, `count`) VALUES ($id,$food_id,$count);";
        $result = mysqli_query($conn, $add_order_list);
    };

    $delete_cart = "DELETE FROM `cart` WHERE shop_number = '$shop_number' AND email = '$email'";
    $result2 = mysqli_query($conn, $delete_cart); 
    // header("Location: ../shops_list/index.php");
?>