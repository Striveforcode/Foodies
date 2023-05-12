<style>
</style>
<style>
	.logo {
		margin: auto;
		font-size: 20px;
		background: white;
		padding: 5px 11px;
		border-radius: 50% 50%;
		color: #000000b3;
	}

	.foimg {
		width: 70px;
		height: 40px;
	}

	.dropdown-toggle {
		display: flex;
		align-items: center;

	}

	.my-lg-2 {
		color: white;

	}

	.dropdown-toggle {
		margin-left: 90px;
	}

	.dropdown-menu {
		position: absolute;
		top: 100%;
		right: 0;
		min-width: 200px;
		padding: 1rem;
		border-radius: 0.25rem;
		box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
		opacity: 0;
		transform: translateY(-1rem);
		transition: all 0.3s ease-in-out;
	}

	.dropdown-menu.show {
		opacity: 1;
		transform: translateY(0);
	}

	.dropdown-item {
		display: flex;
		align-items: center;
		color: #333;
		transition: all 0.3s ease-in-out;
	}

	.dropdown-item:hover {
		color: #fff;
		background-color: #007bff;
	}

	.dropdown-item i {
		margin-right: 0.5rem;
	}

	.with-arrow {
		position: absolute;
		top: -0.5rem;
		right: 1rem;
		display: inline-block;
		width: 1rem;
		height: 1rem;
		background-color: #007bff;
		transform: rotate(45deg);
	}

	.with-arrow span {
		position: absolute;
		display: inline-block;
		width: 0.75rem;
		height: 0.75rem;
		background-color: #fff;
		transform: rotate(-45deg);
		top: 0.125rem;
		left: 0.125rem;
	}

	.user-dd {
		animation: flipInY 0.8s ease-in-out;
	}

	@keyframes flipInY {
		from {
			transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
			animation-timing-function: ease-in;
			opacity: 0;
		}

		40% {
			transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
			animation-timing-function: ease-in;
		}

		60% {
			transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
			opacity: 1;
		}

		80% {
			transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
		}

		to {
			transform: perspective(400px);
		}
	}
	
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
	<div class="container-fluid mt-2 mb-2">
		<div class="col-lg-12">
			<div class="col-md-1 float-left" style="display: flex;">
				<img class="foimg" src="4.webp">
				<!-- <div class="logo">
  				<i class="fa fa-building"></i>
  			</div> -->
			</div>
			<div style="
      margin-top:5px" class="col-md-4 float-left text-white">
				<large><b><?php echo $_SESSION['shop_name']; ?></b></large>
			</div>
			<div style=" margin-top:5px;" class="col-md-2 float-right text-white">
				
				<a class="dropdown-toggle text-muted waves-effect waves-dark" href="http://stage.foodpurby.in/admin/dashboard#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<p class="my-lg-2">Hi <?php echo $_SESSION['owner_name'] ?></p>
					<img src="user-default.png" alt="user" class="img-circle" style="margin-right: 10px; margin-left:5px;" width="30" />
				</a>
				<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
					<span class="with-arrow"><span class="bg-primary"></span></span>
					<div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
						<span style = "margin-right: 10px" class="fa fa-2x fa-user-circle"></span>
						<div class="m-l-10">
							<h5 class="m-b-0">admin</h5>
						</div>
					</div>
					<!-- <a class="dropdown-item" href="http://stage.foodpurby.in/admin/admin-user/profile-view"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
					<a class="dropdown-item" href="http://stage.foodpurby.in/admin/change-password"><i class="fa fa-key m-r-5 m-l-5"></i>Change Password</a>
					<a class="dropdown-item" href="http://stage.foodpurby.in/admin/admin-user/profile-update"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> -->
					<a class="dropdown-item" href="../floating-login-signup/partials/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
				</div>
			</div>
		</div>
	</div>

</nav>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

	<div class="sidebar-list">

		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
		<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-list"></i></span>Orders</a>
		<a href="index.php?page=menu" class="nav-item nav-menu"><span class='icon-field'><i class="fa fa-list"></i></span>Menu</a>
		<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
		
	</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>