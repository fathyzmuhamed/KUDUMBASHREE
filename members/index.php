<?php
$page="Dashboad";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('db').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<!-- Page-body start -->
			<div class="page-body">
				<div class="row">
					<!-- Material statustic card start -->
					<div class="col-xl-8 col-md-12">
						<div class="card mat-stat-card">
							<div class="card-block">
								<div class="row align-items-center b-b-default">
									<div class="col-sm-6 b-r-default p-b-20 p-t-20">
										<div class="row align-items-center text-center">
											<div class="col-4 p-r-0">
												<i class="far fa-user text-c-purple f-24"></i>
											</div>
											<div class="col-8 p-l-0">
												<?php
												$sel="select * from reg,login where login.username=reg.username and  status=1 and type!='a'";
												$res=$ob->db_read($sel);
												?>
												<h5><?php echo mysqli_num_rows($res);?></h5>
												<p class="text-muted m-b-0">Members</p>
											</div>
										</div>
									</div>
									<div class="col-sm-6 p-b-20 p-t-20">
										<div class="row align-items-center text-center">
											<div class="col-4 p-r-0">
												<i class="fas fa-inr text-c-green f-24"></i>
											</div>
											<div class="col-8 p-l-0">
												<?php
												$sql="select sum(amount) as sum from thrift where tstatus=1";
												$res=$ob->db_read($sql);
												$row=mysqli_fetch_assoc($res);
												?>
												<h5><?php echo $row['sum']?></h5>
												<p class="text-muted m-b-0">Total Thrift</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row align-items-center">
									<div class="col-sm-6 p-b-20 p-t-20 b-r-default">
										<div class="row align-items-center text-center">
											<div class="col-4 p-r-0">
												<i class="fas fa-inr text-c-red f-24"></i>
											</div>
											<div class="col-8 p-l-0">
												<?php
												$sql="select sum(amount) as sum from monthly where mstatus=1";
												$res=$ob->db_read($sql);
												$row=mysqli_fetch_assoc($res);
												?>
												<h5><?php echo $row['sum']?></h5>
												<p class="text-muted m-b-0">Total Monthly Collections</p>
											</div>
										</div>
									</div>
									<div class="col-sm-6 p-b-20 p-t-20">
										<div class="row align-items-center text-center">
											<div class="col-4 p-r-0">
												<i class="fas fa-inr text-c-blue f-24"></i>
											</div>
											<div class="col-8 p-l-0">
												<?php
												$sql="select sum(totalamount) as sum1,sum(paidamount) as sum2 from loan where lstatus=2";
												$res=$ob->db_read($sql);
												$row=mysqli_fetch_assoc($res);
												?>
												<h5><?php echo $row['sum2']-$row['sum1'];?></h5>
												<p class="text-muted m-b-0">Total Loan Intereset Collected</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-12">
						<div class="card mat-clr-stat-card text-white green ">
							<div class="card-block">
								<div class="row">
									<div class="col-3 text-center bg-c-green">
										<i class="fas fa-calendar mat-icon f-24"></i>
									</div>
									<div class="col-9 cst-cont">
										<h5><?php echo date('d M Y')?></h5>
										<p class="m-b-0"><?php echo date('l')?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="card mat-clr-stat-card text-white blue">
							<div class="card-block">
								<div class="row">
									<div class="col-3 text-center bg-c-blue">
										<i class="fas fa-calendar-check-o mat-icon f-24"></i>
									</div>
									<div class="col-9 cst-cont">
										<?php
										$sel="select min(date) as date from meeting where date>='$today'";
										$res=$ob->db_read($sel);
										if(mysqli_num_rows($res)==0) {
											?>
											<h5>Not scheduled</h5>
											<?php
										}
										else {
											$row=mysqli_fetch_array($res);
											?>
											<h5><?php echo $row['date']?></h5>
											<?php
										}
										?>
										<p class="m-b-0">Next Meeting</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Material statustic card end -->


				</div>

				<div class="row">
					<?php
					$sel="select * from variables";
					$res=$ob->db_read($sel);
					$row=mysqli_fetch_assoc($res);
					?>
					<div class="col-md-3">
						<div class="card text-center order-visitor-card">
							<div class="card-block">
								<h6 class="m-b-0">Thrift</h6>
								<h4 class="m-t-15 m-b-15"><i class="fa fa-inr m-r-15 text-c-green"></i><?php echo $row['thrift']?></h4>
								<p class="m-b-0">&nbsp;</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card text-center order-visitor-card">
							<div class="card-block">
								<h6 class="m-b-0">Monthly Collection</h6>
								<h4 class="m-t-15 m-b-15"><i class="fa fa-inr m-r-15 text-c-green"></i><?php echo $row['monthly']?></h4>
								<p class="m-b-0">&nbsp;</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card text-center order-visitor-card">
							<div class="card-block">
								<h6 class="m-b-0">Fine</h6>
								<h4 class="m-t-15 m-b-15"><i class="fa fa-inr m-r-15 text-c-green"></i><?php echo $row['attfine']?></h4>
								<p class="m-b-0">&nbsp;</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card text-center order-visitor-card">
							<div class="card-block">
								<h6 class="m-b-0">Current Bank Balance</h6>
								<h4 class="m-t-15 m-b-15"><i class="fa fa-inr m-r-15 text-c-green"></i><?php echo $row['bankbal']?></h4>
								<p class="m-b-0">&nbsp;</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Page-body end -->
		</div>
		<div id="styleSelector"> </div>
	</div>
</div>
<?php
require('footer.php');
?>