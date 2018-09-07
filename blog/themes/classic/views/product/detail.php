<?php
$this->breadcrumbs = array(
    'Product'=>array('/product/index'),
    $data->title
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
        <div class="pull-right">
            <a href="<?php echo CHtml::normalizeUrl(array('product/index')); ?>" class="link-backpage"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Back</a>
        </div>
    </div>

<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product">
    <div class="padding-15">
        <div class="height-20"></div>
        <div class="product-detail-image">
            <!-- $data->image -->
            <!-- <img src="<?php // echo Yii::app()->baseUrl.ImageHelper::thumb(460,460, '/images/product/'. $data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt=""> -->
            
            <!-- Slide product detail -->
                 <div class="pf-im-detail theme-default">
                        <div id="slider2" class="nivoSlider">
                            <img alt="Suplement Fitness | <?php echo $data->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(460,460, '/images/product/'. $data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo strtolower($data->title) ?>">
                            <img alt="Suplement Fitness | <?php echo $data->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(460,460, '/images/product/'. $data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo strtolower($data->title) ?>">
                            <img alt="Suplement Fitness | <?php echo $data->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(460,460, '/images/product/'. $data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo strtolower($data->title) ?>">
                        </div>
                        
                </div>
            <!-- End Slide product detail -->

        </div>
        <div class="product-detail-container">
            <div class="title-product-overview">
                <h1><?php echo $data->title ?></h1>
                <h2>Category: <?php echo $categoryName[$data->category_id]; ?></h2>
            </div>
            <div class="right bs-share">
                <div class="s-facebook">
                    <div class="fb-like" data-href="" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
                <div class="s-tweet">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
                <div class="s-google">
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-size="tall"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="height-5"></div>
            <div class="lines-grey"></div>
            <div class="clear height-10"></div>
            <div class="intro-detail">
                <?php echo $data->intro_desc ?>
            </div>
            <div class="clear height-10"></div>
            <div class="lines-grey"></div>
            <div class="clear height-10"></div>
            <div class="height-2"></div>
            <?php if ($data->lainlain_id == 0): ?>
            <div class="box-nutricion-fact">
                <table class="table table-bordered">
                    <tr>
                        <?php if ( ! (
                            $data->setting['calories'] == '' AND
                            $data->setting['protein'] == '' AND
                            $data->setting['bcaas'] == '' AND
                            $data->setting['glutamine'] == '' AND
                            $data->setting['enzyme'] == ''
                        )
                        ): ?>
                        <th style="text-align: center;">CALORIES (G)</th>
                        <th style="text-align: center;">PROTEIN (G)</th>
                        <th style="text-align: center;">CARBOHYDRATE (G)</th>
                        <th width="17%" style="text-align: center;">SUGAR (G)</th>
                        <th width="15%" style="text-align: center;">TOTAL FAT (G)</th>
                        <?php endif ?>
                        <th style="text-align: center;">SERVING</th>
                        <th width="45%" style="text-align: center;">MAIN INGREDIENT </th>
                    </tr>
                    <tr>
                        <?php if ( ! (
                            $data->setting['calories'] == '' AND
                            $data->setting['protein'] == '' AND
                            $data->setting['bcaas'] == '' AND
                            $data->setting['glutamine'] == '' AND
                            $data->setting['enzyme'] == ''
                        )
                        ): ?>
                        <td style="text-align: center;"><?php echo ($data->setting['calories'] == '') ? 'na' : $data->setting['calories'] ?></td>
                        <td style="text-align: center;"><?php echo ($data->setting['protein'] == '') ? 'na' : $data->setting['protein'] ?></td>
                        <td style="text-align: center;"><?php echo ($data->setting['bcaas'] == '') ? 'na' : $data->setting['bcaas'] ?></td>
                        <td style="text-align: center;"><?php echo ($data->setting['glutamine'] == '') ? 'na' : $data->setting['glutamine'] ?></td>
                        <td style="text-align: center;"><?php echo ($data->setting['enzyme'] == '') ? 'na' : $data->setting['enzyme'] ?></td>
                        <?php endif ?>
                        <td style="text-align: center;"><?php echo ($data->setting['serving'] == '') ? 'na' : $data->setting['serving'] ?></td>
                        <td style="text-align: center;"><?php echo ($data->setting['ingridient'] == '') ? 'na' : $data->setting['ingridient'] ?></td>
                    </tr>
                </table>
            </div>
            <?php endif ?>
            <div class="height-20"></div>
            <form class="submit-add-cart" action="<?php echo CHtml::normalizeUrl(array('/product/addCart')); ?>" method="post">
            <div class="bs-col-varian dashedbottom">
                <table class="table borderless">
                    <tr>
                        <td>
                            <?php if ($data->type != ''): ?>
                            <?php
                            $type = Common::explodeString($data->type);
                            ?>
                            <div class="form-horizontal" >
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Type</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="colour">
                                        <?php foreach ($type as $value): ?>
                                        <option><?php echo $value ?></option>
                                        <?php endforeach ?>
                                      </select>
                                    </div>
                                  </div>

                            </div>
                            <?php endif ?>
                        </td>
                        <td>
                            <div class="form-horizontal" >
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-6 control-label">Beli Sejumlah</label>
                                    <div class="col-sm-6">
                                        <div class="input-qty-container">
                                            <input type="hidden" name="id" value="<?php echo $data->id ?>">
                                            <input type="hidden" name="option[berat]" value="<?php echo $data->setting['berat'] ?>">
                                            <input type="text" class="form-control" name="qty" value="1">
                                            <a href="#" class="input-qty-up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                            <a href="#" class="input-qty-down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                        </div>
                                        <div class="dk-pcs">Pcs</div>
                                    </div>
                                  </div>
                            </div>
                            <script type="text/javascript">
                                $('.input-qty-up').click(function() {
                                    var obj = $(this).parent().find('input.form-control');
                                    obj.val(parseInt(obj.val()) + 1);
                                    return false;
                                })
                                $('.input-qty-down').click(function() {
                                    var obj = $(this).parent().find('input.form-control');
                                    var i = parseInt(obj.val()) - 1;
                                    if (i <= 0) {i = 1};
                                    obj.val(i);
                                    return false;
                                })
                            </script>
                        </td>
                    </tr>
                </table>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="height-20"></div>

            <div class="d-block-price pull-left">
                <div class="pull-left w130">
                        <?php if ($data->harga < $data->harga_mask): ?>
                        <span class="price-mask"><?php echo Cart::money($data->harga_mask) ?></span> <br>
                        <?php endif; ?>
                    <span class="price"><?php echo Cart::money($data->harga) ?></span>
                </div>
                <div class="pull-left margin-left-20">
                    <?php if ($data->harga_mask > 0): ?>
                        <div class="price-save">SAVE <?php echo Cart::money($data->harga_mask - $data->harga) ?></div>
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
                <div class="height-10"></div>
                <p><a class="btn-add-compare" href="<?php echo CHtml::normalizeUrl(array('/product/addcompare', 'id'=>$data->id, 'slug'=>Slug::create($data->title))); ?>" class="add-to-compare"><i class="glyphicon glyphicon-transfer"></i> Add to Compare</a></p>
            </div>
            <div class="product-qty">
                <?php /*
                <div class="pull-left hargad">
                    Harga
                    &nbsp;&nbsp;&nbsp;
                    <span class="price"><?php echo Cart::money($data->harga) ?></span>
                </div>
                */ ?>
                <div class="pull-right">
                    <button type="submit" class="btn btn-add-to-cart">
                        Add to Cart
                    </button>
                </div>
                
            </div>
            <div class="clear"></div>
            <div class="product-keterangan dashedbottom">
                <div class="col-xs-9">
                    <div class="padding-left-10 padding-top-5">
                        <?php echo nl2br($this->setting['promo_text']) ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            </form>
            <div class="clear height-15"></div>
            <?php if ($data->shipping_info != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    SHIPING INFO
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-minus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
                    <p>
                        <?php echo $data->shipping_info ?>
                    </p>
                </div>
            </div>

            <?php endif; ?>
            <?php if ($data->content != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    DESCRIPTION
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-minus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
                    <?php echo $data->content ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($data->manfaat != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    MANFAAT
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
                    <?php echo $data->manfaat ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($data->keunggulan != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    KEUNGGULAN
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
                    <?php echo $data->keunggulan ?>
                </div>
            </div>
            <?php endif ?>
            <?php if ($data->cara_pemakaian != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    CARA PEMAKAIAN
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
                    <?php echo $data->cara_pemakaian ?>
                </div>
            </div>
            <?php endif ?>
            <?php if ($data->setting['youtube'] != ''): ?>
            <div>
                <div class="product-label-keterangan">
                    VIDEO PRODUCT
                </div>
                <div class="product-label-button">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
                <div class="content-text padding-left-10 padding-right-10 padding-top-10 " style="display: none">
                    <iframe width="534" height="401" src="//www.youtube.com/embed/<?php echo Common::getVYoutube($data->setting['youtube']) ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <?php endif ?>

        </div>
        
        <?php if ($nutrition != null): ?>
        <div class="clear visible-xs"></div>
        <div class="product-nutrition-fact">
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
        <div class="clear"></div>
    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="height-30"></div>
<?php
$setting = ($data->setting);
?>
<?php if (count($setting['pelanggan']) > 0): ?>
<div class="prelatif">
    <div class="block-new-produk product-sugest">
            <div class="block-header">
                <h1 class="productk-title">PELANGGAN YANG MEMBELI PRODUK INI, JUGA MEMBELI...</h1>
            </div>
            <div class="clear"></div>
            <div class="ins-content">
                <div class="product-listnew">
                    <?php foreach ($setting['pelanggan'] as $key => $value): ?>
                    <?php
                    $dataBawah = Product::model()->getData($value, $this->languageID);
                    ?>
                    <?php if ($dataBawah != null): ?>
                    <div class="item <?php if ((($key)% 4 ) == 0): ?>no-border<?php endif ?>">
                        <div class="pict">
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$dataBawah->id, 'slug'=>Slug::create($dataBawah->title))); ?>">
                        <img alt="Suplement Fitness | <?php echo $dataBawah->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(130,130, '/images/product/'. $dataBawah->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                        </a>
                        </div>
                        <h4 class="name">
                            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$dataBawah->id, 'slug'=>Slug::create($dataBawah->title))); ?>">
                            <?php echo $dataBawah->title ?>
                            </a>
                        </h4>
                        <div class="clear"></div>
                        <span><?php echo $dataBawah->intro_desc ?></span>
                        <div class="clear"></div>
                       <span class="price"><!-- IDR --> <?php echo Cart::money($dataBawah->harga) ?></span>
                    </div>
                    <?php endif ?>
                    <?php endforeach ?>
                    <div class="clearfix"></div>
                </div>

            </div>
            
        <div class="clear"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="height-30"></div>
<?php endif ?>
<?php if (count($setting['product']) > 0): ?>
<div class="prelatif">
    <div class="block-new-produk product-sugest">
            <div class="block-header">
                <h1 class="productk-title">PRODUK LAIN YANG TERKAIT DENGAN PRODUK INI...</h1>
            </div>
            <div class="clear"></div>
            <div class="ins-content">
                <div class="product-listnew">
                    <?php foreach ($setting['product'] as $key => $value): ?>
                    <?php
                    $dataBawah = Product::model()->getData($value, $this->languageID);
                    ?>
                    <?php if ($dataBawah != null): ?>
                        
                    <div class="item <?php if ((($key)% 4 ) == 0): ?>no-border<?php endif ?>">
                        <div class="pict">
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$dataBawah->id, 'slug'=>Slug::create($dataBawah->title))); ?>">
                        <img alt="Suplement Fitness | <?php echo $dataBawah->title ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(130,130, '/images/product/'. $dataBawah->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                        </a>
                        </div>
                        <h4 class="name">
                            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$dataBawah->id, 'slug'=>Slug::create($dataBawah->title))); ?>">
                            <?php echo $dataBawah->title ?>
                            </a>
                        </h4>
                        <div class="clear"></div>
                        <span><?php echo $dataBawah->intro_desc ?></span>
                        <div class="clear"></div>
                       <span class="price">IDR <?php echo Cart::money($dataBawah->harga) ?></span>
                    </div>
                    <?php endif ?>
                    <?php endforeach ?>
                    <div class="clearfix"></div>
                </div>

            </div>
            
        <div class="clear"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="height-30"></div>
<?php endif ?>

</section>