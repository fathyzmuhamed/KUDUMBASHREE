<?php
$page="Transactions";
require('header.php');
$apikey="rzp_test_rWSgaJR2BxzRC3";
$sql="select * from variables";
$res=$ob->db_write($sql);
$row=mysqli_fetch_assoc($res);
?>
<script type="text/javascript">
	document.getElementById('atrn').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('atrn0').setAttribute('class','active');
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
								<h5>Thrift</h5>
							</div>
							<div class="card-block">
								<form class="form-material" name="newfrm" id="newfrm" method="post" action="php/updatecol.php">
									<div class="form-group form-default form-static-label">
										<input type="number" name="thrift" class="form-control" value="<?php echo $row['thrift']?>" min="20">
										<span class="form-bar"></span>
										<label class="float-label">Thrift</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">			
										<button type="submit" name="addt" id="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5>Monthly Collection</h5>
							</div>
							<div class="card-block">
								<form class="form-material" name="newfrm" id="newfrm" method="post" action="php/updatecol.php">
									<div class="form-group form-default form-static-label">
										<input type="number" name="monthly" class="form-control" value="<?php echo $row['monthly']?>" min="5">
										<span class="form-bar"></span>
										<label class="float-label">Monthly</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">			
										<button type="submit" name="addm" id="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5>Absent Fine</h5>
							</div>
							<div class="card-block">
								<form class="form-material" name="newfrm" id="newfrm" method="post" action="php/updatecol.php">
									<div class="form-group form-default form-static-label">
										<input type="number" name="afine" class="form-control" value="<?php echo $row['attfine']?>" min="5">
										<span class="form-bar"></span>
										<label class="float-label">Fine</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">			
										<button type="submit" name="addaf" id="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5>Current Bank Balance</h5>
							</div>
							<div class="card-block">
								<form class="form-material" name="newfrm" id="newfrm" method="post" action="php/updatecol.php">
									<div class="form-group form-default form-static-label">
										<input type="number" name="bankbal" class="form-control" value="<?php echo $row['bankbal']?>" min="0">
										<span class="form-bar"></span>
										<label class="float-label">Bank Balance</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">			
										<button type="submit" name="addb" id="addb" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
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
