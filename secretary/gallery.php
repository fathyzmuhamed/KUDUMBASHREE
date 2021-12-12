<?php
$page="Gallery";
require('header.php');

?>
<script type="text/javascript">
	document.getElementById('glry').setAttribute('class','active');
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
								<h5>Upload Photo</h5>
							</div>
							<div class="card-block">
								<form class="form-material" name="newfrm" id="newfrm" method="post" action="php/gallery.php" enctype="multipart/form-data">
									<div class="form-group form-default">
										<input type="text" name="title" class="form-control" required="">
										<span class="form-bar"></span>
										<label class="float-label">Title</label>
									</div>
									<div class="form-group form-default form-static-label">
										<input type="file" name="pic" class="form-control" required="" accept="image/jpg, image/jpeg, image/png">
										<span class="form-bar"></span>
										<label class="float-label">Photo</label>
									</div>
									<div class="form-group form-default" style="text-align: center;">					
										<button type="submit" name="add" id="add" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Add</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					$sel="select * from gallery";
					$res=$ob->db_read($sel);					
					while($data=mysqli_fetch_array($res)){
						?>
						<div class="col-md-4">
							<div class="card">
								<img class="card-img-top" src="<?php echo '../gallery/'.$data['pic'] ;?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $data['title'];?></h5>
									<button type="button" class="btn btn-sm btn-danger" onclick="del(<?php echo $data['gid'];?>)">Delete</button>
								</div>
							</div>
						</div>
						<?php
					}
					?>
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
	function del(id) {
		Swal.fire({
			text: "Delete Photo ?",
			icon: 'question',
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
					url:'php/gallerydel.php',
					data: {'del':'set','id':id},
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