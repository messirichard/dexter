<div class="height-15"></div>
<div class="popup-logo">
	<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-popup-glow.jpg" alt="">
</div>
<div class="popup-link-header">
	Product Detail &gt; <?php echo $model->title ?> &gt; Add to Cart
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="product-detail-container">
	<div class="product-detail-container2">
		<div class="product-image">
			<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(430,2000, '/images/product/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>" alt=""><br/>
		</div>
		<div class="product-detail">
			<div class="height-50"></div>
			<div class="height-50"></div>
			<form action="<?php echo CHtml::normalizeUrl(array('/cart/add')); ?>" class="form-add-cart">
				<dl class="product-dl-style">
					<dt class="margin-bottom-20">1 Item(s) has been added to your cart: </dt>

					<dt class="name" style="margin-bottom: 15px;"><?php echo $model->title ?> add to cart</dt>

					<dt class="price margin-bottom-10">Price: Rp. <?php echo number_format($model->price) ?></dt>
					<?php /*
					<?php foreach ($labelOption as $key => $value): ?>
					<dt><?php echo $value['option'] ?>: <?php echo $value['optionValue'] ?></dt>
					<?php endforeach ?>
					*/ ?>
					<?php echo Product::model()->renderLabelOption2($cart['option']) ?>
					<dt class="margin-bottom-20">Qty: <?php echo $qty; ?></dt>

				</dl>
				<a href="<?php echo CHtml::normalizeUrl(array('/cart/view')); ?>" class="btn btn-orange2 button-view-cart">View Cart</a>
				<a href="#" class="btn btn-orange2 close-fancybox">Back</a>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>