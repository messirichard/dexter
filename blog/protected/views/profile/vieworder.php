<?php
$this->breadcrumbs = array(
    'My Account',
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
			
			<!-- /. Start Content About -->
			<div class="m-ins-content detail-shopcart">
				<h1 class="title-inside-page">Order ID: <?php echo $modelOrder->nota ?></h1>
				<div class="clear height-3"></div>
				<div class="lines-green"></div>
				<div class="clear height-20"></div>
				<h4>Status: <?php echo strtoupper($modelOrder->status) ?></h4>
				<div class="lines-green"></div>

				<p>

	<b>Shipping address</b><br>
	<?php echo $modelOrder->first_name ?> <?php echo $modelOrder->last_name ?><br>
	<?php echo $modelOrder->address ?><br>
	<?php echo $modelOrder->city ?><br>
	<?php echo $modelOrder->province ?> <?php echo $modelOrder->postcode ?><br>
	Mobile phone : <?php echo $modelOrder->hp ?><br>
	Pin BB : <?php echo $modelOrder->bb ?><br>
				</p>

				    <table class="table table-hover shopcart">
				    	<thead>
				    		<tr>
				    			<td width="160">Item</td>
				    			<td>&nbsp;</td>
				    			<!-- <td>Option / Variant</td> -->
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
				    					<?php if ($value['color'] != ''): ?>
				    					<br> Color: <?php echo $value['color'] ?>
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
				    					<input type="hidden" value="<?php echo $value['option'] ?>" name="option">
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
						<tr>
							<td>Ongkos Kirim</td>
							<td><?php echo Cart::money($modelOrder->delivery_price) ?>.-</td>
						</tr>
						<tr class="clear height-5"></tr>
						<tr class="double-border">
							<td class="total"><b>TOTAL</b></td>
							<td class="price-total"><b><?php echo Cart::money($total + $modelOrder->delivery_price) ?>.-</b></td>
						</tr>
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
							<td>Perkiraan berat total</td>
							<td><?php echo Cart::gramToKg($modelOrder->delivery_weight) ?> Kg</td>
						</tr>
						</table>
					</div>

					<div class="clear height-20"></div>
					<div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/profile/index')); ?>" class="btn btn-primary">Back</a></div>



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