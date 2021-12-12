<?php
$page="Services";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('ser').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Snehitha</h5>
					</div>
					<div class="card-block">
						<p style="text-align: justify;">
							Snehitha is a 24 hours working gender help desk. It works to avail support and help to the shield less women in society. The main aim of the center is to provide help and support to those women and children who are in distress and provide voice for their issues and concerns, also to prevent, protect and prevail over domestic violence through advocacy, empowerment and social change. Snehitha also looks to enhance the socio-economic status of young, underprivileged women by empowering them with self-confidence and the required skills to enable them to become independent and contribute to family and society. Snehitha facilitating the women in distress to access the service of other institutional agency (legal service authority, police department, CWC, NGO's etc.) to address the issues. Snehitha provides immediate help, shelter, counseling, motivation and legal assistance to the victim of violence. Women and children are availing shelter as well. Snehitha is working on the principle of convergence, which is followed by a close interface and collaboration with the service providers and counselors.
						</p>
						<hr>
						<h6>Contact</h6>
						<div class="row">
							<div class="col-md-6">
								<p>
									<b>Ernakulam</b><br>
									Snehitha Gender Help Desk<br>
									Near Jilla Vyavasaya Complex,<br>
									Kunnumpuram Road,<br>
									Kakkanad P.O. 682030<br>
									Phone No: 04842428745, Toll Free No: <a href="tel:180042555678">180042555678</a><br>
									E-mail : <a href="mailto:snehithaekm@gmail.com">snehithaekm@gmail.com</a><br>
								</p>
							</div>
							<div class="col-md-6">
								<img src="../images/snehitha.jpg" style="width: 45%;margin: auto;display: block;">
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h5>Jagratha</h5>
					</div>
					<div class="card-block">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#home">Add new</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#menu1">All</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active container" id="home" style="padding: 20px;">
								<form class="form-material" id="addfrm" method="post" action="php/services.php">
									<div class="form-group form-default">
										<input type="text" name="sub" class="form-control" required="">
										<span class="form-bar"></span>
										<label class="float-label">Subject</label>
									</div>
									<div class="form-group form-default">
										<textarea class="form-control" name="desc" rows="8" style="height: auto;"required=""></textarea>
										<span class="form-bar"></span>
										<label class="float-label">Description</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">
										<button type="reset" class="btn btn-sm waves-effect waves-light btn-danger" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Reset</button>
										<button type="submit" name="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Add</button>
									</div>
								</form>
							</div>
							<div class="tab-pane container" id="menu1" style="padding: 20px;">
								<div class="table-responsive">
									<?php
									$sql="select * from jagratha where user='$uname' order by status";
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
															<button type="button" onclick="del('<?php echo $row['requestid']?>')" class="btn btn-sm btn-danger" style="margin: auto;display: block;">Delete</button>
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
					emptyTable: "<h5>No requests added</h5>"
				}
			});		
		});   

		function del(reqid) {
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
					url:'php/requestdel.php',
					data: {'reqid':reqid},
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