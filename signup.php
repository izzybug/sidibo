<?php
include('includes/config.php');

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_POST['signup'])) {
    $namaLengkap = $_POST['nama'];
    $jenisKelamin = $_POST['gender'];
    $tempatLahir = $_POST['tempatLahir'];
    $tglLahir = md5($_POST['tglLahir']);
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $email = $_POST['username'];
    $password = md5($_POST['password']);
    $status = 0;

    $query = "INSERT INTO pengguna (namaLengkap, jenisKelamin, tempatLahir, tglLahir, nomor, alamat, email, password, status, location)
              VALUES ('$namaLengkap', '$jenisKelamin', '$tempatLahir', '$tglLahir', '$nomor', '$alamat', '$email', $password, $status, '../vendors/images/logo-poltek.png')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Successfully Sign Up');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIDIBO</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/logo-poltek.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/logo-poltek.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/logo-poltek.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page" style="background: url('https://1.bp.blogspot.com/-1_9xItJqkkU/YIbvrQEqHMI/AAAAAAAAN1E/z8JPviBIKV0EFrMUt_7uIK-cLjBLg1_9QCLcBGAsYHQ/w1200-h630-p-k-no-nu/cropped-IMG_9697-png-8-crop-1.png') no-repeat center center fixed; background-size: cover;">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/siparti-dark.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-2 col-lg-3">
					<img src="" alt="">
				</div>
				<div class="pd-20 card-box mb-30 col-md-12 col-lg-12">
					<div class=" border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Daftar yuk, ke SIDIBO</h2>
						</div>
						<br>
						<form action="" method="post">
							<div class="row">
								<div class="input-group custom col-md-6 col-sm-12">
									<input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap" name="nama" id="nama">
									<div class="input-group-append custom">
										<span class="input-group-text"></span>
									</div>
								</div>
								<div class="input-group custom col-md-6 col-sm-12">
									
									<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Jenis Kelamin</option>
												<option value="male">Laki-laki</option>
												<option value="female">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="row">
							<div class="input-group custom col-md-6 col-sm-12">
									<input type="text" class="form-control form-control-lg" placeholder="Tempat Lahir" name="tempatLahir" id="tempatLahir">
									<div class="input-group-append custom">
										<span class="input-group-text"></span>
									</div>
								</div>
								<div class="input-group custom col-md-6 col-sm-12">
									<input name="tglLahir" type="text" class="form-control date-picker" placeholder="Tanggal Lahir" required="true">
									<div class="input-group-append custom">
										<span class="input-group-text"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-group custom col-md-6 col-sm-12">
									<input type="text" class="form-control form-control-lg" placeholder="Nomor Whatsapp" name="nomor" id="nomor">
									<div class="input-group-append custom">
										<span class="input-group-text"></span>
									</div>
								</div>
								<div class="input-group custom col-md-6 col-sm-12">
									<input type="text" class="form-control form-control-lg" placeholder="Alamat" name="alamat" id="alamat">
									<div class="input-group-append custom">
										<span class="input-group-text"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-group custom col-md-6 col-sm-12">
									<input type="email" class="form-control form-control-lg" placeholder="Email ID" name="username" id="username">
								</div>
								<div class="input-group custom col-md-6 col-sm-12">
									<input type="password" class="form-control form-control-lg" placeholder="**********"name="password" id="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									   <button class="btn btn-primary btn-lg btn-block" name="signup" id="signup" data-toggle="modal">Sign&nbsp;Up</button>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										Already have an account? <a href="index.php"> &nbsp;Signin Now</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>