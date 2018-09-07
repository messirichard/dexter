<div class="border-orange">
	<div class="padding-40">
		<div class="add-cart-container">
			<div class="add-cart-image">
				<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(170,170, '/images/product/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
			</div>
			<div class="add-cart-content">
				<div class="add-cart-qty">
					<?php echo $qty ?> produk:
				</div>
				<h1><?php echo $data->title ?></h1>
				<h2>Telah berhasil ditambahkan ke cart (keranjang belanja)</h2>
                <a href="#" onclick="$.fancybox.close();return false;" class="btn btn-add-to-cart">
                    Lanjut Belanja
                </a>
                <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>" class="btn btn-add-to-cart">
                    Lihat Cart
                </a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>