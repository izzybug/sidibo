<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if(isset($_POST['apply']))
{
	$nama=$_POST['nama'];
	$jenisKelamin=$_POST['gender'];
	$umur=$_POST['umur'];
	$tinggi=$_POST['tinggi'];
	$berat=$_POST['berat'];
	$pendThr=$_POST['pendThr'];
	$pekerjaan=$_POST['pekerjaan'];
	$alamat=$_POST['alamat'];
	$id_user=$session_id;

	// Insert ke tabel informasiData
	$query_insert = mysqli_query($conn, "INSERT INTO informasiData (nama, jenisKelamin, umur, tinggiBadan, beratBadan, pendTerakhir, pekerjaan, alamat, id_user)
				VALUES ('$nama', '$jenisKelamin', '$umur', '$tinggi', '$berat', '$pendThr', '$pekerjaan', '$alamat', '$id_user')
			") or die(mysqli_error($conn));

	// Update kolom status di tabel pengguna
	if ($query_insert) {
		$query_update = mysqli_query($conn, "UPDATE pengguna SET status = 1 WHERE id = '$id_user'") or die(mysqli_error($conn));

		if ($query_update) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		} else {
			echo "<script>alert('Failed to Update Status');</script>";
		}
	} else {
		echo "<script>alert('Failed to Add Data');</script>";
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
		<div class="pb-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>SIDIBO</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Kuisioner Deteksi Dini</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Kuisioner Deteksi Dini</h4></h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from tblemployees where emp_id = '$get_id' ")or die(mysqli_error());
									$new_row = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Nama Lengkap :</label>
											<input name="nama" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Jenis Kelamin :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="laki-laki">laki-laki</option>
												<option value="perempuan">perempuan</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Umur :</label>
											<input name="umur" type="text" class="form-control"  required="true" autocomplete="off" maxlength="20">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Tinggi Badan :</label>
											<input name="tinggi" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Berat Badan :</label>
											<input name="berat" type="text" class="form-control"  required="true" autocomplete="off" maxlength="20">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Pendidikan Terakhir :</label>
											<select name="pendThr" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
												<option value="Tidak Tamat SD/Sederajat">Tidak Tamat SD/Sederajat</option>
												<option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
												<option value="SMP/Sederajat">SMP/Sederajat</option>
												<option value="SMA">SMA</option>
												<option value="SMK">SMK</option>
												<option value="Diploma I-III">Diploma I-III</option>
												<option value="DiplomaIV/Strata I">DiplomaIV/Strata I</option>
												<option value="Strata II">Strata II</option>
												<option value="Strata III">Strata III</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Pekerjaan :</label>
											<input name="pekerjaan" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label for="alamat">Alamat :</label>
											<textarea id="alamat" name="alamat" class="form-control" required maxlength="150" rows="2" autocomplete="off"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 text-right">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Submit</button>
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