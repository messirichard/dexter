<?php
$this->breadcrumbs = array(
    'Tips & Artikel' => array('/blog/index'),
    $categoryData->name => array('/blog/index', 'topik'=>$categoryData->slug),
    $detail->title,
);
?>
<section class="promosi-banner2 back-grey-cream">
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
        <div class="link-back margin-top-10"><a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'topik'=>$categoryData->slug)); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
    </div>
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product content-text product-landing-outer margin-left-50">
    <div class="padding-35 prelatif padding-top-22">
        <!-- inside goal content -->
        <div class="left back-title-landingproduct article">
            <div class="text">
                TIPS &amp; ARTIKEL
            </div>
        </div>
        <div class="left back-out-top-topics">
            <div class="text">
                <?php
                $categoryMenu = Category::model()->findAll('parent_id = "0" AND type = "topik"')
                ?>
                <?php foreach ($categoryMenu as $key => $value): ?>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/list', 'topik'=>$value->slug)); ?>"><?php echo ucwords($value->name) ?></a>
                <?php if (count($categoryMenu) - 1 > $key): ?>
                &nbsp;&nbsp;|&nbsp;&nbsp;   
                <?php endif ?>
                <?php endforeach ?>

                <div class="clear"></div>
            </div>
        </div>
        <div class="right fds-calculator-top">
            <a href="<?php echo CHtml::normalizeUrl(array('/blog/calculator')); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/icon-d-pict-calculator.png" alt="Galeri Fitness - Fitness Calculator"></a>
        </div>
        
        <!-- middle data -->
        <div class="clear height-30"></div>
             <div class="row box-outer-news">
            <div class="col-md-8">
                <div class="desc-artikel-right landing">                  
                        <div class="item">
                            <div class="s-title bl-title">
                                <span class="topik"><?php echo strtoupper($categoryName[$detail->topik_id]) ?></span>
                                <div class="clear height-10"></div>
                                <h1><?php echo $detail->title ?></h1>
                            </div>
                            <div class="clear height-10"></div>
                            <div class="pict background-grey">
                                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(620,364, '/images/blog/'.$detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                            </div>
                            <div class="clear height-15"></div>
                                <div class="left author-detail">
                                    <div class="pic left">
                                        <!-- <img src="" alt=""> -->
                                    </div>
                                    <span class="left author block">by <?php echo $detail->writer ?> &nbsp;&nbsp;&nbsp; </span>
                                </div>
                                <span class="date right"><i class="icon-calendar-artikel"></i> <?php echo date('F d, Y', strtotime($detail->date_input)) ?></span>
                                <div class="clear height-10"></div>

                                <div class="lines-grey-dashed"></div>
                                <div class="clear height-15"></div>

                            <div class="bl-title descrtiption">
                                <?php echo $detail->content ?>
                                
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="w320 right">
                        <div class="cont-title uppercase"><span>Tips & Artikel lainnya</span></div>
                        <div class="clear height-15"></div>
                        <div class="block-more-articles-new moredetail-article">
                            <?php foreach ($terbaru['data'] as $key => $value): ?>
                            <div class="item">
                                <div class="pic left">
                                    <a href="<?php echo CHtml::normalizeUrl(array('blog/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title))); ?>">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(98,64, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                    </a>
                                </div>
                                <div class="left margin-left-10 desc">
                                    <div class="title">
                                    <a href="<?php echo CHtml::normalizeUrl(array('blog/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title))); ?>">
                                        <?php echo strtoupper($value->title) ?>
                                    </a>
                                    </div>
                                    <div class="clear height-5"></div>
                                    <span class="topics left block"><?php echo strtoupper($categoryName[$value->topik_id]) ?></span>
                                    <span class="author right block"><i class="icon-calendar-artikel"></i> <?php echo date('F d, Y', strtotime($value->date_input)) ?></span>
                                </div>
                            </div>
                            <?php endforeach ?>

                            <div class="clear"></div>
                        </div>
                        <div class="clear height-5"></div>
                        <div class="block-box-right-panduan-pemula">
                            <div class="text">
                                JIKA ANDA SEORANG PEMULA DALAM <br>
                                DUNIA FITNESS, ANDA perlu mengetahui <br>
                                DASAR-dasar PENTING berikut...

                                <div class="clear height-10"></div>
                                <div class="block-red-link"><a href="<?php echo CHtml::normalizeUrl(array('/blog/list', 'topik'=>'topik-panduan-pemula')); ?>"><i class="icon-info-petunjuk-pemulabig"></i>&nbsp;&nbsp;PETUNJUK FITNESS PEMULA</a></div>
                                <div class="block-red-link"><a href="<?php echo CHtml::normalizeUrl(array('/blog/list', 'topik'=>'topik-workout-list')); ?>"><i class="icon-info-workoutlist"></i>&nbsp;&nbsp;WORKOUT LIST</a></div>
                                <div class="block-red-link"><a href="<?php echo CHtml::normalizeUrl(array('/blog/calculator')); ?>"><i class="icon-info-fit-calculator"></i>&nbsp;&nbsp;FITNESS CALCULATOR</a></div>

                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                </div>

            </div>

        <div class="clear height-10"></div>
        <!-- middle data -->

        <!-- inside goal content -->
        <div class="clear"></div>
    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="clear height-30"></div>
    <div class="pull-right">
        <div class="text-bottom-product text-right">
            <p>
            <b>Galerifitness.com - Suplemen Fitness</b> <br>
            Galerifitness menjual suplemen fitness atau produk merk asli resmi / original dengan harga terbaik. Pembeli produk Galerifitness.com di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
            </p>
        </div>
    </div>
<div class="clear height-20"></div>

</section>
<script type="text/javascript">
    $(function() {
        var selectBox = $(".select-custom").selectBoxIt();
    });

    $('.menu-artikel li').live('click', function(){
        if($(this).hasClass('active')==true){
            $(this).removeClass('active');
            
            // ganti icon
            $(this).find('i.glyphicon-minus').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }else{
            $(this).addClass('active');

            // ganti icon
            $(this).find('i.glyphicon-plus').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }

        return false;
    });
</script>