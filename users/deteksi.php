<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php

if (!isset($_SESSION['persentase'])) {
    $_SESSION['persentase'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hasil'])) {
    $query = mysqli_query($conn, "SELECT * FROM dataPertanyaan");
    while ($row = mysqli_fetch_array($query)) {
        $jawaban = $_POST['jawaban_' . $row['id']];
		$id =  $row['id'];
        $kode = $row['kode'];

        if ($jawaban === 'Ya') {
            $_SESSION['persentase'][] = $kode;
            $_SESSION['pilihan'][] = $id;
        }
    }

    echo "<script>alert('Pertanyaan yang dipilih: " . implode(', ', $_SESSION['pilihan']) . "');</script>";
	// Hitung persentase
	$Tb = array('G01', 'G04', 'G05', 'G07', 'G09', 'G10',);
	$nilai = 0;
	if (isset($_SESSION['persentase'])) {
		foreach ($_SESSION['persentase'] as $value) {
			if (in_array($value, $Tb)) {
				$nilai += 1;
			}
		}
	}
	$Tb = $nilai / count($Tb);
	$Akut = number_format($Tb, 3);
	$hasil = $Akut * 100;
	$_SESSION['hasil'] = $hasil;

	// echo "<script>alert('Pertanyaan yang dipilih: " . implode(', ', $_SESSION['hasil']) . "');</script>";
	header('Location:hasil.php');
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
								<h4>DETEKSI TUBERKULOSIS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Deteksi Tuberkulosis</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Jawab Pertanyaan di bawah dengan jujur ya!</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<?php
											$query = mysqli_query($conn, "SELECT * FROM dataPertanyaan");
											while ($row = mysqli_fetch_array($query)) {
												?>
												<label style="font-size:20px;"><?php echo $row['pertanyaan']; ?></label><br>
												<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
												<input type="hidden" name="kode" value="<?php echo $row['kode']; ?>">
												<label>
													<input type="radio" name="jawaban_<?php echo $row['id']; ?>" value="Ya">&nbsp;Ya
												</label><br>
												<label>
													<input type="radio" name="jawaban_<?php echo $row['id']; ?>" value="Tidak">&nbsp;Tidak
												</label><br><br>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="hasil" id="hasil" data-toggle="modal">Cek&nbsp;Hasil</button>
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