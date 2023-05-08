<?php
    include "C:/xampp/htdocs/dbms/Food-delivery-software/floating-login-signup/partials/_dbconnect.php";

    session_start();
    $email = $_SESSION['email'];
    $msg = "";

    if(isset($_POST['upload'])){
        header('Location:index1.php?upd=1'); 
    }

    if(isset($_POST['save'])) {
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "images/".$filename;
    
        $query = "UPDATE `login-signup` SET  profile_pic = '$filename' WHERE email = '$email'";
        if(move_uploaded_file($tempname, $folder) && mysqli_query($conn, $query)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
        header('Location:index.php?upd=1');
    } 
    if(isset($_POST['save'])) { 
        // echo 'hi';
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $query2 = "UPDATE `login-signup` SET name = '$name', phone_number = '$phone', address = '$address' WHERE email = '$email'";
        $result = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
        header('Location:index.php?upd=1');
    }
    if(isset($_POST['update'])) { 
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    
        $query = "SELECT password FROM `login-signup` WHERE email = '$email'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
        
        if($old_password===$password) {
            if($new_password === $confirm_password) {
                $query2 = "UPDATE `login-signup` SET password = '$new_password' WHERE email = '$email'";
                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                echo '<script>alert("Password has been changed successfully."); setTimeout(function(){ window.location.href = "index.php?upd=1"; }, 2000);</script>';
            } else {
                echo '<script>alert("New password and confirm password do not match."); window.location.href = "index.php?upd=1";</script>';
            }
        } else {
            echo '<script>alert("Old password is incorrect"); window.location.href = "index.php?upd=1";</script>';
        }
    }
?>
