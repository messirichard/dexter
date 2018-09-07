<?php
$dataCategory = ViewCategory::model()->findAll('parent_id = 0 AND type = "category" AND language_id = :language_id ORDER BY SORT ASC', array(':language_id'=>$this->languageID));
?>
<?php 
$data = $product->getData();
?>
<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>e-store</h1>
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
                    <div class="titlebox-featured">Show <?php echo ($strCategory == '') ? "All" : $strCategory ?> product</div>
                    <div class="titlebox-featured small">Sort By</div>
                    <div class="box-button-category-featured">

                        <ul class="list-inline">
<?php
$dataPagesize = $_GET;
unset($dataPagesize['PrdProduct_page']);
unset($dataPagesize['order']);
?>
                            <?php $dataPagesize['order'] = 'new-old';?>
                            <li <?php if ($_GET['order'] == '' OR $_GET['order'] == 'new-old'): ?>class="active"<?php endif ?>><a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">LATEST PRODUCT</a></li>
                            <?php $dataPagesize['order'] = 'old-new';?>
                            <li <?php if ($_GET['order'] == 'old-new'): ?>class="active"<?php endif ?>><a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">OLDEST PRODUCT</a></li>
                            <?php $dataPagesize['order'] = 'hight-low';?>
                            <li <?php if ($_GET['order'] == 'hight-low'): ?>class="active"<?php endif ?>><a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">PRICE HIGH</a></li>
                            <?php $dataPagesize['order'] = 'low-hight';?>
                            <li <?php if ($_GET['order'] == 'low-hight'): ?>class="active"<?php endif ?>><a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">PRICE LOW</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="background-white">
                    <div class="box-product-menu">
                        <div class="height-25"></div>
                        <div class="titlebox-featured">Browse DV computers</div>
                        <div class="titlebox-featured small">Product Category</div>
                        <ul class="menu-sub">
                            <?php foreach ($dataCategory as $key => $value): ?>
                            <?php
                            $dataCategory2 = ViewCategory::model()->findAll('parent_id = :parent_id AND type = "category" AND language_id = :language_id ORDER BY SORT ASC', array(':language_id'=>$this->languageID, ':parent_id'=>$value->id));
                            ?>
                            <li class="submenu <?php if ($_GET['category'] == $value->id): ?>active<?php endif ?>">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><?php echo $value->name ?></a>
                                <ul class="list-submenu">
                                    <?php foreach ($dataCategory2 as $k => $v): ?>
                                    <li <?php if ($_GET['category'] == $v->id): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$v->id)); ?>"><?php echo $v->name ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        
                    </div>
                    <div class="box-product-featued product">
                        <?php 
                            // jumlah data
                            $gdata_bottom = count($data)-3; 
                        ?>
                        <?php foreach ($data as $key => $value): ?>
                        <div class="item <?php echo ( (($key+1) % 3) == 0 )? 'border-right-none':''; ?> 
                            <?php echo ( ($key+1)>$gdata_bottom )? 'border-bottom-none':''; ?>">
                            <div class="pict">
                                <a title="<?php echo strtoupper($value->description->name); ?>" href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(230,160, '/images/product/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                            <div class="clear height-5"></div>
                            <div class="descr">
                                <span class="title"><a title="<?php echo strtoupper($value->description->name); ?>" href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo strtoupper($value->description->name); ?></a></span>
                                <div class="clear height-4"></div>
                                <span class="price"><?php echo Cart::money($value->harga) ?></span>
                                <div class="clear height-5"></div>
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>" class="view-product tengah">VIEW PRODUCT</a>
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/addcart2', 'id'=>$value->id)); ?>" class="add-product tengah">ADD TO CART</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="center">
                    <div class="height-10"></div>
                    <?php $this->widget('CLinkPager', array(
                        'pages' => $product->getPagination(),
                    )) ?>
                    <div class="height-10"></div>
                </div>
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
    $(document).ready(function() {
        $('ul.menu-sub > li.submenu > ul.list-submenu > li.active').parent().parent().addClass('active');
    })
</script>
<?php /*
<div class="container">
    <div class="container-breadcrump">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">PRODUCT</a></li>
                    <?php $no = 1;  ?>
                    <?php foreach ($dataBreadcrump as $key => $value): ?>
                    <?php if ($no < count($dataBreadcrump)): ?>
                    <li><a href="<?php echo CHtml::normalizeUrl($value); ?>"><?php echo $key ?></a></li>
                    <?php else: ?>
                    <li class="active"><?php echo $key ?></li>
                    <?php endif ?>
                    <?php $no++;  ?>c 
                    <?php endforeach ?>
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
                    <?php foreach ($dataCatgory as $key => $value): ?>
                    <li><a href="<?php echo CHtml::normalizeUrl($value); ?>"><?php echo $key ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="line-grey"></div>
                <p class="list-tag-product"><a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">SALE</a></p>
                <div class="line-grey"></div>
                <p class="list-tag-product"><a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">GIFT ITEMS</a></p>
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
                            <h1 class="product-list-title"><?php echo ($dataCatgoryDesc->name == '') ? 'PRODUCT' : $dataCatgoryDesc->name ?></h1>
                            <span>Showing <?php echo $product->getTotalItemCount() ?> items for Men products</span>
                        </div>
                        <div class="col-lg-2">
                            <span class="product-list-title">&nbsp;</span>
                            <b>SHOW:</b>
                            &nbsp;&nbsp;&nbsp;
                            <?php
                                $dataPagesize = $_GET;
                                unset($dataPagesize['PrdProduct_page']);
                            ?>
                            <?php $dataPagesize['pagesize'] = 15;?>
                            <a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">15</a>
                            |
                            <?php $dataPagesize['pagesize'] = 30;?>
                            <a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">30</a>
                            |
                            <?php $dataPagesize['pagesize'] = 45;?>
                            <a href="<?php echo $this->createUrl('/product/index', $dataPagesize) ?>">45</a>
                        </div>
                        <div class="col-lg-3">
                            <form id="form-edit-order" action="<?php echo $this->createUrl('/product/index') ?>" method="get">
                                <?php 
                                    $dataOrder = $_GET;
                                    unset($dataOrder['PrdProduct_page']);
                                    unset($dataOrder['order']);
                                ?>
                                <?php foreach ($dataOrder as $key => $value): ?>
                                    <input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
                                <?php endforeach ?>
                                <span class="product-list-title">&nbsp;</span>
                                SORT PRODUCTS
                                <select name="order" id="select-order" class="list-brand-product list-brand-product-width">
                                    <option value="low-hight">Price Low to High</option>
                                    <option value="hight-low">Price High to Low</option>
                                    <option value="old-new">Oldest to Latest product</option>
                                    <option value="new-old">Latest to Oldest product</option>
                                </select>
                            </form>
                            <script type="text/javascript">
                            $('#select-order').on('change', function() {
                                $('form#form-edit-order').submit();
                            })
                            </script>
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
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>1)); ?>" target="_blank">
                        <img src="<?php echo Yii::app()->baseUrl ?>/images/category/category-pic.jpg" alt="Category UBS Life Style">
                    </a>
                </div>                
                <div class="height-20"></div>
                <div class="row">
                    <?php foreach ($product->getData() as $key => $value): ?>
                    <div class="col-custom col-md-3 col-sm-6">
                        <div class="recomended-product-image">
                            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>" >
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->description->name ?> - UBS Lifestyle">
                            </a>
                        </div>
                        <div class="recommended-product-text">
                            <h3>
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                                <?php echo $value->description->name ?>
                                </a>
                            </h3>
                            <p>
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->category_id)); ?>"><?php echo ViewCategory::model()->find('id = :id', array(':id'=>$value->category_id))->name?></a>
                                -
                                <span class="recommended-product-price"><?php echo Cart::money($value->harga); ?></span>
                                <?php if ($value->harga < $value->harga_coret): ?>
                                <span class="recommended-product-price-coret"><?php echo Cart::money($value->harga_coret); ?></span>
                                <?php endif ?>
                            </p>
                            <!-- <p>
                                <a class="button-border-black wfull" href="<?php echo CHtml::normalizeUrl(array('product/detail', 'id'=>$value->id)); ?>">VIEW DETAIL</a>
                            </p> -->
                            <div class="height-20"></div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php $this->widget('CLinkPager', array(
                    'pages' => $product->getPagination(),
                )) ?>


            </div>
        </div>
    </div>
</div>
*/ ?>
