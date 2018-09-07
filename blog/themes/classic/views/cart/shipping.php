<?php
$this->breadcrumbs = array(
    'Shipping',
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
					<div id="payment_progress">
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
			<h1 class="title-inside-page">Shipping</h1>
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
									<a href="#">Color: <?php echo $value['option'] ?></a>
								</p>

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
				<?php 
				$berat = 0;
				$berat = $berat + ($value['optional']['berat']*$value['qty']);
				?>
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
									<tr id="subtotal">
										<td class="subtotals">
											<div class="bold">Perkiraan berat total</div>
										</td>
										<td class="price">
											<div class="bold">
											<?php echo Cart::gramToKg($berat) ?> Kg
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
										<td class="price" id="shipping">Choose Shipping Area</td>
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
										<?php echo Cart::money($total) ?>.-
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
					<td class="item checkout_title">SHIPPING</td>
					<td>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">
						<div class="basic-information">
							<?php echo $form->errorSummary($model); ?>
							<?php if (Yii::app()->user->isGuest): ?>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
							    </div>
							</div>
							<?php endif ?>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'first_name', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'last_name', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'address', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'address', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'city', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'city', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'postcode', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'postcode', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'province', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'province', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'hp', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'hp', array('class'=>'form-control')); ?>
							    </div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model, 'bb', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'bb', array('class'=>'form-control')); ?>
							    </div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'delivery_from', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->dropDownList($model, 'delivery_from', array(
							    	'SURABAYA'=>'SURABAYA',
							    	'JAKARTA'=>'JAKARTA',
							   	), array('empty'=>'---- Choose ----', 'class'=>'form-control')); ?>
							    </div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'delivery_to', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
								<?php 
								  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
								      'attribute'=>'delivery_to',
								        'model'=>$model,
								        'sourceUrl'=>array('cart/aclist'),
								        'name'=>'kota',
								        'options'=>array(
								        	'minLength'=>'1',
								        	'select'=>'js:function( event, ui ) {
									            $.ajax({
													type: "POST",
													url: "'.CHtml::normalizeUrl(array('/cart/accost')).'",
													dataType: "json",
													data: { kota: $(this).val(), berat: '.$berat.', from: $("#Order_delivery_from").val() }
													}).done(function( msg ) {
														hiddenArray = msg;
														var str = "<option value=\'\'>---- Choose ----</option>";
														for (i=0; i < msg.length ; i++) { 
														//alert(msg[i].service_code);
															str = str + "<option value=\'"+msg[i].service_code+"\'>"+msg[i].service+" ("+msg[i].value+")</option>";
														}
														$("#Order_delivery_package").html(str);
									            	})
								        	}',
								        	'change'=>'js:function( event, ui ) {
												//alert("ok");
								        	}',
								        ),
								        'htmlOptions'=>array(
								          // 'size'=>45,
								          // 'maxlength'=>45,
								          'id'=>'Order_delivery_to',
								          'note'=>'',
								          'class'=>'form-control'
								        ),
								)); ?>
								<p style="margin: 0px;">* Tunggu sampai list tujuan muncul</p>

							    </div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'delivery_package', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->dropDownList($model, 'delivery_package', array(), array('empty'=>'---- Choose ----', 'class'=>'form-control')); ?>
								<p style="margin: 0px;">* Pilih tujuan hingga muncul paket, jika tidak terdaftar pilih secara random dan konfirmasikan kepada kami</p>
							    </div>
							</div>
							<?php echo $form->hiddenField($model, 'delivery_price'); ?>

							 
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
    	<button type="submit" class="btn btn-primary">PROCEED TO PURCHASE</button>
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
	function formatMoney(n ,c, d, t){
    var c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
	// $('#Order_delivery_to').change(function() {
	// 	$.post( "<?php echo CHtml::normalizeUrl(array('cart/pricedelivery')); ?>", { to: $(this).val(), from: $('#Order_delivery_from').val() }, function( data ) {
	//         total = parseInt($('#total').val());
	//         price = parseInt(data);
	//         $('#shipping').html('$'+formatMoney(price, 0, '.', ',') + '.- ');
	//         $('#total_akhir').html('$'+formatMoney(total + price, 0, '.', ',') + '.- ');
	//     });
	// })
	$("#Order_delivery_package").live('change',function(){
        total = parseInt($('#total').val());
		var harganya = 0;
		for (i=0; i < hiddenArray.length ; i++) { 
			if(hiddenArray[i].service_code==$(this).val()){
				harganya = hiddenArray[i].value*1;
			}
		}
		
        $('#shipping').html('IDR '+formatMoney(harganya, 0, '.', ',') + '.- ');
        $('#total_akhir').html('IDR '+formatMoney(total + harganya, 0, '.', ',') + '.- ');
        $('#Order_delivery_price').val(harganya);
		// $('#view_ongkir').html("Rp. "+harganya.formatMoney(2,'.',','));
		// $('#ContactForm_ongkir').val(harganya);
		// hitung();
	});
	// $('#Order_delivery_from').change(function() {

	// 	$.post( "<?php echo CHtml::normalizeUrl(array('cart/getTo')); ?>", { from: $(this).val() }, function( data ) {
	// 		$('#Order_delivery_to').html(data)
	//     });
	// })

</script>