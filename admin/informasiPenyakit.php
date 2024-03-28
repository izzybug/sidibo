<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$sql = "DELETE FROM informasiPenyakit where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'informasiPenyakit.php'; </script>";
			
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Informasi Penyakit</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Informasi Penyakit</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<div class="row ">
									<h2 class="mb-10 h4 col-lg-11 ">Informasi Penyakit</h2>
									<a class="btn btn-primary float-right"  href="add_informasiPenyakit.php"><i class="dw dw-add"></i> Tambah Data</a>
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
											<th class="table-plus datatable-nosort">ACTION</th>
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
												<td>
													<div class="dropdown">
														<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
															<i class="dw dw-more"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
															<a class="dropdown-item" href="edit_informasiPenyakit.php?edit=<?php echo htmlentities($result->id);?>"><i class="dw dw-edit2"></i> Edit</a>
															<a class="dropdown-item" href="informasiPenyakit.php?delete=<?php echo htmlentities($result->id);?>"><i class="dw dw-delete-3"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
									</table>
								</div>
							</div>
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