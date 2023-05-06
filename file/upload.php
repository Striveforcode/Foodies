<!-- <?php
    include "C:/xampp/htdocs/dbms/Food-delivery-software/floating-login-signup/partials/_dbconnect.php";

    session_start();
    $email = $_SESSION['email'];
    $msg = "";
    $filename = $_POST['qr_pic'];
    if(isset($_POST['upload'])) {
        
    
        $query = "UPDATE `orders` SET  qr_pic= '$filename' WHERE email = 'jindalyuvraj2@gmail.com'";
        if(move_uploaded_file($tempname, $folder) && mysqli_query($conn, $query)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
    }
?> -->
