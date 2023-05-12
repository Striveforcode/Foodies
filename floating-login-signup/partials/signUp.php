<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code){
  
  include '../../phpmailer1/Exception.php';
  include '../../phpmailer1/PHPMailer.php';
  include '../../phpmailer1/SMTP.php';

  $mail = new PHPMailer(true);

  try {
    //Server settings  
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
    $mail->Username   = 'jainyuvi431@gmail.com';                     //SMTP username
    $mail->Password   = 'pcpspppwdzdirgxv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('jainyuvi431@gmail.com', 'food delivery website');
    $mail->addAddress($email);  


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from our food delivery website';
    $mail->Body    = "Thanks for registration! <b>click on link below to verify the email address</b> <a href = '172.16.15.7/dbms04/floating-login-signup/partials/verify.php?email=$email&v_code=$v_code'>verify</a>";
   

    $mail->send();
    echo 'Message has been sent';
    return true;
  } catch (Exception $e) {
    return false;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "_dbconnect.php";
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone_number = $_POST["phone"];
      $password = $_POST["password"];
      $cpassword = $_POST["cpassword"];


      $sql = "SELECT * FROM `login-signup` where email='$email'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if ($num == 1){
        echo '<script>alert("Use another email");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
      }
      else if($password == $cpassword){
        $v_code = bin2hex(random_bytes(16));
          $sql = "INSERT INTO `login-signup` (`name`, `email`, `password`,`date`, `verification_code`, `is_verified`, `phone_number`) VALUES ('$name', '$email', '$password',current_timestamp(),'$v_code','0', $phone_number)";
          $result = mysqli_query($conn, $sql); 
          $check = sendMail($email,$v_code);
          if ($result && $check){
              echo '<script>alert("Sign up succesfully ");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
          } else {
            echo '<script>alert("Server down");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
          }
      }
      else{
          // $showError = "Passwords do not match";
          echo '<script>alert("Passwords do not match");setTimeout(()=>{window.location.replace("../../index.php");},500);</script>';
      }
  }

?>