<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>

<?php
// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_POST['edit_info'])) {
    $definisi = $_POST['definisi'];
    $gejala = $_POST['gejala'];
    $penunjang = $_POST['penunjang'];
    $penularan = $_POST['penularan'];
    $risiko = $_POST['risiko'];
    $penanganan = $_POST['penanganan'];
    $dampak = $_POST['dampak'];
    $pencegahan = $_POST['pencegahan'];

	$result = mysqli_query($conn,"update informasiPenyakit set definisi='$definisi', gejala='$gejala', penunjang='$penunjang', penularan='$penularan', risiko='$risiko', penanganan='$penanganan', dampak='$dampak', pencegahan='$pencegahan' where id='$get_id'         
		");

    if ($result) {
        echo "<script>alert('Records Successfully Updated');</script>";
        echo "<script>window.location = 'informasiPenyakit.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
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
								<h4>Tambah Pengguna</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Pengguna</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<?php
									$query = mysqli_query($conn,"select * from informasiPenyakit where id = '$get_id' ")or die(mysqli_error());
									$row_up = mysqli_fetch_array($query);
									?>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Definisi :</label>
											<input name="definisi" type="text" class="form-control wizard-required" required="true" autocomplete="off" value="<?php echo $row_up['definisi']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
												<label >Gejala</label>
												<select name="gejala" class="custom-select form-control" required="true" autocomplete="off">
												<option value="<?php echo $row_up['gejala']; ?>"><?php echo $row_up['gejala']; ?></option>
													<?php
													$query = mysqli_query($conn,"select * from dataGejala");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['gejala']; ?>"><?php echo $row['gejala']; ?></option>
													<?php } ?>
												</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Penunjang :</label>
											<input name="penunjang" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['penunjang']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Penularan :</label>
											<input name="penularan" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['penularan']; ?>">
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Risiko :</label>
											<input name="risiko" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['risiko']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Penanganan :</label>
											<input name="penanganan" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['penanganan']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Dampak :</label>
											<input name="dampak" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['dampak']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Pencegahan :</label>
											<input name="pencegahan" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row_up['pencegahan']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="edit_info" id="edit_info" data-toggle="modal">Update&nbsp;Penyakit</button>
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