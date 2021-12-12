<?php
$page="Transactions";
require('header.php');
$apikey="rzp_test_rWSgaJR2BxzRC3";

?>
<script type="text/javascript">
	document.getElementById('atrn').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('atrn3').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Total Fine Collected</h5>
					</div>
					<div class="card-block">
						<?php
						$sql="select sum(amount) as sum from fine where finestatus=1";
						$res=$ob->db_read($sql);
						$row=mysqli_fetch_assoc($res);
						echo "<h4><i class='fa fa-inr'></i>".$row['sum']."/-</h4>"
						?>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Fine</h5>
						<div class="card-header-right">
							<ul class="list-unstyled card-option">
								<li><i class="fa fa fa-wrench open-card-option"></i></li>
								<li><i class="fa fa-window-maximize full-card"></i></li>
								<li><i class="fa fa-minus minimize-card"></i></li>
								<li><i class="fa fa-refresh reload-card"></i></li>
								<li><i class="fa fa-trash close-card"></i></li>
							</ul>
						</div>
					</div>
					<div class="card-block table-border-style">
						<div class="table-responsive">
							<?php
							$sql="select * from fine,reg where reg.username=fine.user  order by finestatus";
							$res=$ob->db_read($sql);
							?>
							<table class="table" id="thrifttable">
								<thead>
									<tr>
										<th>#</th>
										<th>User</th>
										<th>Date</th>
										<th>Amount</th>
										<th>Cause</th>
										<th>Status</th>
										<th>Clear Date</th>
										<th>Mode</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$n=1;
									while($row=mysqli_fetch_array($res)) {
										?>
										<tr>
											<td><?php echo $n++?></td>
											<td><?php echo $row['name']?></td>
											<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
											<td><?php echo $row['amount']?></td>
											<td><?php echo $row['cause'];?></td>
											<?php 
											if($row['finestatus']==0) {
												?>
												<td>Not Paid</td>
												<td>-</td>
												<td>-</td>
												<?php
											}
											if($row['finestatus']==1) {
												?>
												<td>Paid</td>
												<td style="min-width: 80px;"><?php echo date_format(date_create($row['cleardate']),'d-m-Y')?></td>
												<?php 
												if($row['mode']==1) {
													?>
													<td>Direct</td>
													<?php
												}
												else if($row['mode']==2) {
													?>
													<td>Online</td>
													<?php
												}
												?>
												<?php
											}
											?>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<?php
require('footer.php');
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	
	function pay(amt){
		var options = {
		"key": "<?php echo $apikey?>", // Enter the Key ID generated from the Dashboard
		"amount": amt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
		"currency": "INR",
		"name": "Kudumbashree",
		"description": "Payment",
		"image": "../images/logo.png",
		//"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
		"callback_url": "success.php",
		"prefill": {
			"name": "<?php echo $data['name']?>",
			"email": "<?php echo $data['username']?>",
			"contact": "<?php echo $data['contact']?>"
		},
		"notes": {
			"address": "Razorpay Corporate Office"
		},
		"theme": {
			"color": "#3399cc"
		}
	};
	var rzp1 = new Razorpay(options);
	rzp1.open();
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#thrifttable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});		
	});   
	function updatef(fid) {
		Swal.fire({
			text: "Update status to paid?",
			icon: 'question',
			showClass: {popup: 'animated fadeInDown faster'},
			hideClass: {popup: 'animated zoomOut faster'},
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'post',
					url:'php/alltransactions.php',
					data: {'updatef':'set','fid':fid},
					success: function(ret){
						if(ret) {
							Swal.fire({
								text: "Updated Successfully",
								icon: 'success',
								showClass: {popup: 'animated fadeInDown faster'},
								hideClass: {popup: 'animated zoomOut faster'},
							}).then(() => {							
								window.location.reload();
							});
						}
					}
				});
			}

		});
		
	}
</script>