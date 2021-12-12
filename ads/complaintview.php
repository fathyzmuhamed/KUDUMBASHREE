<?php
$page="Complaints";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('comp').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Complaints</h5>
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
							$sql="select complaints.status as cstatus,complaints.*,reg.* from complaints,reg where (complaints.status!=0 and complaints.status!=2) and complaints.username=reg.username order by complaints.status";
							$res=$ob->db_read($sql);
							?>
							<table class="table" id="comptable">
								<thead>
									<tr>
										<th>#</th>
										<th>User</th>
										<th>Subject</th>
										<th>Description</th>
										<th>Date</th>
										<th>Replay</th>
										<th>Status</th>
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
											<td><?php echo $row['subject'];?></td>
											<td><?php echo $row['description']?></td>
											<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
											<td><?php echo $row['reply']?></td>
											<td>
												<?php 
												if($row['cstatus']==1)
													echo "Pending";
												if($row['cstatus']==3)
													echo "Solved";
												?>
											</td>
											<td>
												<?php
												if($row['cstatus']==1) {
													?>
													<button type="button" onclick="document.replyfrm.compid.value=<?php echo $row['compid']?>" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Reply</button>
													<?php
												}
												?>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Complaint Reply</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="replyfrm" method="post" action="php/complaintview.php">
				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group form-default">
						<textarea name="reply" class="form-control" rows="5" style="height: auto;" required=""></textarea>
						<span class="form-bar"></span>
						<label class="float-label">Reply</label>
					</div>
					<input type="hidden" name="compid">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="button" name="addr" onclick="creply(document.replyfrm.compid.value,document.replyfrm.reply.value)" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
				</div>
			</form>

		</div>
	</div>
</div>

<?php
require('footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#comptable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});		
	});   

	function frwd(compid) {
		Swal.fire({
			text: "Forward complaint to ADS?",
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
					url:'php/complaintview.php',
					data: {'frwd':'set','compid':compid},
					success: function(ret){
						if(ret) {
							Swal.fire({
								text: "Complaint Forwarded Successfully",
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

	function creply(compid,reply) {
		$.ajax({
			type: 'post',
			url:'php/complaintview.php',
			data: {'addr':'set','compid':compid,'reply':reply},
			success: function(ret){
				if(ret) {
					Swal.fire({
						text: "Complaint Reply Added Successfully",
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
</script>