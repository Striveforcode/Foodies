
<div class="container-fluid">
<?php 
	include './../floating-login-signup/partials/_dbconnect.php';
	$order_id = $_GET['id'];
	$qr = $_GET['pic'];
	$qry = $conn->query("SELECT * FROM orders where order_id =$order_id");

?>
	<div>
		<!-- <button id="closeButton">Close</button> -->
		<img max-height = "100px" max-width = "100px" src="../file/images/<?php echo $qr; ?>" style = "width : 400px; height : 500px" alt="Payment Image">
	</div>
	<div class="text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
