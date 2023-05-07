<div class="container-fluid">
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Order</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$total = $_GET['total_price'];
			include './../floating-login-signup/partials/_dbconnect.php';
			$order_id = $_GET['id'];
			$qry = $conn->query("SELECT * FROM order_list where order_id =$order_id");
			while($row=$qry->fetch_assoc()):
				$food_id = $row['food_id'];
				$menu_data = ($conn->query("SELECT * FROM menu where id =$food_id"))->fetch_assoc();
				// $total += $row['qty'] * $row['price'];
			?>
			<tr>
				<td><?php echo $row['count'] ?></td>
				<td><?php echo $menu_data['name'] ?></td>
				<td><?php echo number_format($row['count'] * $menu_data['price'],2) ?></td>
			</tr>
			<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">TOTAL</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(){
		start_load()
		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 1){
					alert_toast("Order confirmed.")
                    setTimeout(function(){
                        location.reload()
                    },1500)
				}
			}
		})
	}
</script>