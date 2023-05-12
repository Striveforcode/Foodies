<?php 

?>

<div class="container-fluid">
	
	<!-- <div class="row">
	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	</div> -->
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">Phone Number</th>
					<th class="text-center">Adderss</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include('./../floating-login-signup/partials/_dbconnect.php'); 
				?>
				<?php 
					$i = 1;
					$shop_number = $_SESSION['shop_number'];
					$users_infos = ($conn->query("SELECT * FROM `user_info` where shop_number = '$shop_number'"));
					while($row= $users_infos->fetch_assoc()):
						$email1 = $row['email'];
				 		$users_data = ($conn->query("SELECT * FROM `login-signup` where email = '$email1'"))->fetch_assoc();
				?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $users_data['name'] ?>
				 	</td>
				 	<td>
				 		<?php echo $users_data['email'] ?>
				 	</td>
				 	<td>
				 		<?php echo $users_data['phone_number'] ?>
				 	</td>
				 	<td>
				 		<?php echo $users_data['address'] ?>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})

</script>