<?php include('header.php')?>
<?php include('../includes/session.php')?>
	<style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 644px; /* Lebar kertas A4 dalam poin */
            margin: 0 auto;
			padding-bottom: 14.17pt;
			padding-top: 14.17pt;
			padding-left: 28.35pt;
			padding-right: 28.35pt;
        }
        p {
            line-height: 150%;
        }
        .right {
            text-align: right;
        }
        .indent {
            text-indent: 28.35pt; /* 1cm dalam poin */
        }
		.align-span {
            min-width: 75pt; /* Sesuaikan dengan lebar yang diinginkan */
            display: inline-block; /* Agar bisa diberi lebar minimum */
        }
    </style>
<body>
	<?php 
		if (!isset($_GET['print']) || empty($_GET['print'])) {
			header('Location: ../staff/view_apply.php');
			exit();
		} else {
			$lid = intval($_GET['print']);
			$sql = "SELECT tblpengajuan.kti_id as lid, tblpengajuan.FirstName, tblpengajuan.LastName, tblpengajuan.NIM, tblprogramstudi.ProgramStudi, tblpengajuan.Keperluan, tblpengajuan.JudulProposal, tblpengajuan.KepadaYth,tblpengajuan.AdminRemarkDate
			FROM tblpengajuan
			JOIN tblprogramstudi ON tblpengajuan.ProgramStudi = tblprogramstudi.Prodi
			WHERE tblpengajuan.kti_id = :lid";

			$query = $dbh->prepare($sql);
			$query->bindParam(':lid', $lid, PDO::PARAM_INT);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				foreach ($results as $result) {
		?>
			<div id="kti">
				<div class="container">
					<p>
						<img src="img/1694680714_surat-perizinan-kti-1.jpeg" width="643" height="93" alt="" />
					</p>
					<p>
						<span class="align-span">Nomor</span><span>: PP.01.01/VII.I/054/2023</span>
						<span style="float: right;">Cirebon,&nbsp;<?php echo htmlentities($result->AdminRemarkDate);?></span>
					</p>
					<p>
						<span class="align-span">Lampiran</span><span>: -</span>
					</p>
					<p>
						<span class="align-span">Perihal</span><span>:&nbsp;</span><span><?php echo htmlentities($result->Keperluan);?></span>
					</p>
					<p>
						<span class="align-span">Kepada Yth.</span><span>:&nbsp; <?php echo htmlentities($result->KepadaYth);?></span>
					</p>
					<p style="padding-left: 71px;" class="indent">Di</p>
					<p style="padding-left: 71px;" class="indent">Tempat</p>
					<p class="indent">
						<span>Dalam rangka penyusan tugas akhir penyusunan Karya Tulis Ilmiah (KTI) bagi mahasiswa tingkat III Program Studi D3 <span><?php echo htmlentities($result->ProgramStudi);?></span> Kampus Cirebon Politeknik Kesehatan Kemenkes RI Tahun Akademik 2022/2023, dengan ini kami mohon Bapak/Ibu dapat memberikan izin sebagaimana perihal di atas bagi mahasiswa:</span>
					</p>
					<p>
						<span class="align-span">Nama</span><span>:&nbsp;</span><span><?php echo htmlentities($result->FirstName." ".$result->LastName);?></span>
					</p>
					</p>
					<p>
						<span class="align-span">NIM</span><span>:&nbsp;</span><span><?php echo htmlentities($result->NIM);?></span>
					</p>
					<p>
						<span class="align-span">Judul</span><span>:&nbsp;</span><span><?php echo htmlentities($result->JudulProposal);?></span>
					</p>			
					<p class="indent">
						<span>Demikian surat permohonan ini kami sampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.</span>
					</p>
					<p style="padding-right: 5px;" class="right">a.n Direktur Poltekkes Kemenkes Tasikmalaya</p>
					<p style="padding-right: 85px;" class="right">Ketua Program Studi</p>
					<p style="padding-right: 10px;" class="right">D.III Rekam Medis dan Informasi Kesehatan</p>
					<p>&#xa0;</p>
					<p>&#xa0;</p>
					<p style="padding-right: 40px;" class="right">Yanto Haryanto, S.Pd, S.Kp, M.Kes</p>
					<p style="padding-right: 65px;" class="right">NIP. 196711021991011001</p>
					<p>
						<img src="img/1694680714_surat-perizinan-kti-2.jpeg" width="644" height="55" alt="" /><br />
					</p>
				</div>
			</div>
		<?php ;} }else{
			echo "<script>alert('Data not found');</script>";
		} }?>
	<script>

		// Fungsi untuk membuat PDF
		function generatePDF() {
		  // Choose the element that your content will be rendered to.
		  const element = document.getElementById("kti");
		  // Choose the element and save the PDF for your user.
		  html2pdf().from(element).save();
		}

		// Panggil generatePDF() saat halaman dimuat
		// window.onload = generatePDF;
	  </script>

</body>
</html>
