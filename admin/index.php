<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<!-- <div class="loader-logo"><img src="../vendors/images/sidibo.png" alt=""></div> -->
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
			<div class="title pb-20">
				<h2 class="h3 mb-0">Data Information</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT id from pengguna";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">Total Users</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=1;
						$sql = "SELECT kode from dataGejala";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$leavecount=$query->rowCount();
						?>        

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($leavecount); ?></div>
								<div class="font-14 text-secondary weight-500">Total Gejala</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=0;
						$sql = "SELECT id from dataPertanyaan";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$leavecount=$query->rowCount();
						?>        

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($leavecount); ?></div>
								<div class="font-14 text-secondary weight-500">Total Pertanyaan</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$status=2;
						$sql = "SELECT kode from dataPenyakit";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$leavecount=$query->rowCount();
						?>  

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($leavecount); ?></div>
								<div class="font-14 text-secondary weight-500">Total Penyakit</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-12 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Admin</div>
							<div class="table-actions">
								<a title="VIEW" href="pengguna.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>
						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from pengguna where role = 'admin' ORDER BY pengguna.id desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Aktif</span>
											<div class="font-14 weight-600"><?php echo $row['namaLengkap']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['email']; ?></div>
										</div>
									</div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 col-md-12 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Pengguna</div>
							<div class="table-actions">
								<a title="VIEW" href="pengguna.php"><i class="icon-copy ion-disc" data-color="#17a2b8"></i></a>	
							</div>
						</div>

						<div class="user-list">
							<ul>
								<?php
		                         $query = mysqli_query($conn,"select * from pengguna where role = 'user' ORDER BY pengguna.id desc limit 4") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($query)) {
		                         $id = $row['id'];
		                             ?>

								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7"><?php echo $row['Department']; ?></span>
											<div class="font-14 weight-600"><?php echo $row['namaLengkap']; ?></div>
											<div class="font-12 weight-500" data-color="#b2b1b6"><?php echo $row['email']; ?></div>
										</div>
									</div>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">INFORMASI DATA TERBARU</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th class="table-plus">No.</th>
											<th class="table-plus ">NAMA</th>
											<th class="table-plus datatable-nosort">JENIS KELAMIN</th>
											<th class="table-plus">UMUR</th>
											<th class="table-plus datatable-nosort">PENDIDIKAN TERAKHIR</th>
											<th class="table-plus datatable-nosort">PEKERJAAN</th>
											<th class="table-plus datatable-nosort">ALAMAT</th>
											<th class="table-plus">HASIL DETEKSI</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from informasiData";
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
	                                            <td><?php echo htmlentities($result->nama);?></td>
	                                            <td><?php echo htmlentities($result->jenisKelamin);?></td>
	                                            <td><?php echo htmlentities($result->umur);?></td>
	                                            <td><?php echo htmlentities($result->pendTerakhir);?></td>
	                                            <td><?php echo htmlentities($result->pekerjaan);?></td>
	                                            <td><?php echo htmlentities($result->alamat);?></td>
	                                            <td><?php echo htmlentities($result->hasilDeteksi);?></td>
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