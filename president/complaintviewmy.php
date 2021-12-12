<?php
$page="Complaints";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('comp').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('comp2').setAttribute('class','active');
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
							$sql="select * from complaints where username='$uname' order by status";
							$res=$ob->db_read($sql);
							?>
							<table class="table" id="comptable">
								<thead>
									<tr>
										<th>#</th>
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
											<td><?php echo $row['subject'];?></td>
											<td><?php echo $row['description']?></td>
											<td style="min-width: 80px;"><?php echo date_format(date_create($row['date']),'d-m-Y')?></td>
											<td><?php echo $row['reply']?></td>
											<td>
												<?php 
												if($row['status']==0) 
													echo "Pending";
												if($row['status']==1)
													echo "Forwarded to ADS";
												if($row['status']==2)
													echo "Solved";
												?>
											</td>
											<td>
												<?php 
												if($row['status']==0) {
													?>
													<button type="button" onclick="del('<?php echo $row['compid']?>')" class="btn btn-sm btn-danger" style="margin: auto;display: block;">Delete</button>
													<?php
												}
												else
												{
													echo "-";
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


<?php
require('footer.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#comptable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No complaints added</h5>"
			}
		});		
	});   

	function del(compid) {
		Swal.fire({
			title: 'Delete',
			text: "Delete this complaint?",
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
					url:'php/complaintdel.php',
					data: {'compid':compid},
					success: function(ret){
						if(ret) {
							Swal.fire({
								text: "Deleted Successfully",
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