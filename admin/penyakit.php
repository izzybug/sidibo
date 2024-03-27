<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$penyakit_id = $_GET['delete'];
		$sql = "DELETE FROM dataPenyakit where kode = ".$penyakit_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'penyakit.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	 $kode=$_POST['kode'];
	 $penyakit=$_POST['penyakit'];

     $query = mysqli_query($conn,"select * from dataPenyakit where penyakit = '$'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"insert into dataPenyakit (kode, penyakit)
  		 values ('$kode', '$penyakit')      
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'penyakit.php'; </script>";
		}
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
									<h4>Data Penyakit</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Data Penyakit</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Tambah Penyakit</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Kode</label>
												<input name="kode" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Penyakit</label>
												<textarea name="penyakit" style="height: 5em;" class="form-control" type="text"></textarea>
											</div>
										</div>
									</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">List Penyakit</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th class="table-plus">No.</th>
											<th class="table-plus">KODE</th>
											<th class="table-plus">PENYAKIT</th>
											<th class="datatable-nosort">AKSI</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from dataPenyakit";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($cnt);?></td>
	                                            <td><?php echo htmlentities($result->kode);?></td>
	                                            <td><?php echo htmlentities($result->penyakit);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_penyakit.php?edit=<?php echo htmlentities($result->kode);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="penyakit.php?delete=<?php echo htmlentities($result->kode);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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