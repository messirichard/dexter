<?php
error_reporting(E_ALL ^ E_NOTICE);
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
					<div class="img-hd"><img src="images/header-form.jpg" class="img-responsive" />
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
				</style>
				<script type="text/javascript">
					 $(document).ready(function() {
					 		$("#imageajax").fancybox({
					 		type		: 'inline',
					 		href		: '#content_hide',
					        fitToView   : false,
					        width       : '493',
					        height      : '387',
					        autoSize    : false,
					        closeClick  : false,
					        openEffect  : 'none',
					        closeEffect : 'none'
					    });
					 });
				</script>
				<?php 
					$dataBahan = array(
								// 1
								'md9' => array(
								'text'=>'MDF 9 mm',
								'harga' => '250000',
								),
								'md12' => array(
								'text'=>'MDF 12 mm',
								'harga' => '300000',
								),
								'md15'=>array(
								'text'=>'MDF 15 mm',
								'harga'=> '350000',
								),
								'md18'=>array(								
								'text'=>'MDF 18 mm',
								'harga'=> '400000',
								),
								
								'pv9'=>array(
								'text'=>'PVC 9 mm',
								'harga' => '250000',
								),
								'pv12'=>array(
								'text'=>'PVC 12 mm',
								'harga' => '300000',
								),
								'pv15'=>array(
								'text'=>'PVC 15 mm',
								'harga'=> '350000',
								),
								'pv18'=>array(
								'text'=>'PVC 18 mm',
								'harga'=> '400000',
								),
								
								
								// 2
								'ak2'=>array(
								'text'=>'Akrilik 2 mm',
								'harga'=>'260470',
								),
								'ak3'=>array(
								'text'=>'Akrilik 3 mm',
								'harga'=>'334890',
								),
								'ak5'=>array(
								'text'=>'Akrilik 5 mm',
								'harga'=>'595360',
								),
								'ak10'=>array(
								'text'=>'Akrilik 10 mm',
								'harga'=>'1488400',
								),
								'ak20'=>array(
								'text'=>'Akrilik 20 mm',
								'harga'=>'2604700',
								),
								
								// 3
								'acp4'=>array(
									'text'=>'ACP 4 / 5 mm',
									'harga'=>'300000',
									// 'harga2'=>'475000',
								),
								
							);
							
							$dataUkuran = array(
								array(
								'vl'=>'1',
								'text'=>'1,22 x 2,44 mm',
								),
								array(
								'vl'=>'2',
								'text'=>'1,22 x 1,22 mm',
								),
							);
							
							$data_home = array();
							if($_POST['submit'] == ' '):
							//exit;
							// t_nama_1, t_telp_7, t_email_2, t_alamat_1, t_jenis_pekerjaan_1, s_bahan_1, s_ukuran_1, t_jumlah_7 , t_kota_1, 
								$data_home = array(
									't_nama_1'=> $_POST['name'],
									't_telp_7'=> $_POST['telp'],
									't_email_2'=> $_POST['email'],
									't_alamat_1'=> $_POST['alamat'],
									't_jenis_pekerjaan_1'=> 'Potong CNC',
									's_bahan_1'=>$_POST['bahan'],
									's_ukuran_1'=>$_POST['ukuran'],
									't_jumlah_7'=>$_POST['jumlah'],
								);
								$input = $data_home;
							endif;
							?>
				
				<div class="text-cont-inside" style="padding-left: 0px; margin-left: 0px;">
				<p class="myriadproad" style="padding-bottom: 0px;">Silahkan isi form di bawah ini, dan kami akan segera merespon pesanan anda.</p>
				<div class="success-form">
						<?php if (isset($berhasil)): ?>
							<p>Thank you for ordering us, we will respond to you shortly</p>
							<?php unset($_SESSION['data']); ?>
							<?php endif; ?>
					</div>
					<div class="error-form"><?php if ($error): ?>
						<p><?php echo $error; ?></p>
					<?php endif ?></div>
					<br style="clear: both; " />
				<div class="myriadproad" style="width: 670px;">
				<form action="" id="pesan_oncnc" method="POST" enctype="multipart/form-data">
					<ul class="form2">
						<li><label>Nama <span class="required">*</span></label><input class="validate[required]" type="text" name="t_nama_1" value="<?php echo $input['t_nama_1'] ?>"></li>
						<li><label>Telephone <span class="required">*</span></label><input class="validate[required]" type="text" name="t_telp_7" value="<?php echo $input['t_telp_7'] ?>"></li>
						<li><label>Kota</label><input type="text" class="validate[required]" name="t_kota_1" value="<?php echo $input['t_kota_1'] ?>"></li>
						<li><label>Jenis Pekerjaan</label><input type="text" placeholder="potong cnc" name="t_jenis_pekerjaan_1" value="<?php echo $input['t_jenis_pekerjaan_1'] ?>"></li>
						<li><label>Ukuran <span class="required">*</span></label>
							<select onChange="javascript:changeHarga();" class="validate[required]" name="s_ukuran_1" style="width: 176px; height: 25px;">
							<option value="0">-- ukuran --</option>
							<?php foreach ($dataUkuran as $key => $vUk): ?>
								<option <?php if($vUk['vl'] == $_POST['ukuran']): echo 'selected="selected"'; endif; ?> value="<?php echo $vUk['vl'] ?>"><?php echo $vUk['text'] ?></option>
							<?php endforeach ?>
							</select></li>
					</ul>
					<ul class="form2">
						<li><label>Email <span class="required">*</span></label><input type="text" class="validate[required]" name="t_email_2" value="<?php echo $input['t_email_2'] ?>"></li>
						<li><label>Alamat <span class="required">*</span></label><input type="text" class="validate[required]" name="t_alamat_1" value="<?php echo $input['t_alamat_1'] ?>"></li>
						<li><label>Propinsi</label><input type="text" class="validate[required]" name="t_propinsi_1" value="<?php echo $input['t_propinsi_1'] ?>"></li>
						<li><label>Bahan/Material <span class="required">*</span></label><select class="validate[required]" name="s_bahan_1" onChange="javascript:changeHarga();" style="width: 176px; height: 25px;">
							<option value="0">-- bahan --</option>
							<?php foreach ($dataBahan as $key => $value): ?>
								<option value="<?php echo $key.'-'.$value['harga'] ?>" <?php if($key.'-'.$value['harga'] == $_POST['bahan']): echo 'selected="selected"'; endif; ?>><?php echo $value['text'] ?></option>
							<?php endforeach ?>
							</select></li>
						<li><label>Jumlah</label><input class="validate[required]" type="text" onKeyup="javascript:changeHarga();" name="t_jumlah_7" value="<?php echo $input['t_jumlah_7'] ?>" style="width: 150px; margin-right: 5px;"> PCS</li>
					</ul>
					<ul class="form" style="margin-bottom: 0px;">
						<?php
						// perkiraan biaya
						$harga_bahan = '';
						$harga_bahan = explode('-', $_POST['bahan']);
									
						if($_POST['ukuran'] == 1):
							if ($harga_bahan[0] == 'acp4') {
								$harga =  (475000)*$_POST['jumlah'];
							}else{
								$harga =  ($harga_bahan[1]*2)*$_POST['jumlah'];
							}
						else:
							$harga =  $harga_bahan[1]*$_POST['jumlah'];
						endif;
						
						?>
						<li><label style="width: 105px;">Perkiraan Biaya <span class="required">*</span></label><input type="text" name="t_biaya_0" disabled="true" style="color: #000; font-weight: bold;" value="<?php echo number_format($harga); ?>" /><input type="hidden" name="t_biaya2_0" value="<?php echo number_format($harga); ?>" /></li>
						<br /><li><label style="width: 103px;"><!-- <div style="float: left; font-size: 16px; line-height: normal; color:#000000; font-weight: bold; "> -->Upload Design<!-- </div> --></label><input type="file" name="files" /></li>
						<!--  <div class="letak_gambar"> -->
							<?php /*<div class="image-kiri">
								<div class="judl-img-f">Design terpilih:</div>
									<div class="hide-image-ajax"></div>
								<div id="imageajax" class="img-kiri-f">
									<img id="image-ajaxku" src="images/jpeg.jpg" name="image_for_up" />
								</div>
							</div>*/ ?>
							<!--<div class="brows-kanan">-->
								<!--<span>Upload File .*( AI, Coreldraw, PDF )</span>-->
								
							<!-- </div> -->
						<!-- </div> -->
						<?php /*<div class="ganti-design" id="imageajax" style="cursor: pointer;">ganti design</div>*/ ?>
						<br style="clear: both;">
						
						<div class="submit-pesan"><input type="submit" name="b_submit_0" value="Submit" style="margin-right: 10px;">	<input type="reset" name="reset" value="Reset" /></div>
					</ul>
				</form>
				<?php session_destroy(); ?>
				</div>
				<br style="clear: both;" />
				<div style="height: 10px;"></div>
				<p class="myriadproad" style="padding-bottom: 7px;">Silahkan email ke &nbsp;<a href="mailto:info@dextercut.com">info@dextercut.com</a>&nbsp; atau <a href="contact.php">hubungi kami</a> jika anda ingin dilayani oleh konsultan kami. </p><p  class="myriadproad" style="color: #000000; padding-bottom: 0px;">Syarat dan Ketentuan:<br />
					* Hanya menerima file vektor<br />
					* Harga di luar bahan baku, minimum order 2.8 m2.<br />
