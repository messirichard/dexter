<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
	<?php
	$title = 'Hubungi Dexter Surabaya ACP Aluminium Composite Panel - Cutting CNC - Signage (reklame) - Cutting Cladding Surabaya';
	 include('inc/head.php') ?>
</head>
<body>
<div class="main-wrapper">
	<?php include('inc/header.php') ?>
	<div class="header-content">
		<div class="tengah w954">
			<div class="hd-pos">
				<div class="hdr-content">
					<div class="img-hd"><img src="images/header-contact.jpg" class="img-responsive" />
					<div class="jdul neosans">
						<div class="text-jdul">
						Hubungi Kami
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<!-- div header content -->
	</div>
	<style type="text/css">
		.ct-textcontat p{margin: 0px;
padding: 0px;
color: #7a7a7a;
font-size: 14px;
font-weight: normal;
}
.ct-textcontat p a{color: #7a7a7a; text-decoration: none;}
.ct-textcontat p a:hover{color: #000;}
	</style>
	<div>
		<div class="tengah w954" style="padding-top: 22px;">
			<div class="in-content">
				<div class="breadcumb" >
					<div class="text-breadcumb"><a href="index.php">Home</a> &gt; Hubungi Kami</div>
				</div>
			<div class="box-content">
				<div class="left-ctconta" style="float: left; width: 270px;">
				<div class="img-right">
					<img src="images/illustration_contact.jpg" />
				</div>
				<div class="clear"></div>
				<div class="ct-textcontat">
					<div style="height: 9px;"></div>
					<span class="myriadproad">Hubungi kami pada jam kerja:</span>
					<div class="clear"></div>
					<div style="height: 5px;"></div>
					<div class="lines"></div>
					<div style="height: 8px;"></div>
					<p class="myriadproad"><span>Phone</span> &nbsp;&nbsp;&nbsp;081 6540 7463 / 031 60251101<br />
<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>BB Pin</span> &nbsp;&nbsp;&nbsp;281E1C08<br /> -->
&nbsp;&nbsp;&nbsp;<span>Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@dextercut.com">info@dextercut.com</a></p>
				</div>
				</div>
				<div class="text-cont-inside myriadpro">

				<p>Jika Anda memiliki pertanyaan dan saran, silahkan hubungi kami. Kami akan merespon pesan Anda sesegera mungkin. Silahkan mengisi seluruh field dengan tanda bintang sebelum anda klik Submit.</p>
				
				<?php  if (isset($_SESSION['keterangan']) == true && $_SESSION['keterangan'] == 'berhasil'): ?>
														<div class="success-mail">
														<p>Thank you for contacting us, we will respond to you shortly</p>
													</div>
				<?php endif ?>
				<div>				
				<form action="mail.php" method="post">
					<ul class="form">
						<li><label>Nama <span class="required">*</span></label><input type="text" name="name" value=""></li>
						<li><label>Perusahaan <span class="required">*</span></label><input type="text" name="company" value=""></li>
						<li><label>Email <span class="required">*</span></label><input type="text" name="email" value=""></li>
						<li><label>Telepon <span class="required">*</span></label><input type="text" name="phone" value=""></li>
						<li><label>Alamat</label><input type="text" name="address" value=""></li>
						<li><label>Kota</label><input type="text" name="city" value=""></li>
						<li><label>Provinsi</label><input type="text" name="state" value=""></li>
						<li><label>Negara</label><input type="text" name="country" value=""></li>
						<li><label>Pesan<span class="required">*</span></label><textarea name="comments" rows="4"></textarea></li>
						<li><label>Kode Verifikasi</label><img src="inc/captcha/captcha.php" id="captcha" />&nbsp;&nbsp;&nbsp;<a onclick="document.getElementById('captcha').src='inc/captcha/captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image" style="cursor:pointer; padding:4px 0px;  color:#000; text-decoration: none; font-size: 11px; font-family:tahoma;">Not readable? Change text.</a><br></li>
						<li><label><div style="display:block; opacity:0;">slkdjksdjkflsdlkfj</div></label><input type="text" name="captcha" id="captcha-form" autocomplete="off" style="padding-top:3px;" /></li>
						<li><label><div style="display:block; opacity:0;">slkdjksdjkflsdlkfj</div></label><input type="submit" value="Submit" name="submit" style="cursor:pointer;"></li>
					</ul>
				</form>
				</div>

				</div>
				<?php session_destroy(); ?>
				<br class="clear" />
			</div>
				<!-- div content -->
			</div>
		</div>
	</div>
	</div>
	<?php include('inc/footer.php') ?>
</body>

</html>