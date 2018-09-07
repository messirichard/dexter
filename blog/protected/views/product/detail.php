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
                    <div class="titlebox-featured" alt="title-product"><?php echo $data->description->name ?></div>
                    <div class="fright back-button-productyellow"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$data->category_id)); ?>" onclick="window.history.back()"></a></div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-picture-big">
                                <div class="in">
                                    <img class="img-main" style="display: block;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(513,513, '/images/product/'.$data->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo $data->description->name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 descriptions-product">
                            <form action="<?php echo CHtml::normalizeUrl(array('/product/addcart')); ?>" method="post">
                            <div class="padding-left-10 padding-right-20">
                                <div class="clear height-10"></div>
                                <div class="row">
                                    <div class="col-sm-3"><b>Description</b></div>
                                    <div class="col-sm-9">
                                        <?php echo $data->description->desc ?>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><b>Price</b></div>
                                    <div class="col-sm-9">
                                    <span class="price"><?php echo Cart::money($data->harga) ?></span>
                                    <?php if ($data->harga < $data->harga_coret): ?>
                                    <span class="price-coret"><?php echo Cart::money($data->harga_coret) ?></span>
                                    <?php endif ?>
                                    </div>
                                </div>
                                
                                <div class="clear height-20"></div>
                                <div class="row">
                                    <div class="col-md-3"><b>Quantity</b></div>
                                    <div class="col-md-9">
                                        <div class="quantity">
                                            <input type="text" value="1" name="qty" class="form-control">
                                            <input type="hidden" value="<?php echo $data->id ?>" name="id" class="form-control">
                                            <span class="help-inline">pcs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear height-15"></div>
                                <div class="height-3"></div>
                                <div class="row">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-default-blue">ADD TO CART</button>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
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
