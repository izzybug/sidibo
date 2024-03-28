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
					<h2 class="text-blue h4">INFORMASI PENYAKIT</h2>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
										<tr>
											<th class="table-plus">NO.</th>
											<th class="table-plus datatable-nosort">DEFINISI</th>
											<th class="table-plus datatable-nosort">GEJALA</th>
											<th class="table-plus datatable-nosort">PENUNJANG</th>
											<th class="table-plus datatable-nosort">PENULARAN</th>
											<th class="table-plus datatable-nosort">RISIKO</th>
											<th class="table-plus datatable-nosort">PENANGANAN</th>
											<th class="table-plus datatable-nosort">DAMPAK</th>
											<th class="table-plus datatable-nosort">PENCEGAHAN</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from informasiPenyakit";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td><?php echo htmlentities($cnt);?></td>
	                                            <td><?php echo htmlentities($result->definisi);?></td>
	                                            <td><?php echo htmlentities($result->gejala);?></td>
	                                            <td><?php echo htmlentities($result->penunjang);?></td>
	                                            <td><?php echo htmlentities($result->penularan);?></td>
	                                            <td><?php echo htmlentities($result->risiko);?></td>
	                                            <td><?php echo htmlentities($result->penanganan);?></td>
	                                            <td><?php echo htmlentities($result->dampak);?></td>
	                                            <td><?php echo htmlentities($result->pencegahan);?></td>
												
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>