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
												</tr>
											</thead>
											<tbody>
												<?php
												$today=date('Y-m-d');
												$sql="select * from meeting,reg where meeting.place=reg.username and date<='$today' order by date desc,time";
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
															if($row['attstatus']==0) 
																echo "<i class='fa fa-close' style='color: red;'><span style='display: none;'>0</span></i>";
															else
																echo "<i class='fa fa-check' style='color: green;'><span style='display: none;'>1</span></i>";
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


<?php
require('footer.php');
?>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#meettable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']],
			language: {
				emptyTable: "<h5>No upcoming meeting</h5>"
			}
		});	
		$('#meettable2').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});	

	});   
</script>