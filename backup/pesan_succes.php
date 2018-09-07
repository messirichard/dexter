<?php 
session_start(); 
require('pesan_proses.php'); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php
	$title = 'Cutting CNC Dexter - Alucobond ACP, MDF, Akrilik, PVC';
	 include('inc/head.php') ?>
	 <link rel="stylesheet" href="js/validation/css/validationEngine.jquery.css" type="text/css"/>
	<script src="js/validation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#pesan_oncnc").validationEngine();
		});
</script>
	</head>
<body>
<div class="main-wrapper">
	<?php include('inc/header.php') ?>
	<div class="header-content">
		<div class="tengah w954">
			<div class="hd-pos">
				<div class="hdr-content">
					<div class="img-hd"><img src="images/header-form.jpg" />
					<div class="jdul neosans">
						<div class="text-jdul">
						Form Pesanan Online
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
					<div class="text-breadcumb"><a href="index.php">Home</a> &gt; Form Pesanan Online</div>
				</div>
			<div class="box-content">
				<style type="text/css">
					.letak_gambar{
						margin-top: 10px;
						width: auto;
						height: auto;
						float: left;}
					.letak_gambar .image-kiri{float: left;
					width: 320px;}
					.judl-img-f{margin-bottom: 12px; color: #7A7A7A;}
					.img-kiri-f{width: 284px; height: 177px; background-color: #FFF; cursor: pointer;
					-webkit-box-shadow: 0px 0px 18px rgba(50, 50, 50, 0.6);
					-moz-box-shadow:    0px 0px 18px rgba(50, 50, 50, 0.6);
					box-shadow:         0px 0px 18px rgba(50, 50, 50, 0.6);
					-webkit-border-radius: 4px;
					-moz-border-radius: 4px;
					border-radius: 4px;
					}
					.img-kiri-f img{padding-left: 4px; padding-top: 4px;}
					
					.letak_gambar .brows-kanan{float: right;
					width: 310px;}
					.brows-kanan span{float: left;}
					.brows-kanan input[type=file]{
						margin-top: 10px;
						margin-bottom: 6px;
					}
					
					.ganti-design{
						float: left;
						width: auto;
						margin-top: 10px;
						margin-bottom: 12px;
						}
					.submit-pesan{
						float: left;
						margin-left: 120px;
					}
					.back-to-pe{  font-size: 12px; color: #000; line-height: 1.5; height: auto; font-weight: normal;	 }
					.back-to-pe a{text-decoration: none; color: #000; }
					.back-to-pe a:hover{color: rgb(51, 56, 60); }
				</style>
				
				<div class="text-cont-inside" style="padding-left: 0px;">
				<div class="back-to-pe myriadproad"><a href="pesan.php">&lt;&lt; &nbsp;Kembali ke pemesanan online</a></div><div style="clear: both;">&nbsp;</div><div class="success-form">
							<p>Terima kasih, Pesanan Anda telah terkirim.</p>
						</div>
					<br style="clear: both;" />
				<br /><br /><br /><br /><br /><br />
				</div>
				<div class="clear"></div>
			</div>
				<!-- div content -->
			</div>
		</div>
	</div>
	</div>
	<?php include('inc/footer.php') ?>
</body>

</html>