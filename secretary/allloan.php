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
									<a class="nav-link active" data-toggle="tab" href="#home">Approved</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1">Closed</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane container active" id="home" style="padding: 20px;">
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
													<th>Action</th>
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
														<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td style="min-width: 80px;"><?php echo date_format(date_create($row['approveddate']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']*1.06?></td>
														<td><?php echo $row['paidamount']?></td>
														<td><?php echo $a?></td>
														<td><button type="button" onclick="{document.amtfrm.lid.value='<?php echo $row['loanid']?>';document.amtfrm.max.value='<?php echo $a?>';document.getElementById('ap').innerHTML='Remaining amount to pay <?php echo $a?>'}" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary" style="margin: auto;display: block;">Update</button></td>
														<td><button type="button" class="btn btn-sm btn-info" style="display: block;margin: auto;" onclick="view(<?php echo $row['loanid']?>)">View</button></td>
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
										<table class="table table-hover" id="loantable2">
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
				<h4 class="modal-title">Loan Installment</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="amtfrm" method="post">
				<!-- Modal body -->
				<div class="modal-body">
					<p id="ap"></p>
					<div class="form-group form-default">
						<input type="number" name="amtp" id="amtp" class="form-control">
						<span class="form-bar"></span>
						<label class="float-label">Amount Paid</label>
					</div>
					<input type="hidden" name="lid">
					<input type="hidden" name="max">

				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" name="paya" id="paya" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
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
	});   

	$("#paya").click(function(e){
		if(document.amtfrm.amtp.value=='')
			document.getElementById('amtp').setCustomValidity('Enter amount!');
		else if(document.amtfrm.amtp.value<0)
			document.getElementById('amtp').setCustomValidity('Minimum amount is 1');
		else if(parseInt(document.amtfrm.amtp.value)>parseInt(document.amtfrm.max.value))
			document.getElementById('amtp').setCustomValidity('Maximum amount is '+document.amtfrm.max.value);
		else {
			document.getElementById('amtp').setCustomValidity('');
			e.preventDefault();
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
						url:'php/loan.php',
						data: {'update':'set','amt':document.amtfrm.amtp.value,'loid':document.amtfrm.lid.value},
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

	})
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