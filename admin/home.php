<style>
	.custom-menu {
		z-index: 1000;
		position: absolute;
		background-color: #ffffff;
		border: 1px solid #0000001c;
		border-radius: 5px;
		padding: 8px;
		min-width: 13vw;
	}

	a.custom-menu-list {
		width: 100%;
		display: flex;
		color: #4c4b4b;
		font-weight: 600;
		font-size: 1em;
		padding: 1px 11px;
	}

	span.card-icon {
		position: absolute;
		font-size: 3em;
		bottom: .2em;
		color: #ffffff80;
	}

	.file-item {
		cursor: pointer;
	}

	a.custom-menu-list:hover,
	.file-item:hover,
	.file-item.active {
		background: #80808024;
	}

	a.custom-menu-list span.icon {
		width: 1em;
		margin-right: 5px
	}

	.candidate {
		margin: auto;
		width: 23vw;
		padding: 0 10px;
		border-radius: 20px;
		margin-bottom: 1em;
		display: flex;
		border: 3px solid #00000008;
		background: #8080801a;

	}

	.candidate_name {
		margin: 8px;
		margin-left: 3.4em;
		margin-right: 3em;
		width: 100%;
	}

	.img-field {
		display: flex;
		height: 8vh;
		width: 4.3vw;
		padding: .3em;
		background: #80808047;
		border-radius: 50%;
		position: absolute;
		left: -.7em;
		top: -.7em;
	}

	.candidate img {
		height: 100%;
		width: 100%;
		margin: auto;
		border-radius: 50%;
	}

	.vote-field {
		position: absolute;
		right: 0;
		bottom: -.4em;
	}

	.grid-container {
		display:flex;
		grid-template-columns: auto auto auto;
		/* background-color: #2196F3; */
		padding: 10px;
	}

	.grid-item {
		/* background-color: rgba(255, 255, 255, 0.8); */
		/* border: 1px solid rgba(0, 0, 0, 0.8); */
		padding: 10px;
		margin-left: 50px;
		margin-bottom: 50px;
		font-size: 30px;
		text-align: center;
		height: 150px;
		padding-top: 46px;
		background-color: #7579ff;
		position: relative;
		box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
		/* border-radius: 15px; */
	}

	.grid-item:hover {
		cursor: pointer;
	}

	.grid-item:active {
		background: #cccccc;
	}

	.imgicon {
		position: absolute;
		top: -11px;
		right: -11px;
		width: 50px;
		height: 50px;
		background:khaki;
		color: #ffffff;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 50%;
		padding: 0%;

	}
</style>

<div style="
margin-left:-26px;
margin-right:-32px;" class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">

		</div>
	</div>

	<div class="row mt-3 ml-3 mr-4">
		<div class="col-lg-12" >
			<div class="card"  style="background-color:bisque;">
				<div class="card-body">
					<?php 
						// include './../floating-login-signup/partials/_dbconnect.php';
						// session_start();
						echo "Welcome back " . $_SESSION['owner_name'] . "!" ;
						$shop_number = $_SESSION['shop_number'];
						$home_data = $conn->query("SELECT * FROM `orders` where shop_number = '$shop_number'");
						$customer_data = $conn->query("SELECT * FROM `user_info` where shop_number = '$shop_number'");
						$menu_data = $conn->query("SELECT * FROM `menu` where shop_number = '$shop_number'");
						$orders_data = $conn->query("SELECT * FROM `orders` where shop_number = '$shop_number' AND status = 0");
						$total_users = mysqli_num_rows($customer_data);
						$total_menu_items = mysqli_num_rows($menu_data);
						$pending_orders = mysqli_num_rows($orders_data);
						$total_orders = 0;
						while($row = $home_data->fetch_assoc()){
							$total_orders += 1;
						}
					?>
				</div>
				<div class="grid-container">
					<div class="grid-item" style="width:280px; margin-right:10px;">
						<h2>Total Orders</h2>
						<h3><?php echo $total_orders; ?></h3>
						<img class="imgicon" src="2.png">
					</div>
					<div class="grid-item" style="width:280px;  margin-left:10px; margin-right:10px">
						<h2>Total Customer</h2>
						<h3><?php echo $total_users; ?></h3>
						<img class="imgicon" src="2.png">
					</div>
					<div class="grid-item" style="width:280px;margin-left:10px ;margin-right:10px">
						<h2>Total Menu Items</h2>
						<h3><?php echo $total_menu_items; ?></h3>
						<img class="imgicon" src="2.png">
					</div>
					<div class="grid-item" style="width:280px;margin-right:10px;margin-left:10px">
						<h2>Pending orders</h2>
						<h3><?php echo $pending_orders; ?></h3>
						<img class="imgicon" src="2.png">
					</div>
				</div>

				
			</div>

		</div>
	</div>
</div>

</div>
<script>

</script>