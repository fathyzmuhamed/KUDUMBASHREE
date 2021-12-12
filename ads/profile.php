<?php
$page="Profile";
require('header.php');
?>
<script type="text/javascript">
	document.getElementById('pro').setAttribute('class','active');
</script>
<style type="text/css">
	.card .card-heading {
		padding: 0 20px;
		margin: 0;
	}

	.card .card-heading.simple {
		font-size: 20px;
		font-weight: 300;
		color: #777;
		border-bottom: 1px solid #e5e5e5;
	}

	.card .card-heading.image img {
		display: inline-block;
		width: 46px;
		height: 46px;
		margin-right: 15px;
		vertical-align: top;
		border: 0;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
	}

	.card .card-heading.image .card-heading-header {
		display: inline-block;
		vertical-align: top;
	}

	.card .card-heading.image .card-heading-header h3 {
		margin: 0;
		font-size: 14px;
		line-height: 16px;
		color: #262626;
	}

	.card .card-heading.image .card-heading-header span {
		font-size: 12px;
		color: #999999;
	}

	.card .card-body {
		padding: 0 20px;
		margin-top: 20px;
	}

	.card .card-media {
		padding: 0 20px;
		margin: 0 -14px;
	}

	.card .card-media img {
		max-width: 100%;
		max-height: 100%;
	}

	.card .card-actions {
		min-height: 30px;
		padding: 0 20px 20px 20px;
		margin: 20px 0 0 0;
	}

	.card .card-comments {
		padding: 20px;
		margin: 0;
		background-color: #f8f8f8;
	}

	.card .card-comments .comments-collapse-toggle {
		padding: 0;
		margin: 0 20px 12px 20px;
	}

	.card .card-comments .comments-collapse-toggle a,
	.card .card-comments .comments-collapse-toggle span {
		padding-right: 5px;
		overflow: hidden;
		font-size: 12px;
		color: #999;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.card-comments .media-heading {
		font-size: 13px;
		font-weight: bold;
	}

	.card.people {
		position: relative;
		display: inline-block;
		width: 170px;
		height: 300px;
		padding-top: 0;
		margin-left: 20px;
		overflow: hidden;
		vertical-align: top;
	}

	.card.people:first-child {
		margin-left: 0;
	}

	.card.people .card-top {
		position: absolute;
		top: 0;
		left: 0;
		display: inline-block;
		width: 170px;
		height: 150px;
		background-color: #ffffff;
	}

	.card.people .card-top.green {
		background-color: #53a93f;
	}

	.card.people .card-top.blue {
		background-color: #427fed;
	}

	.card.people .card-info {
		position: absolute;
		top: 150px;
		display: inline-block;
		width: 100%;
		height: 101px;
		overflow: hidden;
		background: #ffffff;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	.card.people .card-info .title {
		display: block;
		margin: 8px 14px 0 14px;
		overflow: hidden;
		font-size: 16px;
		font-weight: bold;
		line-height: 18px;
		color: #404040;
	}

	.card.people .card-info .desc {
		display: block;
		margin: 8px 14px 0 14px;
		overflow: hidden;
		font-size: 12px;
		line-height: 16px;
		color: #737373;
		text-overflow: ellipsis;
	}

	.card.people .card-bottom {
		position: absolute;
		bottom: 0;
		left: 0;
		display: inline-block;
		width: 100%;
		padding: 10px 20px;
		line-height: 29px;
		text-align: center;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	.card.hovercard {
		position: relative;
		padding-top: 0;
		overflow: hidden;
		text-align: center;
		background-color: rgba(214, 224, 226, 0.2);
	}

	.card.hovercard .cardheader {
		background: url("http://lorempixel.com/850/280/nature/4/");
		background-size: cover;
		height: 100px;
	}

	.card.hovercard .avatar {
		position: relative;
		top: -50px;
		margin-bottom: -50px;
	}

	.card.hovercard .avatar img {
		width: 100px;
		height: 100px;
		max-width: 100px;
		max-height: 100px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		border: 5px solid rgba(255,255,255,0.5);
	}

	.card.hovercard .info {
		padding: 4px 8px 10px;
	}

	.card.hovercard .info .title {
		margin-bottom: 4px;
		font-size: 24px;
		line-height: 1;
		color: #262626;
		vertical-align: middle;
	}

	.card.hovercard .info .desc {
		overflow: hidden;
		font-size: 12px;
		line-height: 20px;
		color: #737373;
		text-overflow: ellipsis;
	}

	.card.hovercard .bottom {
		padding: 0 20px;
		margin-bottom: 17px;
	}


</style>
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
								<h5>Edit Profile</h5>
								<!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
							</div>
							<div class="card-block">
								<form class="form-material" id="profrm" method="post" action="php/profile.php">
									<div class="form-group form-default">
										<input type="text" class="form-control fill" value="<?php echo $data['username'] ?>" disabled>
										<span class="form-bar"></span>
										<label class="float-label">Email</label>
									</div>
									<div class="form-group form-default">
										<input type="text" class="form-control fill" value="<?php echo $data['name'] ?>" disabled>
										<span class="form-bar"></span>
										<label class="float-label">Name</label>
									</div>
									<div class="form-group form-default">
										<input type="text" name="ph" class="form-control fill" value="<?php echo $data['contact'] ?>" pattern="^[6-9][0-9]{9}$" maxlength="10">
										<span class="form-bar"></span>
										<label class="float-label">Contact Number</label>
									</div>
									<div class="form-group form-default">
										<input type="date" class="form-control fill"  value="<?php echo $data['dob'] ?>" disabled>
										<span class="form-bar"></span>
										<label class="float-label">Date of Birth</label>
									</div>
									<div class="form-group form-default">
										<input type="text" name="house" class="form-control fill" value="<?php echo $data['house'] ?>">
										<span class="form-bar"></span>
										<label class="float-label">House Name</label>
									</div>
									<div class="form-group form-default">
										<input type="text" name="street" class="form-control fill" value="<?php echo $data['street'] ?>">
										<span class="form-bar"></span>
										<label class="float-label">Street</label>
									</div>
									<div class="form-group form-default">
										<input type="text" name="city" class="form-control fill" value="<?php echo $data['city'] ?>">
										<span class="form-bar"></span>
										<label class="float-label">City</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">
										<button type="reset" class="btn btn-sm waves-effect waves-light btn-danger" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Reset</button>
										<button type="submit" name="updatepro" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5>Change Profile Photo</h5>
							</div>
							<div class="container">

								<div class="card hovercard">
									<div class="cardheader">

									</div>

									<div class="avatar">
										<img alt="" src="../profilepics/<?php echo $data['pic']."?time=".date("H:i:s")?>">
									</div>
									<form method="post" action="php/profile.php" enctype="multipart/form-data">
										<div class="info">
											<div class="form-group form-default">
												<input type="file" name="pro" class="form-control" required="" accept="image/jpg, image/jpeg, image/png">
												<input type="hidden" name="pic" value="<?php echo $data['pic']?>" >
											</div>
										</div>
										<div class="bottom">
											<button type="submit" name="updatepic" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
										</div>
									</form>
								</div>

							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h5>Change Password</h5>
							</div>
							<div class="card-block">
								<form class="form-material" id="profrm" method="post" action="php/profile.php">
									<div class="form-group form-default">
										<input type="password" name="pass" class="form-control" required="">
										<span class="form-bar"></span>
										<label class="float-label">Current Password</label>
									</div>
									<div class="form-group form-default">
										<input type="password" name="npass" class="form-control" minlength="8"  required="">
										<span class="form-bar"></span>
										<label class="float-label">New Password</label>
									</div>
									<div class="form-group form-default">
										<input type="password" name="cpass" class="form-control" minlength="8" required=""  onchange="if(this.value!=document.passfrm.npass.value)this.setCustomValidity('Password mismatch!');else setCustomValidity('')">
										<span class="form-bar"></span>
										<label class="float-label">Confirm Password</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">					
										<button type="submit" name="updatepass" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
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