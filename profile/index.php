<?php
    include "../floating-login-signup/partials/_dbconnect.php";
    session_start();
    $email=$_SESSION['email'];
    $shop_number = $_SESSION['shop_number'];

    if(!empty($_GET)){
        $upd = $_GET['upd'];
    }else{
        $upd = 0;
    }

    $sql = "SELECT * FROM `login-signup` where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $result_fetch = mysqli_fetch_assoc($result);

    $name = $result_fetch['name'];
    $phone_number = $result_fetch['phone_number'];
    $address = $result_fetch['address'];
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("Location: ../index.php");
        exit;
    }
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        $profile_pic = $result_fetch['profile_pic'];
     }else{
        $profile_pic = "default_profile_pic.jpg";
    }
?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Responsive Sidebar Menu | CodingLab</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="style1.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
    .tabcontent {
        display: none;
    }
    </style>
</head>

<body>
<div class="sidebar">

<ul class="nav-list">
    <div class="tab">
        <li class="profile">
            <div class="profile-details">
                <img src="profile.jpg" alt="profileImg" />
            </div>
        </li>

        <li>
            <a href="#profile" class="tablinks active" onclick="openTab(event, 'profile')">
                <i class="bx bx-user"></i>
                <span class="links_name">
                    Profile
                </span>
            </a>
            <span class="tooltip">Profile</span>
        </li>

        <li>
            <a href="#Myorder" class="tablinks" onclick="openTab(event, 'Myorder')">
                <i class="bx bx-cart-alt"></i>
                <span class="links_name">
                    My Order
                </span>
            </a>
            <span class="tooltip">My Order</span>
        </li>

        <li class="profile">
            <div class="profile-details">
                <form method="post" action = "../restuarent/index1.php">
                    <input type="hidden" name="shop_number" value="<?php echo $shop_number ?>" >
                    <button type = "submit" name = "order" class="btn"><i class="bx bx-log-out" id="log_out"></i></button>
                </form>
                <!-- <a href = "../restuarent/index1.php"><i class="bx bx-log-out" id="log_out"></i></a> -->
            </div>
        </li>
    </div>
</ul>

</div>


    <!-- Profile -->

    <div class="tabcontent" id="profile" style="display:block">
        <style>
        .view input {
            border: 0;
            background: 0;
            outline: none !important;
        }
        </style>


        <section class="py-5 my-5">
            <form method="post" id="account-settings-form" action="profile_pic.php" enctype="multipart/form-data">
                <div class="container">
                    <h1 class="mb-5">Account Settings</h1>
                    <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                        <div class="profile-tab-nav border-right">
                            <div class="p-4">
                                <div class="img-circle text-center mb-3">
                                    <img src="<?php echo 'images/'.$profile_pic; ?>" alt="Image" class="shadow" />

                                    <!-- <input type="file" class="btn btn-primary edit" id="profile-picture-input"
                                        name="image" onchange="loadFile(event)" accept="image/*" style="display: none;">
                                    <label for="profile-picture-input" class="btn btn-primary edit">Edit</label> -->
                                </div>
                                <h4 class="text-center"><?php echo $name; ?></h4>
                            </div>
                            
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account"
                                    role="tab" aria-controls="account" aria-selected="true">
                                    <i class="fa fa-home text-center mr-1"></i>
                                    Account
                                </a>
                                <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                                    aria-controls="password" aria-selected="false">
                                    <i class="fa fa-key text-center mr-1"></i>
                                    Password
                                </a>
                            </div>
                        </div>
                        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <h3 class="mb-4">Account Settings</h3>

                                <div class="row view" id="form">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <!-- <p><?php echo $name; ?></p> -->
                                            <input type="text" class="form-control" value="<?php echo $name; ?>" readonly />
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <!-- <p><?php echo $email; ?></p> -->
                                            <input type="text" class="form-control" value="<?php echo $email; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <!-- <p><?php echo $phone_number; ?></p> -->
                                            <input type="text" class="form-control" value="<?php echo $phone_number; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <!-- <p><?php echo $address; ?></p> -->
                                            <input class="form-control" rows="4" value="<?php echo $address; ?>"  readonly></input>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                <a href="#"><button type="submit" class="btn btn-primary edit"
                                            name="upload">Update</button></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <h3 class="mb-4">Password Settings</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Old password</label>
                                            <input type="password" class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#"><button type="submit" class="btn btn-primary edit"
                                            name="upload">Update</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </section>
        <script>
        const profilePictureInput = document.getElementById('profile-picture-input');
        const profilePicture = document.getElementById('profile-picture');

        profilePictureInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', (event) => {
                profilePicture.src = event.target.result;
            });

            reader.readAsDataURL(file);
        });
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>

    </div>

    <!-- Myorder -->
    <div class="tabcontent" id="Myorder">
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border-color: black;
        }

        body {
            font-family: Arial, sans-serif;
            margin-left: 80px;
        }

        header {
            /* background-color: #007bff; */
            background: #020011;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            padding: 0.5rem;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #d9d9d9;
            cursor: pointer;
        }

        td:nth-child(1),
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            width: 20%;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table td,
        #table th {
            border: 3px solid #ddd;
            padding: 8px;
        }
        </style>

        <header>
            <h1>My Orders</h1>
        </header>
        <main>
            <?php
                // $email=$_SESSION['email'];
                $cats = $conn->query("SELECT * FROM `orders` where email = '$email'");
                while ($row = $cats->fetch_assoc()){
                    $order_id = $row['order_id'];
            ?>
            <table id="table" class="table table-bordered table-hover">
                <thead style="background: #404040; color: white">
                    <tr>
                        <th>Number</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $food_data = $conn->query("SELECT * FROM `order_list` where order_id = '$order_id'");
                        $i = 1;
                        $total = 0;
                        $status = $row['status'];
                        while($it = $food_data->fetch_assoc()){
                            $food_id = $it['food_id'];
                            $food_count = $it['count'];
                            $food_price = ($conn->query("SELECT * FROM `menu` where id = '$food_id'"))->fetch_assoc();
                            $price = $food_price['price'];
                            $food_name = $food_price['name'];
                            $total += $food_count*$price;
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $food_name ?></td>
                        <td><?php echo $food_count ?></td>
                        <td><?php echo $price ?></td>
                    </tr>
                    <?php }; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">TOTAL</th>
                        <th colspan="2" ><?php echo number_format($total,2) ?></th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-right">STATUS</th>
                        <?php if($status==0) : ?>
                            <th colspan="2" ><button type="button" class="btn btn-secondary">Pending</button></th>
                        <?php elseif($status==1) : ?>
							<th colspan="2" ><button type="button" class="btn btn-success">Confermed</button></th>
						<?php endif; ?>
                    </tr>

                </tfoot>
            </table>
            <?php }; ?>
        </main>
        <script src="script.js"></script>

    </div>
    <script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>
</body>

</html>