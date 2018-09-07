<div class="border-orange">
	<div class="padding-40">
		<div class="w-1000 tengah">
			<div class="clear"></div>
			<?php foreach ($data as $key => $value): ?>
			<?php
			$product = Product::model()->getData($value, $this->languageID);
			$product->setting = unserialize($product->setting);
			$nutrition = ProductNutrition::model()->getNutrition($product->id);

			?>
			<div class="w-480 <?php if ($key == 0): ?>fleft<?php else: ?>fright<?php endif ?>">
				
				<p align="center">
                	<img alt="Suplement Fitness | <?php echo $data->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(180,180, '/images/product/'. $product->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo strtolower($data->title) ?>">
                </p>
				<div class="lines-grey"></div>
	            <div class="title-product-overview">
	                <h3><?php echo $product->title ?></h3>
	                <h4>Category: <?php echo $categoryName[$product->category_id]; ?></h4>
	            </div>
	            <div class="clear"></div>
				<div class="lines-grey"></div>
				<div class="height-10"></div>
	            <?php if ($product->lainlain_id == 0): ?>
	            <div class="box-nutricion-fact" style="width: auto;">
	                <table class="table table-bordered">
	                    <tr>
	                        <?php if ( ! (
	                            $product->setting['calories'] == '' AND
	                            $product->setting['protein'] == '' AND
	                            $product->setting['bcaas'] == '' AND
	                            $product->setting['glutamine'] == '' AND
	                            $product->setting['enzyme'] == ''
	                        )
	                        ): ?>
	                        <th style="text-align: center;">CALORIES (G)</th>
	                        <th style="text-align: center;">PROTEIN (G)</th>
	                        <th style="text-align: center;">CARBOHYDRATE (G)</th>
	                        <th width="17%" style="text-align: center;">SUGAR (G)</th>
	                        <th width="15%" style="text-align: center;">TOTAL FAT (MG)</th>
	                        <?php endif ?>
	                        <th style="text-align: center;">SERVING</th>
	                        <th width="45%" style="text-align: center;">MAIN INGRIDIENT</th>
	                    </tr>
	                    <tr>
	                        <?php if ( ! (
	                            $product->setting['calories'] == '' AND
	                            $product->setting['protein'] == '' AND
	                            $product->setting['bcaas'] == '' AND
	                            $product->setting['glutamine'] == '' AND
	                            $product->setting['enzyme'] == ''
	                        )
	                        ): ?>
	                        <td style="text-align: center;"><?php echo ($product->setting['calories'] == '') ? 'na' : $product->setting['calories'] ?></td>
	                        <td style="text-align: center;"><?php echo ($product->setting['protein'] == '') ? 'na' : $product->setting['protein'] ?></td>
	                        <td style="text-align: center;"><?php echo ($product->setting['bcaas'] == '') ? 'na' : $product->setting['bcaas'] ?></td>
	                        <td style="text-align: center;"><?php echo ($product->setting['glutamine'] == '') ? 'na' : $product->setting['glutamine'] ?></td>
	                        <td style="text-align: center;"><?php echo ($product->setting['enzyme'] == '') ? 'na' : $product->setting['enzyme'] ?></td>
	                        <?php endif ?>
	                        <td style="text-align: center;"><?php echo ($product->setting['serving'] == '') ? 'na' : $product->setting['serving'] ?></td>
	                        <td style="text-align: center;"><?php echo ($product->setting['ingridient'] == '') ? 'na' : $product->setting['ingridient'] ?></td>
	                    </tr>
	                </table>
	            </div>
	            <?php endif ?>
	            <div class="height-10"></div>
				<div class="lines-grey"></div>
	            <div class="height-10"></div>
	            <div class="d-block-price dashedbottom">
	                <div class="pull-left w130">
	                    <?php if ($product->harga < $product->harga_mask): ?>
	                    <span class="price-mask"><?php echo Cart::money($product->harga_mask) ?></span> <br>
	                    <?php endif ?>
	                    <span class="price"><?php echo Cart::money($product->harga) ?></span>
	                </div>
	                <div class="pull-left margin-left-20">
	                    <div class="price-save">SAVE <?php echo Cart::money($product->harga_mask - $product->harga) ?></div>
	                </div>
	                <div class="clear"></div>
	            </div>
	            <div class="height-10"></div>
	            <?php if ($product->shipping_info != ''): ?>
	            <div>
	                <div class="product-label-keterangan">
	                    SHIPING INFO
	                </div>
	                <div class="product-label-button">
	                    <a href="#"><i class="glyphicon glyphicon-minus"></i></a>
	                </div>
	                <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
	                    <p>
	                        <?php echo $product->shipping_info ?>
	                    </p>
	                </div>
	            </div>

	            <?php endif; ?>
	            <?php if ($product->content != ''): ?>
	            <div>
	                <div class="product-label-keterangan">
	                    DESCRIPTION
	                </div>
	                <div class="product-label-button">
	                    <a href="#"><i class="glyphicon glyphicon-minus"></i></a>
	                </div>
	                <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
	                    <?php echo $product->content ?>
	                </div>
	            </div>
	            <?php endif; ?>
	            <?php if ($product->manfaat != ''): ?>
	            <div>
	                <div class="product-label-keterangan">
	                    MANFAAT
	                </div>
	                <div class="product-label-button">
	                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
	                </div>
	                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
	                    <?php echo $product->manfaat ?>
	                </div>
	            </div>
	            <?php endif; ?>
	            <?php if ($product->keunggulan != ''): ?>
	            <div>
	                <div class="product-label-keterangan">
	                    KEUNGGULAN
	                </div>
	                <div class="product-label-button">
	                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
	                </div>
	                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
	                    <?php echo $product->keunggulan ?>
	                </div>
	            </div>
	            <?php endif ?>
	            <?php if ($product->cara_pemakaian != ''): ?>
	            <div>
	                <div class="product-label-keterangan">
	                    CARA PEMAKAIAN
	                </div>
	                <div class="product-label-button">
	                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
	                </div>
	                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
	                    <?php echo $product->cara_pemakaian ?>
	                </div>
	            </div>
	            <?php endif ?>

		        <?php if ($nutrition != null): ?>
		        <div class="height-10"></div>
		            
		        <div class="product-nutrition-fact" style="width: auto; float: none;">
		            <div class="product-nutrition-fact-border">
		                <div class="product-nutrition-fact-border">
		                    <div class="product-nutrition-title">
		                        <?php echo $nutrition['single']['name'] ?>
		                    </div>
		                    <div class="product-nutrition-taste">
		                        <?php echo $nutrition['single']['color'] ?>
		                    </div>
		                    <div class="clear"></div>
		                    <?php if (count($nutrition['multi']) > 0): ?>
		                    <?php foreach ($nutrition['multi'] as $key => $value): ?>
		                    <?php
		                    switch ($value['type']) {
		                        case 'field1':
		                        ?>
		                            <div class="product-nutrition-field1">
		                                <?php echo $value['value'] ?>
		                            </div>
		                        <?php
		                            break;
		                        case 'field2':
		                        $field2 = unserialize($value['value']);
		                        ?>
		                            <div class="product-nutrition-field2">
		                                <div class="product-nutrition-field21">
		                                    <?php echo $field2['field21'] ?>
		                                </div>
		                                <div class="product-nutrition-field22">
		                                    <?php echo $field2['field22'] ?>
		                                </div>
		                                <div class="product-nutrition-field23">
		                                    <?php echo $field2['field23'] ?>
		                                </div>
		                                <div class="clear"></div>
		                            </div>
		                        <?php
		                            break;
		                        case 'line-bold':
		                        ?>
		                            <div class="product-nutrition-line-bold"></div>
		                        <?php
		                            break;
		                        case 'line-thin':
		                        ?>
		                            <div class="product-nutrition-line-thin"></div>
		                        <?php
		                            break;

		                        default:
		                            
		                            break;
		                    }
		                    ?>
		                    <?php endforeach ?>
		                    <?php endif ?>
		                    <h5>Ingredients:</h5>
		                    <div class="product-nutrition-field1">
		                        <?php echo $nutrition['single']['ingredients'] ?>
		                    </div>
		                    <h5>ALLERGEN INFORMATION:</h5>
		                    <div class="product-nutrition-field1">
		                        <?php echo $nutrition['single']['warning'] ?>
		                    </div>

		                </div>
		            </div>
		        </div>
		        <?php endif ?>

			</div>
			<?php endforeach ?>
			<?php /*
			<?php if (count($data) == 1): ?>
				<div class="w-480 fright">
					<p align="center">
	                	<img alt="Suplement Fitness | <?php echo $data->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(180,180, '/images/product/'. 'image-add.jpg' , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo strtolower($data->title) ?>">
	                </p>
				</div>
			<?php endif ?>
			*/ ?>
			<div class="clear"></div>
			<div class="height-20"></div>
			<p align="center">
				<a href="<?php echo CHtml::normalizeUrl(array('/product/deletecompare')); ?>" class="btn btn-primary">Delete Compare</a>
			</p>
		</div>
	</div>
</div>