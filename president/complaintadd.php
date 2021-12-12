<?php
$page="Complaints";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('comp').setAttribute('class','pcoded-hasmenu active pcoded-trigger');
	document.getElementById('comp1').setAttribute('class','active');
</script>
<!-- Page-header end -->
<div class="pcoded-inner-content">
	<!-- Main-body start -->
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="card">
							<div class="card-header">
								<h5>Add Complaint</h5>
							</div>
							<div class="card-block">
								<form class="form-material" id="addfrm" method="post" action="php/complaintadd.php">
									<div class="form-group form-default">
										<input type="text" name="sub" class="form-control" >
										<span class="form-bar"></span>
										<label class="float-label">Subject</label>
									</div>
									<div class="form-group form-default">
										<textarea class="form-control" name="desc" rows="8" style="height: auto;"></textarea>
										<span class="form-bar"></span>
										<label class="float-label">Complaint Description</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">
										<button type="reset" class="btn btn-sm waves-effect waves-light btn-danger" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Reset</button>
										<button type="submit" name="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Add</button>
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
