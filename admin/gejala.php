<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$gejala_id = $_GET['delete'];
		$sql = "DELETE FROM dataGejala where kode = ".$gejala_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'gejala.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	$kode=$_POST['kode'];
	$gejala=$_POST['gejala'];

     $query = mysqli_query($conn,"select * from dataGejala where gejala = '$gejala'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('Gejala Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"insert into dataGejala (kode, gejala)
  		 values ('$kode', '$gejala')      
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'gejala.php'; </script>";
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
									<h4>Data Gejala</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Data Gejala</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Gejala Baru</h2>
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
												<label>Gejala</label>
												<input name="gejala" type="text" class="form-control" required="true" autocomplete="off">
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
								<h2 class="mb-30 h4">List Gejala</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th>NO.</th>
											<th class="table-plus">KODE</th>
											<th>GEJALA</th>
											<th class="datatable-nosort">AKSI</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from dataGejala";
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
	                                            <td><?php echo htmlentities($result->gejala);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_gejala.php?edit=<?php echo htmlentities($result->kode);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="gejala.php?delete=<?php echo htmlentities($result->kode);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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