<?php
$page="Loan";
require('header.php');

?>
<script type="text/javascript">
	document.getElementById('loan').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('loan2').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Total Loan Interest Collected</h5>
					</div>
					<div class="card-block">
						<?php
						$sql="select sum(totalamount) as sum1,sum(paidamount) as sum2 from loan where lstatus=2";
						$res=$ob->db_read($sql);
						if(mysqli_num_rows($res)==0) 
							echo "<h4><i class='fa fa-inr'></i>0/-</h4>";
						else {
							$row=mysqli_fetch_assoc($res);
							echo "<h4><i class='fa fa-inr'></i>".($row['sum2']-$row['sum1'])."/-</h4>";
						}
						?>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>All Loan</h5>
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
					<div class="card-block">
						<div class="card-block table-border-style">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#home">Pending</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1">Approved</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu2">Rejected</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu3">Closed</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane container active"  id="home" style="padding: 20px;">
									<div class="table-responsive">
										<table class="table table-hover" id="loantable2">
											<thead>
												<tr>
													<th>#</th>
													<th>User</th>
													<th>Date</th>
													<th>Amount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan,reg where reg.username=loan.user and lstatus=0";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td style="text-align: center;">
															<div class="btn-group" role="group" style="display: inline-flex;">
																<button type="button" onclick="document.replyfrm.loanid.value=<?php echo $row['loanid']?>" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger">Reject</button>
																<button type="button" onclick="approve('<?php echo $row['loanid']?>')" class="btn btn-sm btn-success">Approve</button>
															</div>
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
										<table class="table table-hover" id="loantable1">
											<thead>
												<tr>
													<th>#</th>
													<th>User</th>
													<th>Date</th>
													<th>Amount Taken</th>
													<th>Approved Date</th>
													<th>Total payable amount</th>
													<th>Paid Amount</th>
													<th>Remaining Amount</th>
													<th>Installments</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan,reg where reg.username=loan.user and lstatus=1";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													$a=($row['totalamount']*1.06)-$row['paidamount'];
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td><?php echo date_format(date_create($row['approveddate']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']*1.06?></td>
														<td><?php echo $row['paidamount']?></td>
														<td><?php echo $a?></td>
														<td><button type="button" class="btn btn-sm btn-info" style="display: block;margin: auto;" onclick="view(<?php echo $row['loanid']?>)">View</button></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane container" id="menu2" style="padding: 20px;">
									<div class="table-responsive">
										<table class="table table-hover" id="loantable3">
											<thead>
												<tr>
													<th>#</th>
													<th>User</th>
													<th>Date</th>
													<th>Amount</th>
													<th>Reason</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan,reg where reg.username=loan.user and lstatus=-1";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td><?php echo $row['reason'];?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane container" id="menu3" style="padding: 20px;">
									<div class="table-responsive">
										<table class="table table-hover" id="loantable4">
											<thead>
												<tr>
													<th>#</th>
													<th>User</th>
													<th>Date</th>
													<th>Amount Taken</th>
													<th>Approved Date</th>
													<th>Paid Amount</th>
													<th>Closed Date</th>
													<th>Installments</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan,reg where reg.username=loan.user and lstatus=2";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td><?php echo date_format(date_create($row['approveddate']),'d-m-Y');?></td>
														<td><?php echo $row['paidamount']?></td>
														<td><?php echo date_format(date_create($row['closedate']),'d-m-Y');?></td>
														<td><button type="button" class="btn btn-sm btn-info" style="display: block;margin: auto;" onclick="view(<?php echo $row['loanid']?>)">View</button></td>
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
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Reject Reply</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="replyfrm" >
				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group form-default">
						<textarea name="reply" class="form-control" rows="5" style="height: auto;" required=""></textarea>
						<span class="form-bar"></span>
						<label class="float-label">Reply</label>
					</div>
					<input type="hidden" name="loanid">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="button" name="addr" onclick="reject(document.replyfrm.loanid.value,document.replyfrm.reply.value)" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModalb">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Loan Installment Details</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="loandiv">

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

<script type="text/javascript">
	$(document).ready(function(){
		$('#loantable1').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});		
		$('#loantable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});	
		$('#loantable3').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});	
		$('#loantable4').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No Data</h5>"
			}
		});		
	});   

	function approve(lid) {
		Swal.fire({
			title: 'Approve',
			text: "Approve loan?",
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
					url:'php/loan.php',
					data: {'approve':'set','lid':lid},
					success: function(ret){
						if(ret) {
							Swal.fire({
								text: "Approved Successfully",
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
	function reject(lid,reply) {
		Swal.fire({
			title: 'Reject',
			text: "Reject loan request?",
			icon: 'warning',
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
					url:'php/loan.php',
					data: {'reject':'set','lid':lid,'reply':reply},
					success: function(ret){
						if(ret) {
							Swal.fire({
								text: "Rejected Successfully",
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
	function view(id) {
		$.ajax({
			type: 'post',
			url:'php/loan.php',
			data: {'lid':id},
			success: function(ret){
				document.getElementById('loandiv').innerHTML=ret;
				$("#myModalb").modal();
			}
		});
	}
</script>