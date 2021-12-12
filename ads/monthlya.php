<?php
$page="Transactions";
require('header.php');
$apikey="rzp_test_rWSgaJR2BxzRC3";

?>
<script type="text/javascript">
	document.getElementById('atrn').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('atrn2').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper"> 
			<div class="page-body">
				<div class="card" style="height: 87%;">
					<div class="card-header">
						<h5>Total Monthly Collection</h5>
					</div>
					<div class="card-block">
						<?php
						$sql="select sum(amount) as sum from monthly where mstatus=1";
						$res=$ob->db_read($sql);
						$row=mysqli_fetch_assoc($res);
						echo "<h4><i class='fa fa-inr'></i>".$row['sum']."/-</h4>"
						?>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Monthly Collection</h5>
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
						<!-- Nav tabs -->
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#home">Paid</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#menu1">Pending</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active container" id="home" style="padding: 20px;">
								<div class="table-responsive">
									<?php
									$sql="select sum(amount) as sum,monthly.* from monthly where mstatus=1 group by month(date),year(date) order by date desc";
									$res=$ob->db_read($sql);
									?>
									<table class="table" id="monthtable">
										<thead>
											<tr>
												<th>#</th>
												<th>Month Year</th>
												<th>Date</th>
												<th>Total Amount</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$n=1;
											while($row=mysqli_fetch_array($res)) {
												?>
												<tr>
													<td><?php echo $n++?></td>
													<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'My')?></td>
													<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
													<td><?php echo $row['sum']?></td>
													<td>
														<button type="button" onclick="view('<?php echo $row['date']?>')" class="btn btn-sm btn-primary" style="margin: auto;display: block;">View</button>
													</td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane container" id="menu1" style="padding: 20px;">
								<div class="table-responsive">
									<?php
									$sql="select * from monthly,reg where mstatus=0 and reg.username=monthly.user order by date";
									$res=$ob->db_read($sql);
									?>
									<table class="table" id="monthtable2">
										<thead>
											<tr>
												<th>#</th>
												<th>User</th>
												<th>Month Year</th>
												<th>Date</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$n=1;
											while($row=mysqli_fetch_array($res)) {
												?>
												<tr>
													<td><?php echo $n++?></td>
													<td><?php echo $row['name'];?></td>
													<td><?php echo date_format(date_create($row['date']),'My');?></td>
													<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
													<td><?php echo $row['amount']?></td>
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
</div>
</div>
<div class="modal fade" id="myModala">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Monthly Collection Details</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="monthdiv">

				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
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
		$('#monthtable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});	
		$('#monthtable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});		
	});   
	function view(date) {
		$.ajax({
			type: 'post',
			url:'php/alltransactions.php',
			data: {'date':date},
			success: function(ret){
				document.getElementById('monthdiv').innerHTML=ret;
				$("#myModala").modal();
			}
		});
	}
	function updatem(mcid) {
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
					data: {'updatem':'set','mcid':mcid},
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
	
	$("#add").click(function(e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url:'php/alltransactions.php',
			data: {'add':'set','date':document.newfrm.date.value},
			beforeSend: function(){
				Swal.fire({
					title:"Wait a sec...",
					allowOutsideClick:false,
					allowEscapeKey:false,});
				Swal.showLoading();
			},
			success: function(ret){
				if(ret==0) {
					Swal.fire({
						text: "Monthly collection already added for given month!",
						icon: 'error',
						showClass: {popup: 'animated fadeInDown faster'},
						hideClass: {popup: 'animated zoomOut faster'},
					}).then(() => {							
						window.location.reload();
					});
				}
				if(ret==1) {
					Swal.fire({
						text: "Added Successfully",
						icon: 'success',
						showClass: {popup: 'animated fadeInDown faster'},
						hideClass: {popup: 'animated zoomOut faster'},
					}).then(() => {							
						window.location.reload();
					});
				}
			}
		});
	})
</script>