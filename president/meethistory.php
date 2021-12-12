<?php
$page="Meeting";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('meet').setAttribute('class','active');
</script>

<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-header">
						<h5>Meeting History</h5>
					</div>
					<div class="card-block">
						<div class="card-block table-border-style">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#home">Upcoming</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1">Completed</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active container" id="home" style="padding: 20px;">
									<div class="table-responsive">
										<table class="table table-hover" id="meettable">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>Time</th>
													<th>Place(House of)</th>
													<th>Details</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$today=date('Y-m-d');
												$sql="select * from meeting,reg where meeting.place=reg.username and date>'$today' order by date,time";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo date('h:i A',strtotime($row['time']))?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo $row['details']?></td>
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
										<table class="table table-hover" id="meettable2">
											<thead>
												<tr>
													<th>#</th>
													<th  style="min-width: 50px;">Date</th>
													<th>Time</th>
													<th>Place(House of)</th>
													<th>Details</th>
													<th>Attendance</th>
													<th>Thrift</th>
													<th>Minutes</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$today=date('Y-m-d');
												$sql="select * from meeting,reg where meeting.place=reg.username and date<='$today' order by attstatus,date desc,time";
												$res=$ob->db_read($sql);
												$n=1;
												while($row=mysqli_fetch_array($res)) {
													?>
													<tr>
														<td><?php echo $n++?></td>
														<td><?php echo date_format(date_create($row['date']),'d-m-Y');?></td>
														<td><?php echo date('h:i A',strtotime($row['time']))?></td>
														<td><?php echo $row['name']?></td>
														<td><?php echo $row['details']?></td>
														<td style="text-align: center;">
															<?php
															if($row['attstatus']==0) {
																echo "-";
															}
															else {
																?>
																<button type="button" onclick="att(<?php echo $row['meetid']?>)" class="btn btn-sm btn-secondary" style="margin: auto;display: block;">View</button>
																<?php
															}	
															?>													
														</td>
														<td style="text-align: center;">
															<?php
															if($row['thriftstatus']==0) {
																echo "-";
															}
															else {
																?>
																<button type="button" onclick="thrift(<?php echo $row['meetid']?>)" class="btn btn-sm btn-secondary" style="margin: auto;display: block;">View</button>
																<?php
															}
															?>
														</td>
														<td style="text-align: center;">
															<?php
															if($row['minutes']=='') {
																echo "-";
															}
															else {
																?>
																<button type="button" onclick="window.open('<?php echo '../minutes/'.$row['minutes']?>');" class="btn btn-sm btn-secondary" style="margin: auto;display: block;">View</button>
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
	</div>
</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Attendance</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="attfrm" method="post" action="php/addatt.php">
				<!-- Modal body -->
				<div class="modal-body">
					<?php 
					$sql="select * from login,reg where login.username=reg.username and type!='a' and status=1";
					$res=$ob->db_read($sql);
					$n=1;
					while($row=mysqli_fetch_array($res)) {
						?>
						<div class="row" style="margin: 10px;">
							<div class="col-md-6">
								<h6><?php echo $row['name']?></h6>
							</div>
							<div class="col-md-3">
								<input type="radio" name="<?php echo 'r'.$n;?>" value="<?php echo $row['username'].'1'?>" class="form-check-input" required="">Present
							</div>
							<div class="col-md-3">
								<input type="radio" name="<?php echo 'r'.$n;?>" value="<?php echo $row['username'].'0'?>" class="form-check-input" required="">Not Present
							</div>
						</div>
						<?php
						$n++;
					}
					?>
					<input type="hidden" name="meetid">
					<input type="hidden" name="num" value="<?php echo mysqli_num_rows($res)?>">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" name="adda" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Thrift</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="thriftfrm" method="post" action="php/addatt.php">
				<!-- Modal body -->
				<div class="modal-body">
					<?php 
					$sql="select * from login,reg where login.username=reg.username and type!='a' and status=1";
					$res=$ob->db_read($sql);
					$n=1;
					while($row=mysqli_fetch_array($res)) {
						?>
						<div class="row" style="margin: 10px;">
							<div class="col-md-6">
								<h6><?php echo $row['name']?></h6>
							</div>
							<div class="col-md-3">
								<input type="radio" name="<?php echo 'r'.$n;?>" value="<?php echo $row['username'].'1'?>" class="form-check-input" required="">Paid
							</div>
							<div class="col-md-3">
								<input type="radio" name="<?php echo 'r'.$n;?>" value="<?php echo $row['username'].'0'?>" class="form-check-input" required="">Not Paid
							</div>
						</div>
						<?php
						$n++;
					}
					?>
					<input type="hidden" name="meetid">
					<input type="hidden" name="num" value="<?php echo mysqli_num_rows($res)?>">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" name="addt" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal2">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Minutes</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<form class="form-material" name="minutesfrm" method="post" action="php/addatt.php">
				<!-- Modal body -->
				<div class="modal-body">
					<div class="form-group form-default">
						<textarea name="minutes" class="form-control" rows="5" style="height: auto;"></textarea>
						<span class="form-bar"></span>
						<label class="float-label">Minutes</label>
					</div>
					<input type="hidden" name="meetid">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" name="addm" class="btn btn-sm btn-success"><i class="icofont icofont-check-circled"></i>Add</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModala">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Attendance</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div id="attdiv">

				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div><!-- The Modal -->
<div class="modal fade" id="myModalb">
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
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#meettable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	
		$('#meettable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	

	});   
	function att(id) {
		$.ajax({
			type: 'post',
			url:'php/viewmeet.php',
			data: {'meetid':id},
			success: function(ret){
				document.getElementById('attdiv').innerHTML=ret;
				$("#myModala").modal();
			}
		});
	}
	function thrift(id) {
		$.ajax({
			type: 'post',
			url:'php/viewmeet.php',
			data: {'meetid2':id},
			success: function(ret){
				document.getElementById('thriftdiv').innerHTML=ret;
				$("#myModalb").modal();
			}
		});
	}
</script>