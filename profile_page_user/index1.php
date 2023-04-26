<?php
    include "C:/xampp/htdocs/dbms/mini_project/floating-login-signup/partials/_dbconnect.php";
    session_start();
    $email=$_SESSION['email'];

    $sql = "SELECT * FROM `login-signup` where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $result_fetch = mysqli_fetch_assoc($result);

    $name = $result_fetch['name'];
    $phone = $result_fetch['phone_number'];
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("Location: ../floating-login-signup/index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div class="container emp-profile">
        <form method="post" action="profile_pic.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="profile-img">
                        <img src="https://i.pinimg.com/564x/34/23/27/342327463d2c4d4de8381115a9672f0f.jpg" alt="/"
                            style="width: 250px; height: 250px;" id="output">

                        <div class="file btn btn-sm btn-primary mt-3">
                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)">
                            <label for="file" style="cursor: pointer;">Update Image</label>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="profile-head">
                            <h3>
                                <?php echo $name; ?>
                            </h3>
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                                        aria-controls="order" aria-selected="true">Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="fav-order-tab" data-toggle="tab" href="#favorder" role="tab"
                                        aria-controls="favorder" aria-selected="false">Favorite Order</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-10">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <!-- <div class="col-md-4" id="attr">
                                            <label>User Id</label>
                                        </div> -->
                                        <!-- <div class="col-md-8">
                                            <p>123</p>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $name; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $email; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Phone no .</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $phone; ?></p> 
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="row">

                                        <div class="col-md-4" id="attr">
                                            <label>Saved Adresses</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                                    <div class="row">
                                        <p>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseWidthExample" aria-expanded="false"
                                                aria-controls="collapseWidthExample">order one</button>
                                        </p>
                                        <div style="min-height: 120px;">
                                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                                <div class="card card-body" style="width: 300px;">
                                                    This is some placeholder content for a horizontal collapse. It's
                                                    hidden by default and shown when triggered.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="favorder" role="tabpanel"
                                    aria-labelledby="fav-order-tab">
                                    <div class="row">
                                        <p>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseWidthExample" aria-expanded="false"
                                                aria-controls="collapseWidthExample">
                                                order one
                                            </button>
                                        </p>
                                        <div style="min-height: 120px;">
                                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                                <div class="card card-body" style="width: 300px;">
                                                    This is some placeholder content for a horizontal collapse. It's
                                                    hidden by default and shown when triggered.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Milan parmar</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p>mp583939@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="attr">
                                            <label>Phone no .</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p>9327397406</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="justify-content: flex-end;margin-right: 50px;">
                        <a href="#"><button type="submit" name="upload" class="pic mt-4 ml-5 btn btn-warning"><b>Update Profile</b></button></a>
                    </div>
                </div>
            </div>

    </div>
    </form>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="js/profile_pic.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>