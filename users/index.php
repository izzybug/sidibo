<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="../vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">

						<?php $query= mysqli_query($conn,"select * from pengguna where id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php echo $row['namaLengkap']; ?>,</div>
						</h4>
						<p class="font-18 max-width-600">Ini adalah Sistem Deteksi Dini Tuberkulosis Poltekkes Tasikmalaya.</p>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
					
				</div>
				<div class="pb-20">
					<div id="konten2">
						<h2 style="font-weight: bold;text-align: center;">Informasi Penyakit</h2>
					</div>
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="d-flex align-items-center flex-wrap justify-content-center pt-30">
									<div class="container-fluid">
										<div class="row align-items-center">
											<div class="col-md-4 col-lg-4">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-20 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Apa yang dimaksud dengan Tuberkulosis Paru?</h4>
														<img src="gambar/1.png" class="card-img-top" alt="..." width="600" height="600">
														<p class="mb-4 mt-5">
														Tuberkulosis paru, atau dikenal juga sebagai TBC paru, adalah sebuah penyakit menular yang disebabkan oleh infeksi bakteri Mycobacterium tuberculosis di paru-paru.
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-lg-4 box-container">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-20 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Apakah gejala dan tanda yang muncul akibat Tuberkulosis Paru?</h4>
														<img src="gambar/2.png" class="card-img-top" alt="..." width="600" height="600">
														<p class="mb-4 mt-5">
														Gejala utama yang biasanya muncul pada pasien TBC paru adalah batuk berdahak yang berlangsung selama 2-3 minggu atau lebih.
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-lg-4">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-15 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Bagaimana cara melakukan pemeriksaan Tuberkulosis Paru?</h4>
														<img src="gambar/3.png" alt="..." >
														<p class="mb-4 mt-5">
														Pemeriksaan TBC paru dapat dilakukan dengan mengambil dan memeriksa sampel dahak dari penderita. Pemeriksaan dahak memerlukan dua kali pengambilan sampel, yaitu saat pasien datang ke layanan (Sewaktu) dan pagi hari saat bangun tidur (Pagi).
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="d-flex align-items-center flex-wrap justify-content-center pt-30">
									<div class="container-fluid">
										<div class="row align-items-center">
											<div class="col-md-4 col-lg-4 box-container">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-20 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Bagaimana cara Tuberkulosis Paru menular?</h4>
														<img src="gambar/4.jpg" class="card-img-top" alt="..." width="600" height="600">
														<p class="mb-4 mt-5">
														Penularan Tuberkulosis paru melibatkan udara, dimana bakteri dapat menyebar saat seseorang yang terinfeksi TBC paru batuk, bersin, atau berbicara, sehingga menyebarkan bakteri ke udara dalam bentuk droplet.
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-lg-4 box-container">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-20 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Siapa saja yang termasuk dalam kelompok risiko Tuberkulosis Paru?</h4>
														<img src="gambar/5.png" class="card-img-top" alt="..." width="200" height="200" style="width: 200px; height:200px;">
														<p class="mb-4 mt-5">
														Siapa saja yang termasuk dalam kelompok risiko Tuberkulosis Paru?
														Beberapa kategori individu memiliki risiko lebih tinggi terkena penyakit Tuberkulosis paru, di antaranya: :
														1. Anak-anak di bawah usia 5 tahun 
														2. Orang tua yang berusia di atas 65 tahun memiliki risiko lebih tinggi terkena Tuberkulosis paru karena sistem kekebalan tubuh yang rentan.
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-lg-4 box-container">
												<div class=" bg-white box-shadow border-radius-10 pd-20 mb-20 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Bagaimana cara penanganan Tuberkulosis Paru ?</h4>
														<img src="gambar/6.png" class="card-img-top" alt="..." width="200" height="200" style="width: 200px; height:200px;">
														<p class="mb-4 mt-5">
														Penanganan atau solusi yang dapat dilakukan jika dalam pengisian sistem deteksi dini ini dinyatakan bahwa seseorang berisiko terkena Tuberkulosis paru, meliputi :
														1. Jika mengalami gejala-gejala TBC paru, segera lakukan pemeriksaan diri ke dokter atau fasilitas pelayanan kesehatan terdekat untuk menindaklanjuti penangan yang tepat dari penyakit tersebut.
														2. Hidup sehat dengan mengonsumsi makanan yang bergizi dan berolahraga secara teratur.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="d-flex align-items-center flex-wrap justify-content-center pt-30">
									<div class="container-fluid">
										<div class="row align-items-center">
											<div class="col-md-6 col-lg-6">
												<div class="bg-white box-shadow border-radius-10 pd-20 mb-15 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Apa dampak yang muncul akibat dari penyakit Tuberkulosis Paru?</h4>
														<img src="gambar/7.png" alt="..." >
														<p class="mb-4 mt-5">
														1. Komplikasi Penyakit Lain
														Tanpa penanganan yang sesuai, TBC paru bisa berakibat fatal. Bakteri TBC paru tidak hanya memengaruhi paru-paru, melainkan juga bisa menyebar ke bagian tubuh lain melalui peredaran darah, menyebabkan penyakit lain seperti (Baswedan dkk., 2022): 
														a)	Kondisi sakit tulang belakang, seperti nyeri pada punggung dan kekakuan.
														b)	Kerusakan pada sendi seperti arthritis umumnya memengaruhi persendian pada pinggul dan lutut.
														</p>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="bg-white box-shadow border-radius-10 pd-20 mb-15 card">
													<div class="col align-self-center">
														<h4 class="mb-4">Bagaimana cara untuk mencegah penyakit Tuberkulosis Paru?</h4>
														<img src="gambar/8.png" alt="..." >
														<p class="mb-4 mt-5">
															Beberapa langkah yang bisa dilakukan untuk mencegah penularan TBC, diantaranya :
															1)	Lakukan vaksinasi BCG (Bacillus Calmette-Guerin).
															2)	Saat berada di tempat ramai, selalu kenakan masker.
															3)	Menerapkan perilaku hidup bersih dan sehat, termasuk mencuci tangan secara teratur serta melakukan kebiasaan menjemur alas tidur secara teratur bertujuan untuk menghindari kelembaban yang dapat memungkinkan pertumbuhan bakteri atau jamur.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
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