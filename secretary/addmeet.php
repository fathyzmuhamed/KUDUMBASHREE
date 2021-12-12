<?php
$page="Meeting";
date_default_timezone_set("Asia/Calcutta"); 
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('meet').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('meet1').setAttribute('class','active');
</script>

<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5>Shedule Meeting</h5>
								<!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
							</div>
							<div class="card-block">
								<form class="form-material" method="post" action="php/addmeet.php">
									<div class="form-group form-default form-static-label">
										<input type="date" name="date" id="date" class="form-control fill"  onkeydown="{return false}" min='<?php echo date('Y-m-d')?>' onchange="set();" required="">
										<span class="form-bar"></span>
										<label class="float-label">Date</label>
									</div>
									<div class="form-group form-default form-static-label">
										<input type="time" name="time" id="time" class="form-control fill"  onkeydown="{return false}" onblur="return false" required="">
										<span class="form-bar"></span>
										<label class="float-label">Time</label>
									</div>
									<div class="form-group form-default">
										<select name="place" class="form-control"  required="">
											<option disabled selected></option>
											<?php 
											$sql="select * from login,reg where login.username=reg.username and type!='a' and status=1";
											$res=$ob->db_read($sql);
											while($row=mysqli_fetch_array($res)) {
												echo "<option value=".$row['username'].">".$row['name']."</option>";
											}
											?>
										</select>
										<span class="form-bar"></span>
										<label class="float-label">Place(House of)</label>
									</div>
									<div class="form-group form-default">
										<textarea name="details" class="form-control" rows="5" style="height: auto;" required=""></textarea>
										<span class="form-bar"></span>
										<label class="float-label">Meeting Details</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">
										<button type="reset" class="btn btn-sm waves-effect waves-light btn-danger" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Reset</button>
										<button type="submit" name="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Add</button>
									</div>
								</form>
							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h5>Next Meeting</h5>
								<!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
							</div>
							<div class="card-block">
								<div class="card-block table-border-style">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th style="min-width: 100px;">Date</th>
													<th style="min-width: 90px;">Time</th>
													<th>Place<br>(House of)</th>
													<th>Details</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$today=date('Y-m-d');
												$sql="select * from meeting,reg where meeting.place=reg.username and date>'$today' order by date desc,time";
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
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h5>Previous 10 Meeting History</h5>
								<!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
							</div>
							<div class="card-block">
								<div class="card-block table-border-style">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th style="min-width: 100px;">Date</th>
													<th style="min-width: 90px;">Time</th>
													<th>Place<br>(House of)</th>
													<th>Details</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$today=date('Y-m-d');
												$sql="select * from meeting,reg where meeting.place=reg.username and date<'$today' order by date desc,time desc limit 10";
												$res=$ob->db_read($sql);
												$n=1;
												if(mysqli_num_rows($res)!=0) {
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
												}
												else {
													echo "No upcoming meeting";
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
<!----Calender -------->
<link rel="stylesheet" href="../css/clndr.css" type="text/css" />
<script src="../js/underscore-min.js" type="text/javascript"></script>
<script src= "../js/moment-2.2.1.js" type="text/javascript"></script>
<script src="../js/clndr.js" type="text/javascript"></script>
<script src="../js/site.js" type="text/javascript"></script>
<!----End Calender -------->
<script type="text/javascript">
	
	$(document).ready(function(){
		// $('#meettable').DataTable({
		// 	pageLength : 5,
		// 	lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		// });		
	}); 

	function set() {
		var dt = new Date();
		var d='';
		dt.setHours( dt.getHours() + 2 );
		if(document.getElementById('date').value=='<?php echo date('Y-m-d')?>') {
			if(dt.getHours()<10)
				d='0'.concat(dt.getHours());
			else
				d=d.concat(dt.getHours());
			d=d.concat(':');
			if(dt.getMinutes()<10)
				d='0'.concat(dt.getMinutes());
			else
				d=d.concat(dt.getMinutes());
			document.getElementById('time').setAttribute('min',d);
		}
		else {
			document.getElementById('time').setAttribute('min','');
		}

	}  
</script> 