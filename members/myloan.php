<?php
$page="Loan";
require('header.php');
$apikey="rzp_test_xDVF0h2Ruv2aM5";
?>
<script type="text/javascript">
	document.getElementById('loan').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('loan1').setAttribute('class','active');
</script>

<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Apply for Loan</h5>
					</div>
					<div class="card-block">
						<form class="form-material" name="newfrm" id="newfrm">
							<div class="form-group form-default ">
								<input type="number" name="amt" id="amt" class="form-control" required=''>
								<span class="form-bar"></span>
								<label class="float-label">Amount</label>
							</div>
							<div class="form-group form-default" style="text-align: center;">					
								<button type="submit" name="add" id="add"  class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Add</button>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Loan</h5>
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
								<div class="tab-pane active container" id="home" style="padding: 20px;">
									<div class="table-responsive">
										<table class="table table-hover" id="loantable1">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan where user='$uname' and lstatus=0";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
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
												$sql="select * from loan where user='$uname' and lstatus=1";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													$a=($row['totalamount']*1.06)-$row['paidamount'];
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']?></td>
														<td><?php echo date_format(date_create($row['approveddate']),'d-m-Y');?></td>
														<td><?php echo $row['totalamount']*1.06?></td>
														<td><?php echo $row['paidamount']?></td>
														<td><?php echo $a?></td>
														<td><button type="button" onclick="{document.amtfrm.lid.value='<?php echo $row['loanid']?>';document.amtfrm.max.value='<?php echo $a?>';document.getElementById('ap').innerHTML='Remaining amount to pay <?php echo $a?>'}" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary" style="margin: auto;display: block;">Pay Now</button></td>
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
													<th>Date</th>
													<th>Amount</th>
													<th>Reason</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql="select * from loan where user='$uname' and lstatus=-1";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
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
												$sql="select * from loan where user='$uname' and lstatus=2";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
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
						<label class="float-label">Amount Paying</label>
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
$sql="select * from variables";
$res=$ob->db_write($sql);
$row=mysqli_fetch_assoc($res);
$max=$row['bankbal'];
?>
<script src="https://checkout.razorpay.com/v1/checkout.js" id="j" ></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#loantable1').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
		});	
		$('#loantable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	
		$('#loantable3').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	
		$('#loantable4').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	

		$("#add").click(function(e){
			if(document.newfrm.amt.value=='')
				document.getElementById('amt').setCustomValidity('Enter amount!');
			else if(document.newfrm.amt.value><?php echo $max;?>)
				document.getElementById('amt').setCustomValidity('Amount exceeds bank balance!');
			else {
				document.getElementById('amt').setCustomValidity('');
				e.preventDefault();
				$.ajax({
					type: 'post',
					url:'php/loan.php',
					data: {'add':'set','amt':document.newfrm.amt.value},
					success: function(ret){
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
						if(ret==0) {
							Swal.fire({
								text: "You already have pending loan and can't apply for another!",
								icon: 'error',
								showClass: {popup: 'animated fadeInDown faster'},
								hideClass: {popup: 'animated zoomOut faster'},
							}).then(() => {							
								window.location.reload();
							});
						}
					}
				});
			}			
		})

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
				var options = {
				"key": "<?php echo $apikey?>", // Enter the Key ID generated from the Dashboard
				"amount": document.amtfrm.amtp.value*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
				"currency": "INR",
				"name": "Kudumbashree",
				"description": "Payment",
				"image": "../images/logo.png",
				//"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
				"callback_url": "php/loansuccess.php?lid="+document.amtfrm.lid.value+"&amt="+document.amtfrm.amtp.value,
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

	})

		
	});  

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