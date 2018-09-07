<?php
$this->breadcrumbs = array(
    'Tips & Artikel'=>array('/blog/index'),
    'Panduan Fitness untuk Pemula',
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
                Panduan Fitness untuk Pemula
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
                        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,305, '/asset/images/ill-panduan.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                    </div>
                    <div class="back-pic-landingproduct">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="desc left content-text">
                    <p>Tanpa ada panduan yang jelas, akan banyak dari anda yang akan gagal dalam program fitness anda. Dengan panduan ini, kami akan mengubah cara berpikir anda tentang diet, sehingga anda dapat lebih dekat dengan tujuan anda (baik diet ataupun menaikkan berat badan) dan tentunya dilakukan dengan cara yang sehat dan aman bagi tubuh anda. </p>
                    <h2>Kenapa tubuh anda perlu melakukan olahraga?</h2>
                    <p>Berolahraga secara teratur sangatlah penting bagi setiap orang, seperti yang telah anda ketahui sebelumnya. Bahkan, tubuh manusia dirancang untuk dapat beradaptasi terhadap tekanan pada saat berolahraga, seperti adaptasi yang timbul dari gerakan fitness yang akan merusak otot anda untuk perbaikan sel otot yang lebih besar dari sebelumnya.</p>

                </div>
            </div>
        </div>
        <div class="clear height-20"></div>

        <div class="box-outer-list-landing content-text">
            <div class="title">Beberapa manfaat dari berolahraga yang bisa anda dapat adalah:</div>
            <div class="clear height-35"></div>

            <div class="list-data-landingproduk">
                    
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pict">
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-panduan-1.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Mengontrol berat badan anda</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                Olahraga dapat membantu mencegah kelebihan berat badan atau membantu mempertahankan penurunan berat badan. Bila Anda terlibat dalam aktivitas fisik, Anda akan secara terus menerus membakar kalori. Semakin intens aktivitas anda, semakin banyak kalori yang Anda bakar.
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
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-panduan-2.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Membantu anda melawan penyakit dan kondisi tubuh yang lebih sehat</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                Mengesampingkan berat badan Anda saat ini, aktivitas olahraga akan meningkatkan kadar lemak baik (HDL) pada tubuh anda. Hal ini akan membuat darah Anda mengalir lancar, yang menurunkan risiko penyakit kardiovaskular. Bahkan, aktivitas fisik secara teratur dapat membantu Anda mencegah atau mengelola berbagai masalah kesehatan, termasuk stroke, diabetes tipe 2, depresi, jenis kanker tertentu dan lain-lain.
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
                                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(290,183, '/asset/images/ill-panduan-3.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="description">
                                <span class="judul">Meningkatkan energi anda</span>
                                <div class="clear height-10"></div>
                                <div class="lines-red"></div>
                                <div class="clear height-15"></div>
                                Aktivitas fisik yang teratur dapat meningkatkan kekuatan otot Anda dan meningkatkan daya tahan Anda. Latihan dan aktivitas fisik memberikan oksigen dan nutrisi ke jaringan Anda dan membantu kerja sistem kardiovaskular Anda lebih efisien. Dan ketika jantung dan paru-paru bekerja lebih efisien, Anda memiliki lebih banyak energi untuk pergi melanjutkan aktivitas harian Anda.
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
        <div class="list-data-landingproduk">
            <div class="item">
                <div class="box-landingdata" style="margin-right: 20px;">
                    <div class="content-text">
                        <p>Namun, banyak orang terutama mereka yang telah bekerja hanya melakukan olahraga aerobik seperti: berlari, bersepeda dan berenang. Hal inilah yang membuat banyak dari mereka mengalami kenaikan berat badan secara signifikan. Ini dikarenakan karena kurangnya aktivitas fisik seperti mengangkat beban yang akan anda jarang temui terutama apabila anda adalah pekerja kantoran. </p>
                        <p>Dengan fitness, olahraga anda akan lebih seimbang karena anda akan mengkombinasikan gerakan angkat beban dan gerakan aerobik di saat yang sama. Ini yang menjadi perbedaan terbesar antara fitness dengan olahraga lain pada umumnya. </p>

                        <h2>Apa yang harus anda pelajari sebelum memulai latihan anda?</h2>

                        <p>Memulai berolahraga hanyalah satu bagian kecil yang perlu anda lakukan, namun tanpa ada pengetahuan yang benar mengenai nutrisi dan fitness maka kemungkinan besar anda akan gagal dalam meraih tujuan anda. Berikut adalah basic-basic yang perlu anda ketahui sebelum memulai perjalanan anda di dunia fitness:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-outer-list-landing content-text">
            <div class="title">Beberapa manfaat dari berolahraga yang bisa anda dapat adalah:</div>
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
                                <?php echo substr(strip_tags($value->content), 0, 200); ?>
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
            <b>Galerifitness.com - Suplemen Fitness - WHEY PROTEIN</b> <br>
            Galerifitness menjual suplemen fitness atau produk FAT LOSS merk asli resmi / original dengan harga terbaik. Pembeli produk Galerifitness.com FAT LOSS di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
            </p>
        </div>
    </div>
<div class="clear height-20"></div>

</section>