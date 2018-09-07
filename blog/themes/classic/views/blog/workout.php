<?php
$this->breadcrumbs = array(
    'Tips & Artikel'=>array('/blog/index'),
    'Panduan Gerakan Dalam Fitness',
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
        <div class="link-back margin-top-10"><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
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
                Panduan Gerakan Dalam Fitness
            </div>
        </div>
        <div class="left back-tail-title-landingproduct"></div>
        
        <!-- middle data -->
        <div class="clear height-50"></div>
        <div class="height-30"></div>
        <?php /*
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
                    
                    <p></p>


                </div>
            </div>
        </div>
        <div class="clear height-20"></div>
        */ ?>

        <div class="box-outer-list-landing">
            <div class="title" style="font-size: 20px;">Berikut ini adalah gerakan dan latihan yang dapat anda lakukan di tempat gym sebagai referensi anda dalam membentuk otot yang anda impikan ! </div>
            <div class="clear height-35"></div>

            <div class="list-data-landingproduk">

                <?php foreach ($data['data'] as $key => $value): ?>
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul"><?php echo $value->title ?></span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <?php echo substr(strip_tags($value->content), 0, 200) ?>
                                <div class="height-10"></div>
                                <a class="btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id ,'slug'=>Slug::create($value->title))); ?>" >LIHAT ARTIKEL</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear height-40"></div>
                <div class="border-dashed"></div>
                <div class="clear height-40"></div>
                <?php endforeach ?>
                <div class="pagination-filter">
                    <div class="pagination-product">
                        <?php $this->widget('CLinkPager', array(
                            'pages' => $data['pages'],
                            'header'=>'',
                            // 'nextPageLabel'=>'',
                            // 'prevPageLabel'=>'',
                            'maxButtonCount'=>5,
                            'cssFile'=>Yii::app()->baseUrl.'/asset/css/style-pager.css',
                        )) ?>
                        <?php /*
                        <a href="" class="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="active" href="<?php echo CHtml::normalizeUrl(array('/')); ?>">1</a>
                        <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">2</a>
                        <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">3</a>
                        <a href="" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        */ ?>
                    </div>
                </div>
                </form>
                
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
            <b>Galerifitness.com - Suplemen Fitness</b> <br>
            Galerifitness menjual suplemen fitness atau produk merk asli resmi / original dengan harga terbaik. Pembeli produk Galerifitness.com di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
            </p>
        </div>
    </div>
<div class="clear height-20"></div>

</section>