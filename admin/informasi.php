<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$sql = "DELETE FROM informasiData where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'informasi.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	 $nama=$_POST['nama'];
	 $jenisKelamin=$_POST['description'];
	 $umur=$_POST['umur'];
	 $pendThr=$_POST['pendThr'];
	 $pekerjaan=$_POST['pekerjaan'];
	 $alamat=$_POST['pendThr'];
	 $id_user=$_SESSION['id'];

    $query = mysqli_query($conn,"insert into informasiData (nama, jenisKelamin, umur, pendTerakhir, pekerjaan, alamat, id_user)
  		 values ('$nama', '$jenisKelamin', '$umur', '$pendThr', '$pekerjaan', '$alamat', '$id_user')      
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'informasi.php'; </script>";
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
									<h4>Informasi Data</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Informasi Data</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Keperluan baru</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Keperluan</label>
												<input name="leavetype" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea name="description" style="height: 5em;" class="form-control text_area" type="text"></textarea>
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
						</div> -->
						
						<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Informasi Data</h2>
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