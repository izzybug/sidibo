<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if (isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$sql = "DELETE FROM tblemployees where emp_id = ".$delete;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Staff deleted Successfully');</script>";
     	echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
		
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