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
                    <div class="titlebox-featured" alt="title-product">PAYMENT</div>
                    <div class="fright brd-linksetcart"><b>REVIEW SHOPPING CART</b> --- <b>PERSONAL / SHIPPING INFO</b> --- <b>PAYMENT</b> --- DONE</div>
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
							<div class="height-50"></div>
							<div class="height-40"></div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="basic-information">
										<table>
											<tr>
												<td width="50"><input type="radio" value="0" name="OrOrder[payment_method]"></td>
												<td><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/bank-transfer.jpg" alt=""></td>
											</tr>
										</table>
									</div>

								</div>
								<?php /*
								<div class="col-md-6">
									<div class="basic-information">
										<table>
											<tr>
												<td width="50"><input type="radio" value="1" name="OrOrder[payment_method]"></td>
												<td><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/kredit-card.jpg" alt=""></td>
											</tr>
										</table>
									</div>

								</div>
								*/ ?>
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




