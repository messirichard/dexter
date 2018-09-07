<link rel="stylesheet" href="js/validation/css/validationEngine.jquery.css" type="text/css"/>
	<script src="js/validation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
<div class="kalkulator-warp">
				<div style="margin: 21px 0px 0px 0px;">
					<p class="myriadpro" style="text-align: center; font-size: 17px;">Kalkulator CNC</p>
					<div class="form-kalkulator">
						<div style="height: 10px;"></div>
						<form name="cek_estimasi" id="cek_estimasi" method="POST" action="pesan.php" >
						<div><input type="text" class="validate[required]" name="name" value="" placeholder="Nama" /></div>
						<div><input type="text" class="validate[required]" name="telp" value="" placeholder="Telp" /></div>
						<div><input type="text" class="validate[required]" name="email" value="" placeholder="Email" /></div>
						<div><input type="text" class="validate[required]" name="alamat" value="" placeholder="Alamat" /></div>
						<div>
							<select name="jenis" class="validate[required]">
								<option value="">Pilih Jenis Pekerjaan</option>	
								<option value="1">Potong CNC</option>	
							</select>
						</div>
						<div>
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
							
							?>
							<select name="bahan" class="validate[required]">
								<option value="">Bahan / Material</option>
								<!-- bahan produk -->
								<?php foreach ($dataBahan as $key => $v): ?>
									<option value="<?php echo $key.'-'.$v['harga'] ?>"><?php echo $v['text'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div>
							<select name="ukuran" class="validate[required]">
								<option value="">Ukuran</option>
									<?php foreach ($dataUkuran as $key => $vuk): ?>
									<option value="<?php echo $vuk['vl'] ?>"><?php echo $vuk['text'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div> Jumlah&nbsp; <input type="text" class="validate[required]" name="jumlah" value="" style="width: 100px;text-align: center;" />&nbsp; pcs</div>
						<div><input type="submit" name="submit" value=" " /></div>
						</form>
						<div style="height: 5px;"></div>
						<p class="myriadproad" style="text-align: center; font-size: 12px; color: #575757;">Untuk pesanan dalam jumlah bervariasi<br />
silahkan gunakan<a href="pesan.php"> form pesanan online</a>.</p>
						
					</div>
				</div>
			</div>
			
<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery("#cek_estimasi").validationEngine();

		});
</script>