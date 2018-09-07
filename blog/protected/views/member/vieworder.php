<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>My Account</h1>
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
                    <div class="titlebox-featured" alt="title-product">My Account</div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-5"></div>
                    <div class="margin-15">




		<div class="inside-content">
			
			<!-- /. Start Content About -->
			<div class="m-ins-content detail-shopcart content-text">
				<h1 class="title-inside-page">View Order</h1>

				<h4>Order ID: <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?> "<?php echo OrOrderStatus::model()->findByPk($modelOrder->order_status_id)->name ?>"</h4>
				<div class="lines-green"></div>
				<div class="row">
					<div class="col-md-6">
						<b>Shipping address</b><br>
						<?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?><br>
						<?php echo $modelOrder->shipping_address_1 ?><br>
						<?php echo $modelOrder->shipping_city ?><br>
						<?php echo $modelOrder->shipping_zone ?> <?php echo $modelOrder->shipping_postcode ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
									</p>
					</div>
					<div class="col-md-6">
						<b>Payment address</b><br>
						<?php echo $modelOrder->payment_first_name ?> <?php echo $modelOrder->payment_last_name ?><br>
						<?php echo $modelOrder->payment_address_1 ?><br>
						<?php echo $modelOrder->payment_city ?><br>
						<?php echo $modelOrder->payment_zone ?> <?php echo $modelOrder->payment_postcode ?><br>
						Mobile phone : <?php echo $modelOrder->phone ?><br>
						</p>
					</div>
				</div>
				<p>


				    <table class="table table-hover shopcart">
				    	<thead>
				    		<tr>
				    			<td>Item</td>
				    			<td>&nbsp;</td>
				    			<!-- <td>Option</td> -->
				    			<td>Quantity</td>
				    			<td><b>Total</b></td>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		<?php $total = 0 ?>
				    		<?php foreach ($data as $key => $value): ?>
				    		<tr>
				    			<td>
				    				<div class="left pic">
				    					<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,95, '/images/product/'.$value['image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
				    				</div>
				    			</td>
				    			<td>
				    				<span class="title">
				    					<?php echo $value['name'] ?> @<?php echo Cart::money($value['price']) ?>
				    					<?php if ($value['attributes_id'] != '0'): ?>
				    					<br> Option: <?php echo $value['attributes_name'] ?>
				    					<?php endif ?>
				    				</span>
				    			</td>
				    			<?php /*
				    			<td>
									<?php
									$totalOption = 0;
									$value['option'] = unserialize($value['option']);
									?>
									<?php if (count($value['option']) > 0 AND $value['option'] != ''): ?>
										<?php foreach ($value['option'] as $k => $v): ?>
										<?php
										$dataOption = explode('|', $v);
										?>
										<span class="varian"><?php echo $dataOption[1] ?> $<?php echo number_format($dataOption[2]) ?></span><br>
										<?php $totalOption = $totalOption + $dataOption[2]; ?>
										<?php endforeach ?>
									<?php endif ?>
				    			</td>
				    			*/ ?>
				    			<td>
				    				<form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
				    					<input type="hidden" value="<?php echo $value['id'] ?>" name="product_id">
				    					<?php /*
				    					<input type="hidden" value="<?php echo $value['option'] ?>" name="option">
				    					*/ ?>
					    				<span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
				    				</form>
				    			</td>
				    			<td>
				    				<b><?php echo Cart::money($subTotal = ($value['price']+$totalOption) * $value['qty']) ?>.-</b>
				    			</td>
				    		</tr>
				    		<?php $total = $total + $subTotal ?>
				    		<?php endforeach ?>
				    	</tbody>
					</table>

					<div class="clear height-0"></div>
					<div class="lines-green"></div>
					<div class="clear height-15"></div>


					<div class="right box-total">
						<table class="table borderless">
							<tr>
								<td>Subtotal</td>
								<td><?php echo Cart::money($total) ?>.-</td>
							</tr>
							<?php /*
							<tr>
								<td>Ongkos Kirim</td>
								<td><?php echo Cart::money($modelOrder->delivery_price) ?>.-</td>
							</tr>
							*/ ?>
							<tr class="clear height-5"></tr>
							<tr class="double-border">
								<td class="total"><b>TOTAL</b></td>
								<td class="price-total"><b><?php echo Cart::money($modelOrder->total + $modelOrder->delivery_price) ?>.-</b></td>
							</tr>
							<?php /*
							<tr>
								<td>Dari</td>
								<td><?php echo $modelOrder->delivery_from ?></td>
							</tr>
							<tr>
								<td>Ke</td>
								<td><?php echo $modelOrder->delivery_to ?></td>
							</tr>
							<tr>
								<td>Paket</td>
								<td><?php echo $modelOrder->delivery_package ?></td>
							</tr>
							<tr>
								<td>Weight total</td>
								<td><?php echo Cart::gramToKg($modelOrder->delivery_weight) ?> Kg</td>
							</tr>
							*/ ?>
						</table>
					</div>

					<div class="clear height-10"></div>
					<div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/member/index')); ?>" class="btn btn-primary">Back</a></div>



				<div class="clear height-25"></div>
				<div class="clear"></div>
			</div>
			<!-- /. End Content About -->

			<div class="clear height-15"></div>


		<div class="clear"></div>
		</div>
		<div class="clear"></div>

					</div>
					<div class="height-5"></div>
                </div>
            </div>
        </div>
        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
</section>
