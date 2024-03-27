<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php 
	 if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$sql = "DELETE FROM dataPertanyaan where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'pertanyaan.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['add']))
{
	$gejala=$_POST['gejala'];
	$pertanyaan=$_POST['pertanyaan'];
	$kode=$_POST['kode'];

	 $query = mysqli_query($conn,"select * from dataPertanyaan where pertanyaan = '$pertanyaan'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ 
     	echo "<script>alert('Pertanyaan Already exist');</script>";
      }
      else{
        $query = mysqli_query($conn,"insert into dataPertanyaan (gejala, pertanyaan, kode)
  		 values ('$gejala', $pertanyaan, '$kode')
		") or die(mysqli_error()); 

		if ($query) {
			echo "<script>alert('Added Successfully');</script>";
			echo "<script type='text/javascript'> document.location = 'pertanyaan.php'; </script>";
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
									<h4>Data Pertanyaan</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Data Pertanyaan</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Pertanyaan baru</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Kode</label>
												<select name="kode" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Pilih kode</option>
													<?php
													$query = mysqli_query($conn,"select * from dataGejala");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['kode']; ?>"><?php echo $row['kode']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Gejala</label>
												<select name="gejala" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Pilih Gejala</option>
													<?php
													$query = mysqli_query($conn,"select * from dataGejala");
													while($row = mysqli_fetch_array($query)){
													
													?>
													<option value="<?php echo $row['gejala']; ?>"><?php echo $row['gejala']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Pertanyaan</label>
												<textarea name="Pertanyaan" style="height: 5em;" class="form-control text_area" type="text"></textarea>
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
								<h2 class="mb-30 h4">Data Pertanyaan</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th class="table-plus">No.</th>
											<th class="table-plus">KODE</th>
											<th class="table-plus">GEJALA</th>
											<th class="table-plus">PERTANYAAN</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from dataPertanyaan";
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
	                                            <td><?php echo htmlentities($result->pertanyaan);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_keperluan.php?edit=<?php echo htmlentities($result->id);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
														<a href="pertanyaan.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
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
	<!-- <script>
    document.getElementById('gejala').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var kodeGejala = selectedOption.getAttribute('data-kode');
        document.getElementById('kode').value = kodeGejala;
    });
</script> -->
	<?php include('includes/scripts.php')?>
</body>
</html>