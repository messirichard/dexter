<!DOCTYPE HTML>
<html>
<head>
	<?php
	$title = 'Pemasangan ACP Aluminium Composite Panel - Cutting Cladding Surabaya';
	 include('inc/head.php') ?>
</head>
<body>
<div class="main-wrapper">
	<?php include('inc/header.php') ?>
	<div class="header-content">
		<div class="tengah w954">
			<div class="hd-pos">
				<div class="hdr-content">
					<div class="img-hd"><img src="images/pattern-header-in.jpg" class="img-responsive" />
					<div class="jdul neosans">
						<div class="text-jdul">
						Proyek
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<!-- div header content -->
	</div>
	<div>
		<div class="tengah w954" style="padding-top: 22px;">
			<div class="in-content">
				<div class="breadcumb" >
					<div class="text-breadcumb"><a href="index.php">Home</a> &gt; Proyek</div>
				</div>
			<div class="box-content">
				<!-- Start content -->
				<?php for ($i=0; $i < 4; $i++) { ?>
				<div class="warp-content">
					<div class="img">
						<a href="proyek.php"><img src="https://placehold.it/288x131" /></a>
					</div>
					<img src="images/shadow-dexter.png" class="center-block" />
					<div class="myriadpro text">
						<h6>Proyek 1</h6>
						<p>Jakarta, Indonesia</p>
					</div>
				</div>
				<div class="batas-content"></div>
				<div class="warp-content">
					<div class="img">
						<a href="proyek.php"><img src="https://placehold.it/288x131" /></a>
					</div>
					<img src="images/shadow-dexter.png" class="center-block" />
					<div class="myriadpro text">
						<h6>Proyek 2</h6>
						<p>Semarang, Indonesia</p>
					</div>
				</div>
				<div class="batas-content"></div>
				<div class="warp-content">
					<div class="img">
						<a href="proyek.php"><img src="https://placehold.it/288x131" /></a>
					</div>
					<img src="images/shadow-dexter.png" class="center-block" />
					<div class="myriadpro text">
						<h6>Proyek 3</h6>
						<p>Surabaya, Indonesia</p>
					</div>
				</div>
				<br style="clear: both;"/>
				<?php } ?>
				<!-- End content -->
				<div class="clear clearfix" style="height: 30px;"></div>
			</div>
				<!-- div content -->
			</div>
		</div>
	</div>
</div>
	<?php include('inc/footer.php') ?>
</body>

</html>