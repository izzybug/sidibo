<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM pengguna where id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'pengguna.php'; </script>";
		
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="title pb-20">
				<h2 class="h3 mb-0">Administrative Breakdown</h2>
			</div>
			<div class="row pb-10">
				<div class="col-xl-4 col-lg-6 col-md-8 mb-20">
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
								<div class="font-14 text-secondary weight-500">Total Akun</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-8 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_student = mysqli_query($conn,"select * from pengguna where role = 'user' ")or die(mysqli_error());
						 $count_reg_student = mysqli_num_rows($query_reg_student);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo htmlentities($count_reg_student); ?></div>
								<div class="font-14 text-secondary weight-500">Pengguna</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><span class="icon-copy fa fa-hourglass"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-8 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php 
						 $query_reg_admin = mysqli_query($conn,"select * from pengguna where role = 'admin' ")or die(mysqli_error());
						 $count_reg_admin = mysqli_num_rows($query_reg_admin);
						 ?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($count_reg_admin); ?></div>
								<div class="font-14 text-secondary weight-500">Administrators</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><i class="icon-copy fa fa-hourglass-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">Semua Akun</h2>
					</div>
				<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<thead>
										<tr>
											<th class="table-plus">No.</th>
											<th class="table-plus ">NAMA</th>
											<th class="table-plus datatable-nosort">JENIS KELAMIN</th>
											<th class="table-plus">TEMPAT LAHIR</th>
											<th class="table-plus">TANGGAL LAHIR</th>
											<th class="table-plus datatable-nosort">NOMOR</th>
											<th class="table-plus datatable-nosort">ALAMAT</th>
											<th class="table-plus datatable-nosort">USERNAME</th>
											<th class="table-plus">ROLE</th>
											<th class="table-plus">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from pengguna";
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
	                                            <td><?php echo htmlentities($result->namaLengkap);?></td>
	                                            <td><?php echo htmlentities($result->jenisKelamin);?></td>
	                                            <td><?php echo htmlentities($result->tempatLahir);?></td>
	                                            <td><?php echo htmlentities($result->tglLahir);?></td>
	                                            <td><?php echo htmlentities($result->nomor);?></td>
	                                            <td><?php echo htmlentities($result->alamat);?></td>
	                                            <td><?php echo htmlentities($result->email);?></td>
	                                            <td><?php echo htmlentities($result->role);?></td>
												<td>
													<div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
															<i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															<a class="dropdown-item" href="edit_pengguna.php?edit=<?php echo htmlentities($result->id);?>"><i class="dw dw-edit2"></i> Edit</a>
															<a class="dropdown-item" href="pengguna.php?delete=<?php echo htmlentities($result->id);?>"><i class="dw dw-delete-3"></i> Delete</a>
														</div>
													</div>
												</td>
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