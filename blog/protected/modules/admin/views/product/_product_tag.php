<h3>Pelanggan Juga Membeli</h3>
<h4>* Klik pada gambar untuk mengedit</h4>
<div>
	<?php for ($i=1; $i <= 4; $i++) { ?>
	<?php
	$model = Product::model()->findByPk($setting['pelanggan'][$i]);
	?>
	<div class="pelanggan-list">
		<a data-id="<?php echo $i ?>" class="pelanggan-add pelanggan-add-<?php echo $i ?>" href="#myModal" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
		<input type="hidden" value="<?php echo $setting['pelanggan'][$i] ?>" name="Product[setting][pelanggan][<?php echo $i ?>]" id="Product_setting_pelanggan_<?php echo $i ?>">
	</div>
	<?php } ?>
	<div style="clear: both;"></div>
</div>
<h3>Produk Terkait</h3>
<h4>* Klik pada gambar untuk mengedit</h4>
<div>
	<?php for ($i=1; $i <= 4; $i++) { ?>
	<?php
	$model = Product::model()->findByPk($setting['product'][$i]);
	?>
	<div class="product-list">
		<a data-id="<?php echo $i ?>" class="product-add product-add-<?php echo $i ?>" href="#myModal2" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
		<input type="hidden" value="<?php echo $setting['product'][$i] ?>" name="Product[setting][product][<?php echo $i ?>]" id="Product_setting_product_<?php echo $i ?>">
	</div>
	<?php } ?>
	<div style="clear: both;"></div>
</div>
