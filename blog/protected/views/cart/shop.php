<?php
$session = new CHttpSession;
$session->open();
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
        <div class="prelatife product-list-warp">
            <div class="box-featured-latestproduct" id="cart-shop">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product">SHOPPING CART</div>
                    <div class="fright brd-linksetcart"><b>REVIEW SHOPPING CART</b> --- PERSONAL / SHIPPING INFO --- PAYMENT --- DONE</div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>
                    <?php if (count($data)>0): ?>
                    <div class="padding-32">
                        <table class="table table-hover shopcart">
                        <thead>
                            <tr>
                                <td width="150">Item</td>
                                <td>&nbsp;</td>
                                <!-- <td>Option</td> -->
                                <td>Quantity</td>
                                <td>Total</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0 ?>
                            <?php foreach ($data as $key => $value): ?>
                            <?php
                                    if ($value['option'] != '') {
                                        $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
                                        $value['price'] = $option->price;
                                    }
                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="left pic">
                                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="title">
                                                            <b><?php echo $value['name'] ?></b><br> 
                                                            <?php if ($option != null): ?>
                                                            @<?php echo Cart::money($value['price']) ?>.-
                                                            <br> Option: <?php echo $option->attribute ?>
                                                            <?php else: ?>
                                                            @<?php echo Cart::money($value['price']) ?>.-
                                                            <?php endif ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                                            <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                                            <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                                                                <?php foreach ($value['optional'] as $k => $v): ?>
                                                                <input type="hidden" value="<?php echo $v ?>" name="option[<?php echo $k ?>]">
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                            <span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <b><?php echo Cart::money($subTotal = ($value['price']+$totalOption) * $value['qty']) ?>.-</b>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn back-btn-primary-blue btn-edit-cart">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php $total = $total + $subTotal ?>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>

                                                <div class="clear height-0"></div>
                                                <div class="line-grey"></div>
                                                <div class="clear height-15"></div>


                                                <div class="right box-total">
                                                    <table class="table borderless boxouter">
                                                        <tr>
                                                            <td width="54%">
                                                                <table class="table borderless">
                                                                     <tr>
                                                                            <td width="50%">Subtotal</td>
                                                                            <td width="50%"><?php echo Cart::money($total) ?>.-</td>
                                                                        </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <!-- bottom -->
                                                        <tr class="border-toptotal">
                                                            <td>
                                                                <table class="table borderless">
                                                                    <tr class="double-border">
                                                                        <td class="total" width="50%"><b>TOTAL</b></td>
                                                                        <td class="price-total" width="50%"><b><?php echo Cart::money($total) ?>.-</b></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <?php if (! isset($session['login_member'])): ?>
                                                                    <div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/member/index', 'ret'=>urlencode($this->createUrl('/cart/shipping')))); ?>" class="btn back-btn-primary-gold">Finish Shopping</a></div>
                                                                <?php else: ?>
                                                                    <div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/cart/shipping')); ?>" class="btn back-btn-primary-gold">Finish Shopping</a></div>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="clear height-30"></div>
                                            <?php else: ?>
                                                <h3>Shopping cart is empty</h3>
                                            <?php endif ?>
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
		'	<option value="">pilih</option>'+
		'	<?php for ($i=1; $i <= 20; $i++) { ?>'+
		'	<option value="<?php echo $i ?>"><?php echo $i ?></option>'+
		'	<?php } ?>'+
		'</select>');
		return false;
	})
	$('.select_qty').live('change', function() {
		var data = $(this).parent().parent().parent().find('form').serialize();
		$.ajax({
			url: url_edit_cart_action,
			data: data+'&ajax=ajax',
			dataType: 'html',
			type: 'post',
			success: function(msg){
				$( ".product-list-warp" ).load( baseurl+"/cart/shop #cart-shop" );
			},
			error: function(msg){
				alert('sending data error, cek your connection');
				console.log(msg);
			}
		});
		return false;
	})
