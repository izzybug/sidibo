<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php
	if(isset($_POST['edit_user']))
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

	$result = mysqli_query($conn,"update pengguna set namaLengkap='$nama', jenisKelamin='$jenisKelamin', tempatLahir='$tempatLahir', tglLahir='$tglLahir', nomor='$nomor', alamat='$alamat', email='$usr', password='$password', role='$user_role' where id='$get_id'         
		");
	if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'pengguna.php'; </script>";
	} else{
	  die(mysqli_error());
   }
		
}

?>

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
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Edit Pengguna</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Pengguna</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from pengguna where id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Nama Lengkap :</label>
											<input name="nama" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row['namaLengkap']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Jenis Kelamin :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['jenisKelamin']; ?>"><?php echo $row['jenisKelamin']; ?></option>
												<option value="laki-laki">laki-laki</option>
												<option value="perempuan">perempuan</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Tempat Lahir :</label>
											<input name="tmpt" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['tempatLahir']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Tanggal Lahir :</label>
											<input name="tgl" type="text" class="form-control date-picker" required="true" autocomplete="off" value="<?php echo $row['tglLahir']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Nomor Whatsapp :</label>
											<input name="nomor" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['nomor']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Alamat :</label>
											<input name="alamat" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['alamat']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Username :</label>
											<input name="username" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['email']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off" value="<?php echo $row['password']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
												<option value="admin">Admin</option>
												<option value="user">User</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="edit_user" id="edit_user" data-toggle="modal">Update&nbsp;Pengguna</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>