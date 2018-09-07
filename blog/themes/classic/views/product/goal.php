<?php
$this->breadcrumbs = array(
    'GOAL: '.$data->name,
);
?>
<section class="promosi-banner2">
    <div class="prelatif container">

<div class="height-30"></div>
<div class="breadcrump-container margin-left-50">
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
        <div class="link-back margin-top-10"><a href="#"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
    </div>
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product content-text product-landing-outer margin-left-50">
    <div class="padding-15 prelatif">
        <!-- inside goal content -->
        <div class="clear height-5"></div>
        <div class="height-3"></div>
        <div class="left back-title-landingproduct">
            <div class="text">
                GOAL: <?php echo strtoupper($data->name) ?>
            </div>
        </div>
        <div class="left back-tail-title-landingproduct hidden-xs"></div>
        
        <!-- middle data -->
        <div class="clear height-50"></div>
        <div class="height-30"></div>
        <div class="row box-landingdata">
            <div class="col-md-4">
                <div class="out-back-pic">
                    <div class="back-pic">
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,305, '/images/category/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                    </div>
                    <div class="back-pic-landingproduct">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="desc left content-text">
                    <?php 
                    $data->desc = unserialize($data->desc);
                    ?>
                    <?php echo $data->desc['desc'] ?>
                    <?php /*
                    <p>Apakah Anda ingin kehilangan lemak dalam tubuh dan meningkatkan definisi otot anda? Jika Anda sudah memiliki program diet yang baik dan ditambah dengan nutrisi yang tepat, Anda mungkin dapat mempertimbangkan untuk menambahkan beberapa produk pembakar lemak untuk membantu memberi Anda lebih lagi!</p>
                    <p><strong>Suplemen Fitness pembakar lemak diformulasikan untuk membantu Anda mencapai tujuan penurunan lemak Anda.</strong></p>
                    <span>Produk Fat Loss dirancang untuk:</span>
                    <ul>
                        <li>Mengoptimalkan metabolisme anda</li>
                        <li>Membantu mengontrol nafsu makan anda</li>
                        <li>Meningkatkan energi, membantu anda lebih kuat dalam latihan yang intensif</li>
                        <li>Mempertahankan massa otot</li>
                    </ul>
                    */ ?>


                </div>
            </div>
        </div>
        <div class="clear height-20"></div>

        <div class="box-outer-list-landing">
            <div class="title">Kategori Produk <?php echo ($data->name) ?></div>
            <div class="clear height-35"></div>

            <div class="list-data-landingproduk">
                <?php foreach ($detail as $key => $value): ?>
                    
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/images/category/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul"><?php echo $value->name ?></span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <?php 
                                $value->desc = unserialize($value->desc);
                                ?>
                                <?php echo $value->desc['desc'] ?>
                                <a class="btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/product/index', 'kategori'=>$value->desc['category_id'])); ?>" >LIHAT PRODUK</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (count($detail) > $key + 1): ?>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                <?php endif ?>
                <?php endforeach ?>
                
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
        <div class="clear height-50"></div>
        <!-- middle data -->

        <!-- inside goal content -->
        <div class="clear"></div>
    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="clear height-30"></div>
    <div class="pull-right">
        <div class="text-bottom-product text-left">
            <p>
            <b>Galerifitness.com - Suplemen Fitness - WHEY PROTEIN</b> <br>
            Galerifitness menjual suplemen fitness atau produk FAT LOSS merk asli resmi / original dengan harga terbaik. Pembeli produk Galerifitness.com FAT LOSS di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
            </p>
        </div>
    </div>
<div class="clear height-20"></div>

</section>