</script>
<?php /*
<div class="container">
    <div class="container-breadcrump">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                    <li class="active">SHOPPING CART</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="product-list-warp padding-15">

		<div id="cart-shop" class="inside-content">
			
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
						<div id="shipping_progress">
							<div class="mark">
								<div class="co_progress_number">2</div>
								<div class="progress_line"></div>
							</div>
							SHIPPING
						</div>
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
			<div class="m-ins-content detail-shopcart box-middle-content-inside">
				<h1 class="title-inside-page">Shopping Cart</h1>
				<div class="clear height-3"></div>
				<div class="line-grey"></div>
				<div class="clear height-20"></div>

				<?php if (count($data)>0): ?>
					
				    <table class="table table-hover shopcart">
				    	<thead>
				    		<tr>
				    			<td width="150">Item</td>
				    			<td>&nbsp;</td>
				    			<!-- <td>Option</td> -->
				    			<td>Quantity</td>
				    			<td><b>Total</b></td>
				    			<td>&nbsp;</td>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		<?php $total = 0 ?>
				    		<?php foreach ($data as $key => $value): ?>
				    		<tr>
				    			<td>
				    				<div class="left pic">
				    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
				    				</div>
				    			</td>
				    			<td>
				    				<span class="title">
				    					<?php echo $value['name'] ?><br> @<?php echo Cart::money($value['price']) ?>.-
				    					<?php if ($value['option'] != ''): ?>
				    					<br> Type: <?php echo $value['option'] ?>
				    					<?php endif ?>
				    				</span>
				    			</td>
				    			<?php /*
				    			<td>
									<?php $totalOption = 0; ?>
									<?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
										<?php foreach ($value['optional'] as $k => $v): ?>
										<?php
										$dataOption = explode('|', $v);
										?>
										<span class="varian"><?php echo $dataOption[1] ?> <?php echo number_format($dataOption[2]) ?></span><br>
										<?php $totalOption = $totalOption + $dataOption[2]; ?>
										<?php endforeach ?>
									<?php endif ?>
				    			</td>
				    			?>
				    			<td>
				    				<form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
				    					<input type="hidden" value="<?php echo $value['id'] ?>" name="id">
										<?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
											<?php foreach ($value['optional'] as $k => $v): ?>
					    					<input type="hidden" value="<?php echo $v ?>" name="option[<?php echo $k ?>]">
											<?php endforeach ?>
										<?php endif ?>
					    				<span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
				    				</form>
				    			</td>
				    			<td>
				    				<b><?php echo Cart::money($subTotal = ($value['price']+$totalOption) * $value['qty']) ?>.-</b>
				    			</td>
				    			<td>
				    				<a href="#" class="btn btn-primary btn-edit-cart">EDIT</a>
				    			</td>
				    		</tr>
				    		<?php $total = $total + $subTotal ?>
				    		<?php endforeach ?>
				    	</tbody>
					</table>

					<div class="clear height-0"></div>
					<div class="line-grey"></div>
					<div class="clear height-15"></div>


					<div class="right box-total">
						<table class="table borderless">
							<tr>
								<td>Subtotal</td>
								<td><?php echo Cart::money($total) ?>.-</td>
							</tr>
							<tr class="clear height-5"></tr>
							<tr class="double-border">
								<td class="total"><b>TOTAL</b></td>
								<td class="price-total"><b><?php echo Cart::money($total) ?>.-</b></td>
							</tr>
						</table>
					</div>

					<div class="clear height-50"></div>
					<?php if (Yii::app()->user->isGuest): ?>
						<div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/profile/login', 'ret'=>$this->createUrl('/cart/shipping'))); ?>" class="btn btn-primary">Finish Shopping</a></div>
					<?php else: ?>
						<div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/cart/shipping')); ?>" class="btn btn-primary">Finish Shopping</a></div>
					<?php endif ?>
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
*/ ?>


