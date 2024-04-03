<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php
// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_POST['add_user'])) {
    $nama = $_POST['nama'];
    $jenisKelamin = $_POST['gender'];
    $tempatLahir = $_POST['tmpt'];
    $tglLahir = $_POST['tgl'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $usr = $_POST['username'];
    $password = md5($_POST['password']);
    $user_role = $_POST['user_role'];
    $status = 0;
	$location = '';

    // Menentukan nilai location berdasarkan jenis kelamin
    if ($jenisKelamin == 'laki-laki') {
        $location = '../vendors/images/cowok.jpeg';
    } elseif ($jenisKelamin == 'perempuan') {
        $location = '../vendors/images/cewek.jpeg';
    }


    $query = "INSERT INTO pengguna (namaLengkap, jenisKelamin, tempatLahir, tglLahir, nomor, alamat, email, password, role, status, location)
              VALUES ('$nama', '$jenisKelamin', '$tempatLahir', '$tglLahir', '$nomor', '$alamat', '$usr', '$password', '$user_role', '$status', '$location')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Records Successfully Added');</script>";
        echo "<script>window.location = 'pengguna.php';</script>";
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
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Nama Lengkap :</label>
											<input name="nama" type="text" class="form-control wizard-required" required="true" autocomplete="off" >
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
											<label >Tempat Lahir :</label>
											<input name="tmpt" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Tanggal Lahir :</label>
											<input name="tgl" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Nomor Whatsapp :</label>
											<input name="nomor" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Alamat :</label>
											<input name="alamat" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Username :</label>
											<input name="username" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Password :</label>
											<input name="password" type="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="user_role" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
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
												<button class="btn btn-primary" name="add_user" id="add_user" data-toggle="modal">Add&nbsp;Pengguna</button>
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