* Harga tidak termasuk biaya setting gambar, file yang diterima adalah file vektor. Biaya setting dan repro akan &nbsp;&nbsp;&nbsp;dikenakan untuk file yang belum siap untuk CNC.<br />
* FREE Ongkos kirim Surabaya, dengan jumlah diatas 10 m2.
					</p>
					<br style="clear: both;" />
				<!-- AJAX hide content -->
				<!-- <script type="text/javascript">
								$(document).ready(function() {
								// Menampilkan Foto
									var jumlah;
									
									function getdata(page){
										$.ajax({
										  type: "GET",
										  url: 'file_data_gambar.php',
										  data: {id: page},
										  dataType: "json",
										  success: function(data) {
											$('#fledsdfsdf').html(data.str);
											//alert('Load was performed.');
											$('#jumlahdata').val(data.jml);
											$('#pagedata').val(page);
										  }
										});
									}
									
									getdata(0);
									
									$('#tombol_mundur').live('click', function(){
										var paged = parseInt($('#pagedata').val()); 
										//alert(paged-1);
										getdata(paged-1);
										
										return false;
									});
									
									$('#tombol_maju').live('click', function(){
										var paged = parseInt($('#pagedata').val()); 
										//alert(paged+1);
										getdata(paged+1);
										return false;
									});
									
									// Mengganti src image parent
									$('.link_dt_thumb').live('click', function(){
										var dt_atr = $(this).attr("href");
										$('#image_big').attr("src", dt_atr);
										$('#image_big').attr("data-img", $(this).attr("data-img"))
										return false;
									});
									
									// memilih foto
									$('#pilh_fotom').live('click', function(){
										var dt_pilih = $('#image_big').attr("data-img");
										dt_pilih = 'image.php/'+dt_pilih+'?width=276&height=169&cropratio=276:169&image=/images/gmbr/'+dt_pilih;
										$('#image-ajaxku').attr("src", dt_pilih);
										$.fancybox.close();
										return false;
									});
								});
						</script> -->
						
						<script type="text/javascript">
							//$(document).ready(function() {
								function changeHarga(){
									// t_nama_1, t_telp_7, t_email_2, t_alamat_1, t_jenis_pekerjaan_1, s_bahan_1, s_ukuran_1, t_jumlah_7 , t_kota_1,
									var harga = $('select[name="s_bahan_1"]').val().split("-");
									var ukuran = $('select[name="s_ukuran_1"]').val();
									var jumlah = $('input[name="t_jumlah_7"]').val();
									//perhitungan

									// alert(harga[1]);
									// return false;
									if(ukuran == 1){
										if (harga[0] = 'acp4') {
											var hasil = 475000*jumlah;
										}else{
											var hasil = (harga[1]*2)*jumlah;
										}
										//hasil = number_format(hasil);
										$('input[name="t_biaya_0"]').val(hasil);
										$('input[name="t_biaya2_0"]').val(hasil);
										return true;
									}else{
										var hasil = harga[1]*jumlah;
										//hasil = number_format(hasil);
										$('input[name="t_biaya_0"]').val(hasil);
										$('input[name="t_biaya2_0"]').val(hasil);
										return true;
									}
									
								}
								
								
							//});
						</script>
						<div id="content_hide" style="display: none;">
							<style type="text/css">
								#content_hide{background-color: #D5D5D5; padding: 20px;}
								
								.box-slider-galelry{width:100%; height: 100%;}
								.img-class-big{width: 348px; height: 227px; margin: 0 auto; background-color:#000000; }
								.slide-gl-class{position: relative; margin: 0 auto; width: 350px; height: 77px; margin-top: 10px;}
								.panah-kiri{position:absolute; top:15px; left: -33px; width:30px; height: 30px;}
								.panah-kanan{position:absolute; top:15px; right: -33px; width:30px; height: 30px;}
								
								.list-gl-gallery{margin-left: 3px; width: 352px; height: 77px;}
								.list-gl-gallery .foto-gallery-thumb{float:left; width: 62px; height:62px; border:1px solid #FFFFFF; }
								.foto-gallery-thumb{margin-right: 6px;}
							</style>
							
							<div class="box-slider-galelry">
								<div class="img-class-big"><img id="image_big" data-img="alupanel1.jpg" src="image.php/alupanel1.jpg?width=348&amp;height=227&amp;cropratio=348:227&amp;image=/images/gmbr/alupanel1.jpg" /></div>
								<div class="clear"></div>
								<div class="slide-gl-class">
								<input type="hidden" id="jumlahdata" value=" " />
								<input type="hidden" id="pagedata" value=" " />
									<div class="panah-kiri"><a href="#" id="tombol_mundur"><img src="images/arrrow_kiri.png" /></a></div>
									<div class="list-gl-gallery" id="fledsdfsdf">
										
										<!--<div class="foto-gallery-thumb"><img src="image.php/cutting_hm.jpg?width=62&amp;height=62&amp;cropratio=62:62&amp;image=/images/ct-aplikasi/cutting_hm.jpg" /></div>-->
									
									</div>
									<div class="panah-kanan"><a href="#" id="tombol_maju"><img src="images/arrrow_kanan.png" /></a></div>
								</div>
								<div class="bt_pil_foto" style="text-align: center;"><a href="" id="pilh_fotom"><img src="images/pilih_gambar.png" /></a></div>
							</div>
							
						</div>
						
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