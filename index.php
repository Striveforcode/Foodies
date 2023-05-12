<?php
  include "floating-login-signup/partials/login.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>How to Design Login & Registration Form Transition</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  </head>
  <body>
    
    <div class="bacgroundimg">
      <img src="" alt="">
    </div>
    
    <div class="cont">
      <form action="floating-login-signup/partials/login.php" method = "post">
        <div class="form sign-in">
          <h2>Sign In</h2>
          <label>
            <span>Email</span>
            <input type="email" name = "lemail" required>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name = "lpassword" required>
          </label>
          <div class="warning">

          </div>
          <input type="submit" class="submit" value="Login" name="sign_in" >
          <!-- <p class="forgot-pass">Forgot Password ?</p> -->
    
          <div class="social-media">
            <ul>
              <li><img src="images/facebook.png"></li>
              <li><img src="images/twitter.png"></li>
              <li><img src="images/linkedin.png"></li>
              <li><img src="images/instagram.png"></li>
            </ul>
          </div>
        </div>
      </form>
      <form action="floating-login-signup/partials/signUp.php" method = "post">
        <div class="sub-cont">
          <div class="img">
            <div class="img-text m-up">
              <h2>New here?</h2>
              <p>Sign up and discover great amount of new opportunities!</p>
            </div>
            <div class="img-text m-in">
              <h2>One of us?</h2>
              <p>If you already has an account, just sign in. We've missed you!</p>
            </div>
            <div class="img-btn">
              <span class="m-up">Sign Up</span>
              <span class="m-in">Sign In</span>
            </div>
          </div>
          <div class="form sign-up">
            <h2>Sign Up</h2>
            <label>
              <span>Name</span>
              <input type="text" name = "name" required>
            </label>
            <label>
              <span>Email</span>
              <input type="email" name = "email" required>
            </label>
            <label>
              <span>Phone Number</span>
              <input type="text" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" required oninvalid="this.setCustomValidity('Phone number must contains exact 10 digits for 0-9');" oninput="this.setCustomValidity('');">
            </label>
            <label>
              <span>Password</span>
              <input type="password" name="password" id="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$" required oninvalid="this.setCustomValidity('Password must be at least 6 characters long and contain at least one lowercase letter, one uppercase letter, and one digit.');" oninput="this.setCustomValidity('');">
            </label>
            <!-- <p id="password-error" style="color: red;"></p> -->
            <label> 
              <span>Confirm Password</span>
              <input type="password" name = "cpassword" required>
            </label>
            <!-- <button type="button" class="submit" name = "sign_up">Sign Up Now</button> -->
            <input type="submit" class="submit" value="Sign Up Now" name="sign_up" >
          </div>
        </div>
      </form>
    </div>
    
  <script type="text/javascript" src="script.js"></script>

  <script>
    // const passwordInput = document.getElementById('password');
    // const passwordError = document.getElementById('password-error');

    // passwordInput.addEventListener('input', validatePassword);

    // function validatePassword() {
    //   const password = passwordInput.value;
    //   const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

    //   if (!passwordRegex.test(password)) {
    //     passwordError.textContent = 'Password must be at least 6 characters long and one lowercase letter, one uppercase letter,one digit.';
    //   } else {
    //     passwordError.textContent = '';
    //   }
    // }

    // function handleInvalidPassword() {
    // passwordInput.setCustomValidity('Please enter a password.');
    // }
  </script>

  </body>
</html>