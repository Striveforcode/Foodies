<?php
    include "C:/xampp/htdocs/dbms/Food-delivery-software/floating-login-signup/partials/_dbconnect.php";

    session_start();
    $email = $_SESSION['email'];
    $msg = "";

    if(isset($_POST['upload'])) {
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "images/".$filename;

        $query = "UPDATE `login-signup` SET profile_pic = '$filename' WHERE email = '$email'";
          
        if(move_uploaded_file($tempname, $folder) && mysqli_query($conn, $query)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
         header('Location:index1.php?upd=1');
        }
?>