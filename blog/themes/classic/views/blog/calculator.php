<?php
$this->breadcrumbs = array(
    'Tips & Artikel'=>array('/blog/index'),
    'Fitness Calculator',
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
                Fitness Calculator
            </div>
        </div>
        <div class="left back-tail-title-landingproduct"></div>
        
        <!-- middle data -->
        <div class="clear height-50"></div>
        <div class="height-30"></div>
        <div class="row box-landingdata">
            <div class="col-md-4">
                <div class="out-back-pic">
                    <div class="back-pic">
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,305, '/asset/images/ill-calc.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                    </div>
                    <div class="back-pic-landingproduct">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="desc left content-text">
                    <p>GaleriFitness.com telah mengambil waktu untuk membuat hidup setiap dari anda jauh lebih mudah, lagi. Kalkulator ini akan membuat lebih mudah bagi setiap orang untuk melakukan apa saja di internet termasuk untuk membuat program diet racikan anda sendiri!</p>


                </div>
            </div>
        </div>
        <div class="clear height-20"></div>

        <div class="box-outer-list-landing">
            <div class="title">Kalkulator Nutrisi Anda</div>
            <div class="clear height-35"></div>

            <div class="list-data-landingproduk">
                    
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-calc-1.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Hitung Body Mass Index Anda !</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <p>Body Mass Index (BMI) adalah calculator yang kami sediakan secara sederhana untuk mengukur apakah anda berada pada level kelebihan berat badan atau sebaliknya</p>
                                <a class="fancy-popup fancybox.ajax btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/calc', 'type'=>'bmi')); ?>" >Hitung BMI</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-calc-2.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Hitung Basal Metabolic Rate Anda !</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <p>Basal Metabolic Rate (BMR) adalah jumlah energi yang dikeluarkan saat beristirahat di lingkungan yang netral dan pada iklim standar. Hitung BMR Anda dengan kalkulator yang berguna ini!</p>
                                <a class="fancy-popup fancybox.ajax btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/calc', 'type'=>'bmr')); ?>" >Hitung BMR</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-calc-3.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Kalkulasi kebutuhan kalori Anda setiap hari !</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <p>Menghitung BMR saja tentunya tidak cukup ! Karena anda pada dasarnya tidak akan berdiam diri saja di kamar tidur tanpa melakukan aktivitas apapun. Hitung kebutuhan kalori anda apabila anda ingin mempertahankan berat badan anda berdasar aktivitas yang anda lakukan sehari-hari !</p>
                                <a class="fancy-popup fancybox.ajax btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/calc', 'type'=>'kalori')); ?>" >Kalkulasi</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-calc-4.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Kalkulasi Kebutuhan Minum Air Putih Anda Setiap Hari !</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <p>Air sangat penting bagi kesehatan kita. Air memiliki banyak manfaat kesehatan dan berpengaruh langsung pada latihan anda. Cari tahu berapa banyak air yang harus Anda minum dengan kalkulator berguna di bawah ini!</p>
                                <a class="fancy-popup fancybox.ajax btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/calc', 'type'=>'minum')); ?>" >Kalkulasi</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'goal'=>$value->slug)); ?>">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-calc-5.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Kalkulasi Kebutuhan Asupan Nutrisi Untuk Tujuan Fitness Anda !</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                <p>Dengan kalkulator ini anda dapat menghitung seberapa besar kalori beserta dengan makronutrisinya (protein, karbohidrat dan lemak) sesuai dengan tujuan anda (menaikkan atau menurunkan berat badan anda) </p>
                                <a class="fancy-popup fancybox.ajax btn btn-add-to-cart bt-purple-product bt-view-produk" href="<?php echo CHtml::normalizeUrl(array('/blog/calc', 'type'=>'nutrisi')); ?>" >Kalkulasi</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="clear height-40"></div>
                    <div class="border-dashed"></div>
                    <div class="clear height-40"></div>
                
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