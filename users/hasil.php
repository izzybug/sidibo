<?php include('includes/header.php')?>
<?php include('../includes/session.php');?>

<?php
$id = $session_id;
$nilai = $_SESSION['hasil'];
$hasil = ($nilai >= 50) ? "Berisiko Tuberkulosis Paru" : "Tidak Berisiko Tuberkulosis Paru";

$query = mysqli_prepare($conn, "UPDATE informasiData SET hasilDeteksi = ? WHERE id_user = ?");
mysqli_stmt_bind_param($query, "si", $hasil, $id);
mysqli_stmt_execute($query);
mysqli_stmt_close($query);

if (isset($_POST['reset'])) {
    // Hapus data tertentu dari session
    unset($_SESSION['persentase']);
    unset($_SESSION['pilihan']);
    unset($_SESSION['hasil']);
	header('Location:deteksi.php');
	exit;
}
?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<!-- <div class="loader-logo"><img src="../vendors/images/siparti-dark.png" alt=""></div>/ -->
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="col-2">
				<!-- <div class="card-box pd-5 mb-20">
					<a class="btn btn-primary" href="deteksi.php?action=reset"><i class="dw dw-repeat"></i> Deteksi Ulang</a>
				</div> -->
				<div class="card-box pd-5 mb-20">
					<form method="post">
						<input class="btn btn-primary" type="submit" name="reset" id="reset" value="Deteksi Ulang">
					</form>
				</div>
			</div>
			<div class="card-box pd-20 mb-20 col-6">
				<div class="align-items-center">
					<h2 class="font-30 weight-500 text-capitalize">
						<div class="weight-600 font-30 text-blue">HASIL DETEKSI</div>
					</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="card-box pd-20 mb-20">
						<div class="align-items-center">
							<h2 class="font-30 weight-500 mb-5 text-capitalize">
								<div class="weight-600 font-30 text-blue">TUBERKULOSIS PARU</div>
							</h2>
							<?php
							// Misalnya nilai progress adalah 50
							$nilai_progress = $_SESSION['hasil'];
							?>
							<div class="progress mb-5">
								<div class="progress-bar" role="progressbar" style="width: <?php echo $nilai_progress; ?>%;" aria-valuenow="<?php echo $nilai_progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<p>Risiko: <?php echo $nilai_progress; ?>%</p>
						</div>
					</div>

					<div class="card-box pd-20 mb-30">
						<div class="mb-10">
							<h2 class="text-blue h4">GEJALA YANG ANDA ALAMI ADALAH : </h2>
						</div>
						<div class="pl-20 mb-10">
							<?php
								$ids = $_SESSION['pilihan'];

								// Bangun query SQL dengan klausa IN
								$sql = "SELECT * FROM dataPertanyaan WHERE id IN (" . implode(",", $ids) . ")";

								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									// Output data dari setiap baris
									$no = 1;
									while ($row = mysqli_fetch_assoc($result)) {
										echo $no . ". " . $row["gejala"] . "<br>";
										$no++;
									}
								} else {
									echo "0 hasil";
								}
							?>
						</div>
						<div class="">
							<p>
								Dari gejala-gejala yang Anda pilih. Hasil diagnosis anda adalah
								<span style="background-color: yellow;">Tuberkulosis Paru <?php echo $nilai_progress; ?>%</span>.
								Segera periksa diri ke dokter untuk mendapatkan penanganan lebih lanjut.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="card-box pd-20 mb-20 mt-10">
						<div class="align-items-cente">
							<h2 class="font-30 weight-500 text-capitalize">
								<div class="weight-600 font-30 text-blue">APA ITU TUBERKULOSIS PARU?</div>
							</h2>
							<br>
							<div class="ml-15">
								<img src="../vendors/images/photo2.jpg" alt="" width="300" height="300">
							</div>
							<br>
							<p class="m-10">
								Tuberkulosis paru, atau dikenal juga sebagai TBC paru, adalah sebuah penyakit menular yang disebabkan oleh infeksi bakteri Mycobacterium tuberculosis di paru-paru, yang mengakibatkan gangguan pernapasan seperti sesak napas dan batuk kronis.
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php');
	?>
</body>
</html>