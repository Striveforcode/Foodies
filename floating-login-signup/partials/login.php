<?php
    include "C:/xampp/htdocs/dbms/Food-delivery-software/floating-login-signup/partials/_dbconnect.php";
    $login = false;
    $showError = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
      $email = $_POST["lemail"];
      $password = $_POST["lpassword"]; 
      
      
      $sql_admin = "SELECT * FROM `admin` where email='$email' AND password='$password'";
      $sql = "SELECT * FROM `login-signup` where email='$email' AND password='$password'";
      $result_admin = mysqli_query($conn, $sql_admin);
      $result = mysqli_query($conn, $sql);
      $num_admin = mysqli_num_rows($result_admin);
      $num = mysqli_num_rows($result);
      $result_fetch_admin = mysqli_fetch_assoc($result_admin);
      $result_fetch = mysqli_fetch_assoc($result);

      if($result_fetch['is_verified']==0){
        echo '<script>alert("Email is not verified");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
      }
      else if ($num_admin == 1 && $result_fetch['is_verified']==1){
        // echo "login successfully";
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          header("Location: ../../admin/index.php");
      } 
      else if ($num == 1 && $result_fetch['is_verified']==1){
        // echo "login successfully";
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          header("Location: ../../shops_list/index.php");
      } 
      else{
          echo '<script>alert(" Enter correct email or password ");setTimeout(()=>{window.location.replace("../index.php");},500);</script>';
      }
    }


?>