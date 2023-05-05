<?php
// Set up database connection
include '../floating-login-signup/partials/_dbconnect.php';
session_start();

// Retrieve cart data from database
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);
$cart_data = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $cart_item = array(
      "name" => $row['name'],
      "price" => $row['price'],
      "count" => $row['count']
    );
    array_push($cart_data, $cart_item);
  }
}

// Close database connection
$conn->close();

// Return cart data as JSON
echo json_encode($cart_data);
?>
