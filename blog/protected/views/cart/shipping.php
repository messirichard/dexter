<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>e-STORE</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
    <div class="prelatife container">
        
        <div class="clear height-20"></div>
        <div class="height-3"></div>
        <div class="prelatife">
            <div class="box-featured-latestproduct">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product">SHIPPING INFO</div>
                    <div class="fright brd-linksetcart"><b>REVIEW SHOPPING CART</b> --- <b>PERSONAL / SHIPPING INFO</b> --- PAYMENT --- DONE</div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>
                    <!-- start shopcart box -->
                    <?php if (count($data)>0): ?>
                    <div class="padding-32 box-shipping-info">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'shipping-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
							<div class="basic-information">
							<?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
							<?php if ( ! $login_member): ?>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-4 control-label')); ?>
							    <div class="col-sm-7">
							    <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
							    </div>
							</div>
							<?php endif ?>
							</div>
								<h3>Payment</h3>
								<div class="basic-information">
								<div class="height-20"></div>
                            	<input type="checkbox" id="payment_check" value="1"> Use my personal details for payment details
								<div class="height-20"></div>
                        <div class="row">
                            <div class="col-md-6">

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_first_name', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'payment_first_name', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_last_name', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'payment_last_name', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_address_1', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'payment_address_1', array('class'=>'form-control')); ?>
									    </div>
									</div>


                            </div>
                            <div class="col-md-6">

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_city', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'payment_city', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_postcode', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'payment_postcode', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'payment_zone', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
                                        <?php echo $form->dropDownList($model, 'payment_zone',array(
                                            'Australian Capital Territory'=>'Australian Capital Territory',
                                            'New South Wales'=>'New South Wales',
                                            'Northern Territory'=>'Northern Territory',
                                            'Queensland'=>'Queensland',
                                            'South Australia'=>'South Australia',
                                            'Tasmania'=>'Tasmania',
                                            'Victoria'=>'Victoria',
                                            'Western Australia'=>'Western Australia',
                                            'Other'=>'Other',
                                        ), array('class'=>'form-control', 'empty'=>'Select State')) ?>
									    </div>
									</div>

                                

                            </div>
                        </div>


								</div>
								<h3>Shipping</h3>
								<div class="basic-information">
								<div class="height-20"></div>
                        		<input type="checkbox" id="shipping_check" value="1"> Use my personal details for shipping details
								<div class="height-20"></div>
                        <div class="row">
                            <div class="col-md-6">

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_first_name', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'shipping_first_name', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_last_name', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'shipping_last_name', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_address_1', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'shipping_address_1', array('class'=>'form-control')); ?>
									    </div>
									</div>

                            </div>
                            <div class="col-md-6">

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_city', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'shipping_city', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_postcode', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
									    <?php echo $form->textField($model, 'shipping_postcode', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
										<?php echo $form->labelEx($model, 'shipping_zone', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-7">
                                        <?php echo $form->dropDownList($model, 'shipping_zone',array(
                                            'Australian Capital Territory'=>'Australian Capital Territory',
                                            'New South Wales'=>'New South Wales',
                                            'Northern Territory'=>'Northern Territory',
                                            'Queensland'=>'Queensland',
                                            'South Australia'=>'South Australia',
                                            'Tasmania'=>'Tasmania',
                                            'Victoria'=>'Victoria',
                                            'Western Australia'=>'Western Australia',
                                            'Other'=>'Other',
                                        ), array('class'=>'form-control', 'empty'=>'Select State')) ?>
									    </div>
									</div>
                                

                            </div>
                        </div>


							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="basic-information">
										<div class="form-group">
											<?php echo $form->labelEx($model, 'phone', array('class'=>'col-sm-4 control-label')); ?>
										    <div class="col-sm-7">
										    <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
										    </div>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
								
							</div>
                    	<button type="submit" class="btn back-btn-primary-blue">Submit</button>

<?php $this->endWidget(); ?>
						<?php else: ?>
							<h3>Shopping cart is empty</h3>
						<?php endif ?>
                    <div class="clear height-35"></div>
                    </div>
                    <!-- end shopcart box -->
                    <div class="clear height-35"></div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="back-shadow-bottom-featproduct"></div>
        <div class="clear"></div>
        </div>

        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
    <div class="clearfix"></div>
</section>

<script type="text/javascript">
function fill_data_payment () {
	if($('#payment_check:checked').val()==1){
		$('#OrOrder_payment_first_name').val('<?php echo $user->first_name ?>');
		$('#OrOrder_payment_last_name').val('<?php echo $user->last_name ?>');
		$('#OrOrder_payment_address_1').val('<?php echo $user->address ?>');
		$('#OrOrder_payment_city').val('<?php echo $user->city ?>');
		$('#OrOrder_payment_postcode').val('<?php echo $user->postcode ?>');
		$('#OrOrder_payment_zone').val('<?php echo $user->province ?>');
	}else{
		$('#OrOrder_payment_first_name').val('');
		$('#OrOrder_payment_last_name').val('');
		$('#OrOrder_payment_address_1').val('');
		$('#OrOrder_payment_city').val('');
		$('#OrOrder_payment_postcode').val('');
		$('#OrOrder_payment_zone').val('');
	}
}
$('#payment_check').click(function(){
	fill_data_payment();
})

function fill_data_shipping () {
	if($('#shipping_check:checked').val()==1){
		$('#OrOrder_shipping_first_name').val('<?php echo $user->first_name ?>');
		$('#OrOrder_shipping_last_name').val('<?php echo $user->last_name ?>');
		$('#OrOrder_shipping_address_1').val('<?php echo $user->address ?>');
		$('#OrOrder_shipping_city').val('<?php echo $user->city ?>');
		$('#OrOrder_shipping_postcode').val('<?php echo $user->postcode ?>');
		$('#OrOrder_shipping_zone').val('<?php echo $user->province ?>');
	}else{
		$('#OrOrder_shipping_first_name').val('');
		$('#OrOrder_shipping_last_name').val('');
		$('#OrOrder_shipping_address_1').val('');
		$('#OrOrder_shipping_city').val('');
		$('#OrOrder_shipping_postcode').val('');
		$('#OrOrder_shipping_zone').val('');
	}
}
$('#shipping_check').click(function(){
	fill_data_shipping();
})
<?php if ( ! isset($_POST['OrOrder'])) { ?>
fill_data_payment();
fill_data_shipping();
<?php }; ?>

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