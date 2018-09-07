<div class="height-15"></div>
<div class="popup-logo">
	<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-popup-glow.jpg" alt="">
</div>
<div class="popup-link-header">
	Product Detail &gt; Check Out
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="product-detail-container">
	<div class="product-detail-container2">


		<div class="box-in-succes-cart" style="width: 750px;">
			<div class="inner">
												
				<div class="t-box-succes-cart">
					<div class="t-top-incl">
						<div class="height-25"></div>
						<p>
							Terima Kasih Anda telah membeli produk Glow68.
Kami akan memproses kiriman setelah Anda mengkonfirmasikan
pembayaran sebagai berikut...
						</p>
					</div>
					<div class="height-35"></div>
					<div class="t-total-incl">
					
						<div class="box-jumlah">
							JUMLAH YANG HARUS DITRANSFER
							<br>
							<span>IDR <?php echo number_format($tot) ?></span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="height-15"></div>
				</div>
				<div class="clear"></div>
				<div class="line-success-cart"></div>
				<div class="t-box-succes-cart">
					<div class="t-middle-incl">
						<div class="height-25"></div>
						<p>Pembayaran dapat dilakukan di nomor Bank berikut:</p>
						<div class="height-35"></div>
						<div style="margin-left: -30px;">
							<div class="box-banklist">
							<?php foreach ($bank as $key => $v_bank): ?>
								<div class="list-bank">
									<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(165,65,'/images/bank/'.$v_bank->image,array('method'=>'resize','quality'=>'90')) ?>" alt="">
									<div class="height-10"></div>
									<span>
										No Rek. <?php echo $v_bank->no_rek; ?> <br>
										a.n. <?php echo $v_bank->name; ?>
									</span>
								</div>
							<?php endforeach ?>
							</div>
						</div>
						<div class="clear height-5"></div>
					</div>
					<div class="height-15"></div>
				</div>
				<div class="clear"></div>
				<div class="line-success-cart"></div>
				<div class="t-box-success-cart">
					<div class="t-konfirmasi">
						<div class="height-25"></div>
						<span>Konfirmasi pembayaran Anda ke:</span>
						<div class="height-15"></div>
						<div class="height-3"></div>
						<div class="email-clnt">
							<?php echo $this->setting['konfirmasi_pembayaran'] ?>
						</div>
						<div class="height-40"></div>
						<div class="height-15"></div>
						<div class="btn-backto-buy">
							<a href="<?php echo CHtml::normalizeUrl(array('/')); ?>" class="btn btn-orange2 close-fancybox">Kembali Belanja</a>
						</div>
					</div>
				</div>

				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="height-15"></div>
		</div>



		<div class="clear"></div>
	</div>
</div>