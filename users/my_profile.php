<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if(isset($_POST['new_update']))
{
	$nama = $_POST['nama'];
    $jenisKelamin = $_POST['gender'];
    $tempatLahir = $_POST['tmpt'];
    $tglLahir = $_POST['tgl'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $usr = $_POST['username'];
    $password = $_POST['password'];
    $user_role = $_POST['user_role'];

	$result = mysqli_query($conn,"update pengguna set namaLengkap='$nama', jenisKelamin='$jenisKelamin', tempatLahir='$tempatLahir', tglLahir='$tglLahir', nomor='$nomor', alamat='$alamat', email='$usr', password='$password', role='$user_role' where id='$session_id'         
		");
	if ($result) {
		echo "<script>alert('Your records Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'my_profile.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}
		

if (isset($_POST["update_image"])) {

	$image = $_FILES['image']['name'];

	if(!empty($image)){
		move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$image);
		$location = $image;	
	}
	else {
		echo "<script>alert('Please Select Picture to Update');</script>";
	}

    $result = mysqli_query($conn,"update pengguna set location='$location' where id='$session_id'         
		")or die(mysqli_error());
    if ($result) {
     	echo "<script>alert('Profile Picture Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'my_profile.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}

?>
<style>
	.avatar-photo {
    width: 150px; /* Sesuaikan lebar gambar dengan kebutuhan Anda */
    height: 150px; /* Sesuaikan tinggi gambar dengan kebutuhan Anda */
    border-radius: 50%; /* Mengatur sudut gambar menjadi setengah lingkaran */
    object-fit: cover; /* Untuk memastikan gambar tetap berada di dalam lingkaran tanpa terdistorsi */
}

</style>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<!-- <div class="loader-logo"><img src="../vendors/images/siparti-dark.png" alt=""></div> -->
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">

							<?php $query= mysqli_query($conn,"select * from pengguna where id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
							?>

							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" class="avatar-photo">
								<form method="post" enctype="multipart/form-data">
									<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="weight-500 col-md-12 pd-5">
													<div class="form-group">
														<div class="custom-file">
															<input name="image" id="file" type="file" class="custom-file-input" accept="image/*" onchange="validateImage('file')">
															<label class="custom-file-label" for="file" id="selector">Choose file</label>		
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" name="update_image" value="Update" class="btn btn-primary">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<h5 class="text-center h5 mb-0"><?php echo $row['namaLengkap']; ?></h5>
							<p class="text-center text-muted font-14"><?php echo $row['email']; ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $row['email']; ?>
									</li>
									<li>
										<span>Nomor Whatsapp:</span>
										<?php echo $row['nomor']; ?>
									</li>
									<li>
										<span>My Role:</span>
										<? $roles = $row['role']; ?>
										<?php if($roles = 'admin'): ?>
										 <?php echo "Administrator"; ?>
										<?php endif ?>
									</li>
									<li>
										<span>Alamat:</span>
										<?php echo $row['alamat']; ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" >Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Setting Tab start -->
										<div class="height-100-p" id="setting" >
											<div class="profile-setting">
												<form method="POST" enctype="multipart/form-data">
													<div class="profile-edit-list row">
														<div class="col-md-12"><h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4></div>

														<?php
														$query = mysqli_query($conn,"select * from pengguna where id = '$session_id' ")or die(mysqli_error());
														$row = mysqli_fetch_array($query);
														?>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input name="nama" class="form-control form-control-lg" type="text" required="true" autocomplete="off" value="<?php echo $row['namaLengkap']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Jenis Kelamin :</label>
																<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
																	<option value="<?php echo $row['jenisKelamin']; ?>"><?php echo $row['jenisKelamin']; ?></option>
																	<option value="laki-laki">laki-laki</option>
																	<option value="perempuan">perempuan</option>
																</select>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label >Tempat Lahir :</label>
																<input name="tmpt" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['tempatLahir']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label >Tanggal Lahir :</label>
																<input name="tgl" type="text" class="form-control date-picker" required="true" autocomplete="off" value="<?php echo $row['tglLahir']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Nomor Whatsapp :</label>
																<input name="nomor" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['nomor']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Alamat :</label>
																<input name="alamat" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['alamat']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Username :</label>
																<input name="username" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['email']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Password :</label>
																<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off" value="<?php echo $row['password']; ?>">
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>User Role :</label>
																<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
																	<option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
																	<option value="admin">Admin</option>
																	<option value="user">User</option>
																</select>
															</div>
														</div>
														<div class="weight-500 col-md-12">
															<div class="form-group">
																<label></label>
																<div class="modal-footer justify-content-center">
																	<button class="btn btn-primary" name="new_update" id="new_update" data-toggle="modal">Save & &nbsp;Update</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>

	<script type="text/javascript">
		var loader = function(e) {
			let file = e.target.files;

			let show = "<span>Selected file : </span>" + file[0].name;
			let output = document.getElementById("selector");
			output.innerHTML = show;
			output.classList.add("active");
		};

		let fileInput = document.getElementById("file");
		fileInput.addEventListener("change", loader);
	</script>
	<script type="text/javascript">
		 function validateImage(id) {
		    var formData = new FormData();
		    var file = document.getElementById(id).files[0];
		    formData.append("Filedata", file);
		    var t = file.type.split('/').pop().toLowerCase();
		    if (t != "jpeg" && t != "jpg" && t != "png") {
		        alert('Please select a valid image file');
		        document.getElementById(id).value = '';
		        return false;
		    }
		    if (file.size > 1050000) {
		        alert('Max Upload size is 1MB only');
		        document.getElementById(id).value = '';
		        return false;
		    }

		    return true;
		}
	</script>
</body>
</html>