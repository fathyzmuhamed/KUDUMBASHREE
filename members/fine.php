<?php
$page="Transactions";
require('header.php');
$apikey="rzp_test_xDVF0h2Ruv2aM5";

?>
<script type="text/javascript">
	document.getElementById('trn').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('trn3').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Total Paid Fine</h5>
					</div>
					<div class="card-block">
						<?php
						$sql="select sum(amount) as sum from fine where finestatus=1 and user='$uname'";
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
							$sql="select * from fine where user='$uname' order by finestatus";
							$res=$ob->db_read($sql);
							?>
							<table class="table" id="finetable">
								<thead>
									<tr>
										<th>#</th>
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
											<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
											<td><?php echo $row['amount']?></td>
											<td><?php echo $row['cause'];?></td>
											<?php 
											if($row['finestatus']==0) {
												?>
												<td>
													<button type="button" onclick="pay('<?php echo $row['amount']?>','<?php echo $row['fineid']?>')" class="btn btn-sm btn-primary" style="margin: auto;display: block;">Pay Now</button>
												</td>
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
													<td>Inhand</td>
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
	
	function pay(amt,fineid){
		var options = {
		"key": "<?php echo $apikey?>", // Enter the Key ID generated from the Dashboard
		"amount": amt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
		"currency": "INR",
		"name": "Kudumbashree",
		"description": "Payment",
		"image": "../images/logo.png",
		//"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
		"callback_url": "php/finesuccess.php?fineid="+fineid,
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
		$('#finetable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Fine</h5>"
			}
		});		
	});   
</script>