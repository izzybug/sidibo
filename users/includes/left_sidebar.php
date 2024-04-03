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
						$query = mysqli_query($conn, "SELECT status FROM pengguna WHERE id = '$session_id'") or die(mysqli_error($conn));
						$row = mysqli_fetch_array($query);

						$status = $row['status']; // Nilai status pengguna

						// Tentukan URL berdasarkan nilai status
						if ($status == 0) {
							$url = 'kuisioner.php';
						} elseif ($status == 1) {
							$url = 'deteksi.php';
						} elseif ($status == 2) {
							$url = 'deteksi.php';
						} else {
							// Status tidak valid, mungkin perlu ditangani sesuai kebutuhan
							$url = '#'; // URL default jika status tidak valid
						}
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