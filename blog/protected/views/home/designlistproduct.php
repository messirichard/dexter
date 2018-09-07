<div class="container">
    <div class="container-breadcrump">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">LIBRARY</a></li>
                    <li class="active">DATA</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-product-list">
        <div class="row">
            <div class="col-sm-2">
                <div class="height-5"></div>
                <h3 class="product-list-subtitle">CATEGORY</h3>
                <div class="line-grey"></div>
                <ul class="list-unstyled list-left-menu">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">ALL</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">EARINGS</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">WATCHES</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">BAGS</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">CLOTHING</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">SHOES</a></li>
                </ul>
                <div class="line-grey"></div>
                <p class="list-tag-product"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">SALE</a></p>
                <div class="line-grey"></div>
                <p class="list-tag-product"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">GIFT ITEMS</a></p>
                <div class="line-grey"></div>
                <div class="height-30"></div>
                <p class="list-tag-product2">
                <select name="" id="" class="list-brand-product">
                    <option value="">BROWSE BY BRANDS</option>
                </select>
                </p>
            </div>
            <div class="col-sm-10">
                <div class="content-header-product">
                    <div class="height-10"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h1 class="product-list-title">MEN</h1>
                            <span>Showing 50 items for Men products</span>
                        </div>
                        <div class="col-lg-2">
                            <span class="product-list-title">&nbsp;</span>
                            <b>SHOW:</b>
                            &nbsp;&nbsp;&nbsp;
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">ALL</a>
                            |
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">20</a>
                            |
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">40</a>
                        </div>
                        <div class="col-lg-3">
                            <span class="product-list-title">&nbsp;</span>
                            SORT PRODUCTS
                            <select name="" id="" class="list-brand-product list-brand-product-width">
                                <option value="">Price Low to High</option>
                                <option value="">Price High to Low</option>
                                <option value="">Oldest to Latest product</option>
                                <option value="">Latest to Oldest product</option>
                            </select>
                        </div>
                        <div class="col-lg-3" style="text-align: right;">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async></script>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_native_toolbox"></div>
                        </div>
                    </div>
                    <div class="height-10"></div>
                </div>

                <div class="line-grey"></div>
                <div class="height-20"></div>
                <div class="category-picture">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">
                        <img src="<?php echo Yii::app()->baseUrl ?>/images/category/category-pic.jpg" alt="Category UBS Life Style">
                    </a>
                </div>                
                <div class="height-20"></div>
                <div class="row">
                    <?php for ($i=0; $i < 15 ; $i++) { ?>
                    <div class="col-custom col-md-3 col-sm-6">
                        <div class="recomended-product-image">
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>" >
                                <img src="<?php echo Yii::app()->baseUrl ?>/images/product/recom-product-1.jpg" alt="recommended product">
                            </a>
                        </div>
                        <div class="recommended-product-text">
                            <h3>
                                <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">
                                Axel Vinesse Pave-embelished
                                plaque leather buckle
                                bracelet leather buckle
                                bracelet
                                </a>
                            </h3>
                            <p>On Bracelet - <span class="recommended-product-price">IDR 250.000,-</span></p>
                            <p>
                                <a class="button-border-black wfull" href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">VIEW DETAIL</a>
                            </p>
                            <div class="height-20"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>


            </div>
        </div>
    </div>
</div>
