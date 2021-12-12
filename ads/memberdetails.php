<?php
$page="Members";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('md').setAttribute('class','active');
</script>
<style type="text/css">
	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
		margin: auto;
		display: block;
		width: 25%;
		max-width: 700px;
	}

	/* Caption of Modal Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	/* Add Animation */
	.modal-content, #caption {  
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}
</style>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-header">
								<h5>President</h5>
							</div>
							<?php 
							$sql="select * from login,reg where login.username=reg.username and type='p' and status=1";
							$res=$ob->db_read($sql);
							$row=mysqli_fetch_array($res);
							?>
							<img class="card-img-top" src="../profilepics/<?php echo $row['pic']."?time=".date("H:i:s")?>" style="height: 210px;" alt="Card image cap">
							<div class="card-block">
								<form method="post" action="php/memberdetails.php">
									<div class="form-group form-default">
										<select name="pre" class="form-control fill" onblur="return false">
											<?php 
											$sql="select * from login,reg where login.username=reg.username and type in('m','p') and status=1";
											$res=$ob->db_read($sql);
											while($row=mysqli_fetch_array($res)) {
												echo "<option value='".$row['username']."'";
												if($row['type']=='p')
													echo "selected disabled";
												echo ">".$row['name']."</option>";
											}
											?>
										</select>
									</div>
									<div class="bottom">
										<button type="submit" name="updatepre" class="btn btn-sm waves-effect waves-light btn-success" style="display:  block;margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-header">
								<h5>Secretary</h5>
							</div>
							<?php 
							$sql="select * from login,reg where login.username=reg.username and type='s' and status=1";
							$res=$ob->db_read($sql);
							$row=mysqli_fetch_array($res);
							?>
							<img class="card-img-top" src="../profilepics/<?php echo $row['pic']."?time=".date("H:i:s")?>" style="height: 210px;" alt="Card image cap">
							<div class="card-block">
								<form method="post" action="php/memberdetails.php">
									<div class="form-group form-default">
										<select name="sec" class="form-control fill" onblur="return false">
											<?php 
											$sql="select * from login,reg where login.username=reg.username and type in('m','s') and status=1";
											$res=$ob->db_read($sql);
											while($row=mysqli_fetch_array($res)) {
												echo "<option value='".$row['username']."'";
												if($row['type']=='s')
													echo "selected disabled";
												echo ">".$row['name']."</option>";
											}
											?>
										</select>
									</div>
									<div class="bottom">
										<button type="submit" name="updatesec" class="btn btn-sm waves-effect waves-light btn-success" style="display:  block;margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
						<h5>Member Details</h5>
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
							<table class="table" id="memtable">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Date of Birth</th>
										<th>House name</th>
										<th>Street</th>
										<th>City</th>
										<th>Photo</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql="select * from reg,login where login.username=reg.username and status=1 and type!='a' order by type desc";
									$res=$ob->db_read($sql);
									$n=1;
									while($row=mysqli_fetch_array($res)) {
										?>
										<tr>
											<td><?php echo $n++?></td>
											<td><?php echo $row['name'];if($n==2) echo "(Secretary)";if($n==3) echo "(President)";?></td>
											<td><?php echo $row['username']?></td>
											<td><?php echo $row['contact']?></td>
											<td style="min-width: 80px;"><?php echo date_format(date_create($row['dob']),'d-m-Y')?></td>
											<td><?php echo $row['house']?></td>
											<td><?php echo $row['street']?></td>
											<td><?php echo $row['city']?></td>
											<td><a href="javascript:;" onclick="imgdis('<?php echo $row['pic']."','".$row['name']?>')" data-toggle="modal" data-target="#myModal">View</a></td>
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
<div id="myModal" class="modal">
	<span class="close" data-dismiss="modal">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
</div>
<?php
require('footer.php');
?>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#memtable').DataTable({
			pageLength : 5,
			lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
		});		
	});   
	function imgdis(path,name) {
		document.getElementById("myModal").style.display = "block";
		document.getElementById("img01").src = '../profilepics/'+path;
		document.getElementById("caption").innerHTML = name;
	}
</script>