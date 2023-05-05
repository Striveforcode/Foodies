<?php
  include '../floating-login-signup/partials/_dbconnect.php';
  session_start();
  // Get cart data from AJAX request
  $cart = $_POST['cart'];
  $email = $_SESSION['email'];
  $shop_number = $_SESSION['shop_number'];
  // Insert cart items into database
  foreach ($cart as $item) {

    $email = mysqli_real_escape_string($conn, $email);
    $shop_number = mysqli_real_escape_string($conn, $shop_number);
    $name = mysqli_real_escape_string($conn, $item['name']);
    $sql2 = ($conn->query("SELECT * FROM `menu` where name='$name' AND shop_number = $shop_number "))->fetch_assoc();
    $food_id = $sql2['id'];
    $count = mysqli_real_escape_string($conn, $item['count']);
    $sql1 = $conn->query("SELECT * FROM `cart` where food_id = '$food_id'");
    if ($sql1->num_rows > 0) {
        $sql = "UPDATE cart SET count='$count' WHERE food_id='$food_id'";
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
      
      }
      else{
          $sql = "INSERT INTO cart (email,shop_number,food_id,count) VALUES ('$email','$shop_number','$food_id','$count')";
          if (!mysqli_query($conn, $sql)) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
  }

  // Close database connection
  // mysqli_close($conn);

  // Send response to AJAX request
  echo "Cart items added to database";
?>
