<?php
  include '../floating-login-signup/partials/_dbconnect.php';
  session_start();

  $email = $_SESSION['email'];
  $shop_number = $_SESSION['shop_number'];
  $qry = $conn->query("SELECT * FROM `cart` where email='$email' AND shop_number = $shop_number");

  $total=0;
  while($row = $qry->fetch_assoc()){
    $food_id = $row['food_id'];
    $find_price = ($conn->query("SELECT * FROM `menu` where id = $food_id"))->fetch_assoc();
    $total += $find_price['price']*$row['count'];
  };

    $users_info = ($conn->query("SELECT * FROM `user_info` where email = '$email' AND shop_number = '$shop_number'"));
	$count = mysqli_num_rows($users_info);
	if($count==0){
		$sql = "INSERT INTO `user_info`(`email`, `shop_number`) VALUES ('$email','$shop_number')";
        $result = mysqli_query($conn, $sql); 
	}

  if($total<=0){
    echo '<script>alert("Enter products to your cart");setTimeout(()=>{history.go(-1);},0);</script>';
  }

  $qry1 = ($conn->query("SELECT * FROM `admin` where shop_number = $shop_number "))->fetch_assoc();
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<body style="background-color: #05cf48" ;>
    <!-- <form method="post" enctype="multipart/form-data"> -->
    <div class="container bg-light d-md-flex align-items-center">
        <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
            <!-- <div class="fw-bolder mb-4">
          <span class="fas fa-dollar-sign"></span><span class="ps-1"> <?php echo $total; ?></span>
        </div> -->
            <div class="d-flex flex-column">
                <!-- <div class="d-flex align-items-center justify-content-between text">
            <span class="">Commission</span>
            <span class="fas fa-dollar-sign"
              ><span class="ps-1">1.99</span></span
            >
          </div> -->
                <div class="d-flex align-items-center justify-content-between text mb-4">
                    <span>Total</span>
                    <span class="fas fa-dollar-sign"><span class="ps-1"> <?php echo $total; ?></span></span>
                </div>
                <div class="border-bottom mb-4"></div>
                <div class="d-flex flex-column mb-4">
                    <span class="far fa-file-alt text"><span class="ps-2">UPI ID:</span></span>
                    <span class="ps-3">7985667854@paytm</span>
                </div>
                <div class="d-flex flex-column mb-5">
                    <span class="far fa-calendar-alt text"><span class="ps-2">Paying To:</span></span>
                    <span class="ps-3"><?php echo $qry1['name']; ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-between text mt-5">
                    <div class="d-flex flex-column text"> <span>Customer Support:</span> <span><?php echo $qry1['phone_number']; ?></span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card box2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between p-md-5 p-4">
                <span style="font-size:30px;" class="h5 fw-bold m-0">Payment methods</span>
                <!-- <div class="btn btn-primary bar">
            <span class="fas fa-bars"></span>
          </div> -->
            </div>
            <ul class="nav nav-tabs mb-3 px-md-4 px-2">

                <li class="nav-item">
                <div style="font-weight:bold; font-size:20px;" class="px-2">QR Payment</div>
                </li>


            </ul>
            <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <img class="qr" src="../shop-register/images/<?php echo $qry1['qr_img']; ?>" />
                </div>
                <div class="transa">
                    <p>ScreenShot Of Transaction:</p>
                    <input type="file" accept="image/*" name="pay_img" id="file"
                        onchange="previewPhoto() loadFile(event)">
                    <br>
                    <img src="" id="preview" style="display:none">
                    <br>
                </div>
                <div class="col-12 px-md-5 px-4 mt-3">
                    <button id="payButton" name="upload" class="btn btn-primary w-100">pay
                        <?php echo $total; ?></button>
                </div>
            </form>
            <script>
            function fireSweetAlert() {
                Swal.fire({
                    title: 'Order Placed',
                    text: 'You clicked the button',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Done'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../shops_list/index.php';
                    }
                });
            }

            document.getElementById("payButton").addEventListener("click", function(e) {
                e.preventDefault(); // prevent the form from submitting

                var formData = new FormData();
                formData.append('pay_img', document.getElementById('file').files[0]);
                // Add other fields if necessary

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'index1.php');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        fireSweetAlert();
                    }
                };

                xhr.send(formData);
            });
            </script>


        </div>
    </div>
    <script>
    function previewPhoto() {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('#photo').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = "block";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js";
    </script>
</body>

</html>