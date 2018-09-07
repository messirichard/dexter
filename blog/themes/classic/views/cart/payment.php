<?php
$this->breadcrumbs = array(
    'Payment',
);
?>
<section class="promosi-banner2">
    <div class="prelatif container">

<div class="height-30"></div>
<div class="breadcrump-container">
    <div class="pull-left">
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'separator'=>'',
            'homeLink'=>CHtml::link('<i class="icon-home-breadcrumb"></i>',array('/home/index')),
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    </div>
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product content-text">
    <div class="padding-15">
	

	<div class="inside-content">
		
		<div class="clear height-20"></div>
		<div>
			<div id="progress_container">
				<div class="progress_text">
					<a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>" id="cart_progress" class="in_progress">
						<div class="mark">
							<div class="co_progress_number">1</div>
							<div class="progress_line half_right"></div>
						</div>
						SHOPPING CART
					</a>
				</div>
				<div class="progress_text">
					<a href="<?php echo CHtml::normalizeUrl(array('/cart/shipping')); ?>" id="shipping_progress" class="in_progress">
						<div class="mark">
							<div class="co_progress_number">2</div>
							<div class="progress_line"></div>
						</div>
						SHIPPING
					</a>
				</div>
				<div class="progress_text">
					<div id="payment_progress" class="in_progress">
						<div class="mark">
							<div class="co_progress_number">3</div>
							<div class="progress_line"></div>
						</div>
						PAYMENT
					</div>
				</div>
				<div class="progress_text">
					<div id="confirmation_progress">
						<div class="mark">
							<div class="co_progress_number">4</div>
							<div class="progress_line half_left"></div>
						</div>
						CONFIRMATION
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- /. Start Content About -->
		<div class="m-ins-content detail-shopcart">
			<h1 class="title-inside-page">Payment</h1>
			<div class="clear height-3"></div>
			<div class="lines-green"></div>
			<div class="clear height-20"></div>
<?php if (count($data)>0): ?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'shipping-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

<div id="order_summary">
	<div id="cart_new cart">
		<div class="ajax_notifications">
			<p></p>
		</div>
		<table class="items_large">
			<thead>
				<tr>
					<td class="item checkout_title">Your Order</td>
					<td>
						<div class="float_right"><a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>">Edit</a></div>
					</td>
				</tr>
			</thead>
			<tbody>
	    		<?php $total = 0 ?>
	    		<?php foreach ($data as $key => $value): ?>
				<tr>
					<td colspan="2" class="item">
						<div class="cart_image float_left">
							<a href="#">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(105,72, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
							</a>
						</div>
						<div class="item_name float_right">
							<div id="product_name">
								<span class="brand bold">
								<a href="#"><?php echo $value['name'] ?></a></span>
								<?php if ($value['option'] != ''): ?>
								<p class="name">
									<a href="#">Type: <?php echo $value['option'] ?></a>
								</p>

								<?php $totalOption = 0; ?>

								<?php endif ?>
								<p>
									<?php echo $value['qty'] ?> item
								</p>
								<p class="heading">
								<?php echo Cart::money($subTotal = $value['price']) ?>
								</p>
								<p class="float_left bold">Total</p>
								<p class="float_right"><?php echo Cart::money($subTotal = ($value['price'] + $totalOption) * $value['qty']) ?>.-</p>
							</div>
						</div>
						<div class="clear"></div>
						<div class="form_separator2"></div>
					</td>
				</tr>
	    		<?php $total = $total + $subTotal ?>
	    		<?php endforeach ?>

				<tr>
					<td colspan="2">
						<div class="totals">
							<table class="totals">
								<tbody>
									<tr id="subtotal">
										<td class="subtotals">
											<div class="bold">Subtotal</div>
										</td>
										<td class="price">
											<div class="bold">
											<?php echo Cart::money($total) ?>.-
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div id="shipping_cost_update" class="hidden">
											<p></p>
											</div>
										</td>
									</tr>
									<tr>
										<td class="subtotals">Shipping Cost</td>
										<td class="price"><?php echo Cart::money($orderDetail['delivery_price']) ?>.-</td>
									</tr>
									<tr>
										<td colspan="2">
										<div class="form_separator"></div>
										</td>
									</tr>
									<tr class="nett">
										<td class="subtotals">
										Total
										</td>
										<td class="price" id="total_akhir">
										<?php echo Cart::money($total + $orderDetail['delivery_price']) ?>.-
										</td>
									</tr>
								</tbody>
							</table>
							<div class="clear_float"></div>
							<input type="hidden" name="total" id="total" value="<?php echo $total ?>">

						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

</div>			

<div id="shipping_summary">
	<div id="cart_new cart">
		<div class="ajax_notifications">
			<p></p>
		</div>
		<table class="items_large">
			<thead>
				<tr>
					<td class="item checkout_title">PAYMENT DETAILS</td>
					<td>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">
						<div class="basic-information">
							<table>
								<tr>
									<td width="50"><input type="radio" value="bank local" name="Order[payment_method]"></td>
									<td><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/bank-transfer.jpg" alt=""></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>

			</tbody>
		</table>
	</div>

</div>
<div class="clear"></div>
<div class="height-10"></div>
<div class="control-group right">
    <label class="control-label" for="input"></label>
    <div class="controls">
    	<button type="submit" class="btn btn-primary">CONFIRM</button>
    </div>
</div>
<?php $this->endWidget(); ?>
<?php else: ?>
	<h3>Shopping cart is empty</h3>
<?php endif ?>

			<div class="clear height-25"></div>
			<div class="clear"></div>
		</div>
		<!-- /. End Content About -->

		<div class="clear height-15"></div>

	<div class="clear"></div>
	</div>
	<div class="clear"></div>



    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="height-30"></div>

</section>




<script type="text/javascript">
	$('.btn-edit-cart').live('click', function() {
		obj = $(this).parent().parent();
		obj.find('.quantity').html(''+
		'<select name="qty" class="span1 select_qty">'+
		'	<?php for ($i=1; $i <= 20; $i++) { ?>'+
		'	<option value="<?php echo $i ?>"><?php echo $i ?></option>'+
		'	<?php } ?>'+
		'</select>');
		return false;
	})
	$('.select_qty').live('change', function() {
		$(this).parent().parent().parent().find('form').submit();
	})
</script>




