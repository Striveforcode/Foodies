<?php
    include "_dbconnect.php";

    if(isset($_GET['email']) && isset($_GET['v_code'])){
        $email = $_GET['email'];
        $v_code = $_GET['v_code'];
        $query = "SELECT * FROM `login-signup` WHERE email = '$email' AND verification_code = '$v_code'";
        $result = mysqli_query($conn, $query);
        if($result){
            if(mysqli_num_rows($result)==1){
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0){
                    $fetch_email = $result_fetch['email'];
                    $update = "UPDATE `login-signup` SET is_verified = '1' WHERE email = '$fetch_email'";
                    if(mysqli_query($conn,$update)){
                        echo '<script>alert("email verification successful");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
                    } else {
                        echo '<script>alert("Cannot run query");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
                    }
                } else {
                    echo '<script>alert("Email is already verified");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
                }
            }
        } else {
            echo '<script>alert("Cannot run query");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
        }
    }
?>