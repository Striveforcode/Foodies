<?php
include './../floating-login-signup/partials/_dbconnect.php';
session_start();
$insert = false;
if (isset($_POST['shop_name'])) {

  $email =  $_SESSION['email'];
  $shop_name = $_POST['shop_name'];
  $shop_address = $_POST['shop_address'];
  $shop_description = $_POST['shop_description'];
  
  $shop_img = $_FILES['shop_img']['name'];
  $target_dir = "images/";
  $target_dir1 = "../photos/";
  $target_file = $target_dir1. basename($_FILES["shop_img"]["name"]);
  move_uploaded_file($_FILES["shop_img"]["tmp_name"], $target_file);

  $qr_img = $_FILES['qr_img']['name'];
  $target_file_qr = $target_dir . basename($_FILES["qr_img"]["name"]);
  move_uploaded_file($_FILES["qr_img"]["tmp_name"], $target_file_qr);

  $sql = "INSERT INTO `shop-list` (`shop_name`, `shop_description`, `shop_address`, `shop_img`, `open_close`) VALUES ('$shop_name', '$shop_description', '$shop_address', '$target_file', '1');";
  $result = mysqli_query($conn, $sql);

  $sql1 = ($conn->query("SELECT * from `login-signup` where email = '$email'"))->fetch_assoc();
  $sql2 = $conn->query("SELECT * from `shop-list`");
  $numRows = mysqli_num_rows($sql2);

  $name = $sql1['name'];
  $password = $sql1['password'];
  $phone_number = $sql1['phone_number'];
  
  $sql3 = "INSERT INTO `admin` (`name`, `email`, `password`, `phone_number`, `address`, `shop_number`, `shop_name`, `qr_img`) VALUES ('$name','$email', '$password','$phone_number','$shop_address','$numRows', '$shop_name','$target_file_qr');";
  $result = mysqli_query($conn, $sql3);
  header('Location: ../shops_list/index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="event-upload-form" action="index.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>Shopkeeper Details</h1>
            <label for="psw-repeat">Shop Name</label>
            <input type="text" placeholder="Shop Name" id="shop_name" name="shop_name" required>

            <label for="psw-repeat">Shop Address</label>
            <input type="text" placeholder="Shop Address" id="shop_name" name="shop_address" required>

            <label for="file">Upload Shop Image: </label>
            <input type="file" id="shop_img" name="shop_img" accept="image/*" onchange="imageSet(event)" required>
            <!-- <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"> -->

            <label for="file">Upload QR</label>
            <input type="file" id="shop_img" name="qr_img" accept="image/*" onchange="imageSet(event)" required>

            <label for="description">Description: </label>
            <textarea cols="80" rows="5" id="shop_description" name="shop_description" placeholder="Shop Details"
                required></textarea>

            <button type="submit" class="registerbtn">HOST</button>
    </form>
    <script src="script.js"></script>
</body>

</html>