<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php" style="padding-left: 1cm">
				<img src="../vendors/images/sidibo.png" alt="" class="dark-logo">
				<img src="../vendors/images/sidibo-wt.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
						
					</li>
					<?php
						$query =  mysqli_query($conn, "SELECT status FROM pengguna WHERE id = '$session_id'") or die(mysqli_error());
						$row = mysqli_fetch_array($query);

						$status = $row['status']; // Contoh nilai status

						// Tentukan URL berdasarkan nilai status
						$url = $status == 0 ? 'kuisioner.php' : 'deteksi.php';
					?>

					<li>
						<a href="<?php echo $url; ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Deteksi</span>
						</a>
					</li>

					<!-- <li>
						<a href="deteksi.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Deteksi</span>
						</a>
					</li> -->
					<li>
						<a href="penyakit.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Penyakit</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>