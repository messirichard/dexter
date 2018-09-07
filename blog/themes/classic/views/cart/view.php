<div class="height-15"></div>
<div class="popup-logo">
	<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-popup-glow.jpg" alt="">
</div>
<div class="popup-link-header">
	Product Detail &gt; Add to Cart
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="product-detail-container">
	<div class="product-detail-container2">
		<div class="tb-cart-detail">
			<table class="cartlist">
				<thead>
					<tr>
						<th>Shopping Items:</th>
						<th>
							<div align="center">
								Quantity
							</div>
						</th>
						<th>
							<div align="center">
								Price
							</div>
						</th>
						<!-- <th>&nbsp;&nbsp;&nbsp;</th> -->
					</tr>
				</thead>
				<tbody>
						<?php $tot; ?>
						<?php foreach ($cart as $key => $value) { 
							$id = abs((int) ($value['id']) );
							$product = Product::model()->findByPk($id); 
							// $labelOption_ct = ProductOption::model()->getLabelOption($value['option']);
							?>
					<tr>
						<td class="dt-vwproduct">
							<div class="c-viewproduct">
								<div class="img">
									<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(65,65,'/images/product/'.$product->image,array('method'=>'adaptiveResize','quality'=>'90')) ?>" alt="<?php echo $product->title; ?>">
								</div>
								<div class="t-text">
									<?php echo $product->title; ?>
									<div class="clear"></div>
									<div class="height-5"></div>										
									<div class="option-view-tx">
										<?php
										$totalku = 0;
										?>
										<?php /*
										<?php foreach ($labelOption_ct as $key => $va): ?>
										<span class="name"><?php echo $va['option'] ?>: </span><?php echo $va['optionValue'] ?>
										<br>
										<?php
										$totalku += $va['total'];
										?>
										<?php endforeach ?>
										*/ ?>
										<?php echo Product::model()->renderLabelOption($value['option']) ?>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</td>
						<td>
							<div align="center">
								<div class="quantity-c">
									<form method="post" class="update-cart-submit" id="form_qty_<?php echo $product->id ?>" action="<?php echo CHtml::normalizeUrl(array('/cart/add')); ?>">
										<input type="text" value="<?php echo $value['qty'] ?>" name="qty" class="input-small">
										<input type="hidden" value="<?php echo $product->id ?>" name="id">
										<div class="upd-q"><a data-id="<?php echo $product->id ?>" class="form-update-cart" href="#"><i class="icon-updt"></i></a></div>
										<div class="canc-q"><a class="button-cart-delete" href="<?php echo CHtml::normalizeUrl(array('/cart/cartdelete', 'id'=>$product->id)); ?>"><i class="icon-canc"></i></a></div>
									</form>
								</div>
							</div>
						</td>
						<td>
							<div align="center">
								IDR <?php echo number_format(($product->price*$value['qty'])+($totalku*$value['qty'])); ?>
							</div>
						</td>
						
					</tr>
							<?php $tot = $tot + ($product->price*$value['qty'])+($totalku*$value['qty']) ?>
						<?php  } ?>
					<tr class="total">
						<td>
							&nbsp;
						</td>
						<td>
							<div align="center">
								TOTAL
							</div>
						</td>
						<td>
							<div align="center" class="n-total">
								IDR <?php echo number_format($tot); ?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="clear"></div>
		<div align="right">
		<a href="<?php echo CHtml::normalizeUrl(array('/cart/checkout')); ?>" class="btn btn-orange2 button-view-cart">Check Out</a>
		</div>
	</div>
</div>