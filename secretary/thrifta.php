<?php
$page="Transactions";
require('header.php');
$apikey="rzp_test_rWSgaJR2BxzRC3";

?>
<script type="text/javascript">
	document.getElementById('atrn').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('atrn1').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Total Thrift Collected</h5>
					</div>
					<div class="card-block">
						<?php
						$sql="select sum(amount) as sum from thrift where tstatus=1";
						$res=$ob->db_read($sql);
						$row=mysqli_fetch_assoc($res);
						echo "<h4><i class='fa fa-inr'></i>".$row['sum']."/-</h4>"
						?>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Thrift</h5>
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
									$sql="select sum(amount) as sum,meeting.* from thrift,meeting where meeting.meetid=thrift.meetid and tstatus=1 group by meetid";
									$res=$ob->db_read($sql);
									?>
									<table class="table" id="thrifttable">
										<thead>
											<tr>
												<th>#</th>
												<th>Meeting Id</th>
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
													<td><?php echo $row['meetid'];?></td>
													<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
													<td><?php echo $row['sum']?></td>
													<td>
														<button type="button" onclick="view(<?php echo $row['meetid']?>)" class="btn btn-sm btn-primary" style="margin: auto;display: block;">View</button>
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
									$sql="select * from thrift,reg where tstatus=0 and reg.username=thrift.user";
									$res=$ob->db_read($sql);
									?>
									<table class="table" id="thrifttable2">
										<thead>
											<tr>
												<th>#</th>
												<th>User</th>
												<th>Meeting Id</th>
												<th>Date</th>
												<th>Amount</th>	
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
													<td><?php echo $row['name'];?></td>
													<td><?php echo $row['meetid'];?></td>
													<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
													<td><?php echo $row['amount']?></td>
													<td>
														<button type="button" onclick="updatet('<?php echo $row['thriftid']?>')" class="btn btn-sm btn-primary" style="margin: auto;display: block;">Update</button>
													</td>
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
				<h4 class="modal-title">Thrift Details</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="thriftdiv">

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
		$('#thrifttable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});	
		$('#thrifttable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});		
	});   
	function view(id) {
		$.ajax({
			type: 'post',
			url:'php/alltransactions.php',
			data: {'meetid':id},
			success: function(ret){
				document.getElementById('thriftdiv').innerHTML=ret;
				$("#myModala").modal();
			}
		});
	}

	function updatet(tid) {
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
					data: {'updatet':'set','tid':tid},
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