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
	$tinggal=$_POST['tinggal'];
	$hubungan=$_POST['hubungan'];
	$merokok=$_POST['merokok'];
	$riwayat=$_POST['riwayat'];
	$alamat=$_POST['alamat'];
	$id_user=$session_id;

	// Set nilai penyakit penyerta ke kosong jika riwayat komorbid dipilih tidak
	$penyakit = ""; // Default value untuk penyakit penyerta
	if ($riwayat == "Tidak") {
		$penyakit = ""; // Jika riwayat komorbid tidak, maka set penyakit penyerta ke kosong
	} else {
		$penyakit=$_POST['penyakit']; // Jika riwayat komorbid ada, maka ambil nilai dari form
	}

	// Insert ke tabel informasiData
	$query_insert = mysqli_query($conn, "INSERT INTO informasiData (nama, jenisKelamin, umur, tinggiBadan, beratBadan, pendTerakhir, pekerjaan, alamat, tinggalSerumah, hubungan, merokok, riwayatKomorbid, penyakitPenyerta, id_user)
				VALUES ('$nama', '$jenisKelamin', '$umur', '$tinggi', '$berat', '$pendThr', '$pekerjaan', '$alamat', '$tinggal', '$hubungan', '$merokok', '$riwayat', '$penyakit', '$id_user')
			") or die(mysqli_error($conn));

	// Update kolom status di tabel pengguna
	if ($query_insert) {
		$query_update = mysqli_query($conn, "UPDATE pengguna SET status = 1 WHERE id = '$id_user'") or die(mysqli_error($conn));

		if ($query_update) {
			echo "<script>alert('Added Successfully');</script>";
			$query = mysqli_query($conn,"select * from pengguna where id = '$session_id' ")or die(mysqli_error());
			$row = mysqli_fetch_array($query);
			$status = $row['status'];
			if($status == 1){
				echo "<script type='text/javascript'> document.location = 'deteksi.php'; </script>";
			}
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
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Pekerjaan :</label>
											<input name="pekerjaan" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Tinggal serumah dengan pasien TB paru :</label>
											<select name="tinggal" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="Ya">Ya</option>
												<option value="Tidak">Tidak</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Hubungan dengan pasien TB paru :</label>
											<select name="hubungan" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="Istri/Suami">Istri/Suami</option>
												<option value="Anak">Anak</option>
												<option value="Cucu">Cucu</option>
												<option value="Kakak/Adik">Kakak/Adik</option>
												<option value="Kakek/Nenek">Kakek/Nenek</option>
												<option value="Om/Tante">Om/Tante</option>
												<option value="Keluarga Jauh">Keluarga Jauh</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Merokok :</label>
											<select name="merokok" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="Ya">Ya</option>
												<option value="Tidak">Tidak</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Riwayat Komorbid :</label>
											<select id="riwayat-komorbid" name="riwayat" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="Ya">Ya</option>
												<option value="Tidak">Tidak</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group" id="penyakit-penyerta-container" style="display:none;">
											<label>Penyakit Penyerta :</label>
											<select id="penyakit-penyerta" name="penyakit" class="custom-select form-control" autocomplete="off">
												<option value="">Belum Memilih</option>
												<option value="HIV">HIV</option>
												<option value="Diabetes Melitus">Diabetes Melitus</option>
												<option value="Asma">Asma</option>
												<option value="Lainnya">Lainnya</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
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
	<script>
    document.getElementById("riwayat-komorbid").addEventListener("change", function() {
        var penyakitPenyertaContainer = document.getElementById("penyakit-penyerta-container");
        var penyakitPenyerta = document.getElementById("penyakit-penyerta");

        if (this.value === "Ya") {
            penyakitPenyertaContainer.style.display = "block";
        } else {
            penyakitPenyertaContainer.style.display = "none";
            penyakitPenyerta.value = ""; // Reset nilai saat penyakit penyerta disembunyikan
        }
    });
	</script>
	<?php include('includes/scripts.php')?>
</body>
</html>