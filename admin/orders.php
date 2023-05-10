<style>
	.view_order {
		background-color: #007bff;
		border-color: #007bff;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		position: relative;
		overflow: hidden;
		transition: all 0.3s ease-in-out;
		border-radius:10px;
		width:60px;
	}

	.view_order img {
		height: 20px;
		margin-right: 5px;
		width: 30px;
	}

	.view_order:hover {
		background-color: #0062cc;
		border-color: #0062cc;
		transform: translateY(-1px);
	}

	.view_order:active {
		background-color: #005cbf;
		border-color: #005cbf;
		transform: translateY(0);
	}
</style>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr style="
			 background-color:cadetblue;">
						<th>#</th>
						<th>Name</th>
						<th>Phone number</th>
						<th>Address</th>
						<th>Payment Screenshot</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					include './../floating-login-signup/partials/_dbconnect.php';
					$shop_number = $_SESSION['shop_number'];
					$qry = $conn->query("SELECT * FROM orders where shop_number = $shop_number");
					while ($row = $qry->fetch_assoc()) :
					?>

					<?php 
						// user data fetching
						$email = $row['email'];
						$pay_img = $row['pay_img'];
						$user_data = ($conn->query("SELECT * FROM `login-signup` where email = '$email'"))->fetch_assoc();

						// order list data fetching
						$total_price = 0;
						$order_id = $row['order_id'];
						$order_data = ($conn->query("SELECT * FROM `order_list` where order_id = '$order_id'"));
						while ($order_food_id = $order_data->fetch_assoc()){
							$food_id = $order_food_id['food_id'];
							$order_food_price = ($conn->query("SELECT * FROM `menu` where id = '$food_id'"))->fetch_assoc();
							$total_price += $order_food_price['price']*$order_food_id['count'];
						}
					?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $user_data['name'] ?></td>
							<td><?php echo $user_data['phone_number'] ?></td>
							<td><?php echo $user_data['address'] ?></td>
							<td>
							<button class="btn btn-info view_payment" data-id="<?php echo $row['order_id']?>" data-pic="<?php echo $pay_img ?>" >View</button>
							</td>
							<?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-success">Confirmed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-price="<?php echo $total_price ?>" data-id="<?php echo $row['order_id'] ?>">View</button>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<script>
	$('.view_order').click(function() {
		uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id')+'&total_price=' + $(this).attr('data-price'))
	});

	$('.view_payment').click(function() {
		uni_modal('Payment Screeshot', 'view_payment.php?id=' + $(this).attr('data-id')+'&pic=' + $(this).attr('data-pic'))
	});

	const myButton = document.getElementById('myButton');
	myButton.addEventListener('click', () => {
	const myPopup = document.getElementById('myPopup');
	myPopup.style.display = 'block';
	});

	const closeButton = document.getElementById('closeButton');
	closeButton.addEventListener('click', () => {
	const myPopup = document.getElementById('myPopup');
	myPopup.style.display='none';
	});
</script>