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
    $price = mysqli_real_escape_string($conn, $item['price']);
    $count = mysqli_real_escape_string($conn, $item['count']);
    $total = mysqli_real_escape_string($conn, $item['total']);
    $sql1 = "select * from cart where name='$name';";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
        $sql = "UPDATE cart SET price='$price',count='$count',total='$total'  WHERE name='$name'";
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();
      
      }
      else{

            $sql = "INSERT INTO cart (email,shop_number,name, price, count, total) VALUES ('$email','$shop_number','$name', '$price', '$count', '$total')";
            if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
  }

  // Close database connection
  mysqli_close($conn);

  // Send response to AJAX request
  echo "Cart items added to database";
?>
