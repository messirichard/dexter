<?php
$this->breadcrumbs = array(
    'How To Order Galeri Fitness',
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
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product content-text">
    <div class="padding-15">
        <!-- inside goal content -->
        <div class="clear height-5"></div>
        <div class="height-3"></div>
        <div class="left back-title-landingproduct">
            <div class="text">
                HOW TO ORDER
            </div>
        </div>
        <div class="left back-tail-title-landingproduct hidden-xs"></div>

        <div class="clear visible-xs"></div>

        <div class="right bs-share" style="margin-top: 5px;">
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

        <div class="about-text">
            <div class="height-10"></div>
            <div class="height-10"></div>
            <div class="height-10"></div>
            <div class="w-720 tengah">
                <h2>Ikuti Langkah Berikut</h2>
            </div>
            <div class="w-1000 tengah">
            <div class="row">
                <div class="col-md-3">
                        <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ill-howto-lihat.jpg" alt="">
                        <div class="height-20"></div>
                        <p>Pilih produk yang Anda inginkan</p>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ill-howto-cart.jpg" alt="">
                        <div class="height-20"></div>
                        <p>Klik tombol &ldquo;Add to cart&rdquo; dan klik tombol <br> &ldquo;My Cart&rdquo; terletak di sudut kanan atas <br> halaman</p>
                </div>
                <div class="col-md-3">
                     <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ill-howto-selesai.jpg" alt="">
                        <div class="height-20"></div>
                        <p>Perika barang belanjaan Anda dan Klik <br>tombol &ldquo;Selesai Belanja&rdquo;</p>
                </div>
                <div class="col-md-3">
                     <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ill-howto-periksa.jpg" alt="">
                        <div class="height-20"></div>
                        <p>Perika alamat billing Anda dan pilih kota pengirim untuk efektifitas kiriman</p>
                </div>
            </div>
                   <div class="clear"></div>
            </div>
            <div class="tengah text-center bantuan_sup_phowto">
                <h4>Jika Anda membutuhkan bantuan langsung secara cepat, Anda dapat menghubungi Customer Service kami di:</h4>
                <!-- Logo BBM: 7D33844C     Logo WA/Line/Phone: 0898 9750 294 -->
                <div class="clear height-20"></div>
                <div class="w-ps-iconhowto tengah">
                    <dl class="dl-horizontal">
                        <?php if ($this->setting['bb_pin'] != ''): ?>
                          <dt><i class="icon-bbms"></i></dt>
                          <dd><?php echo $this->setting['bb_pin'] ?></dd>
                          <div class="clear"></div>
                        <?php endif ?>

                        <?php if ($this->setting['wa'] != ''): ?>
                          <dt><i class="icon-wa"></i></dt>
                          <dd><?php echo $this->setting['wa'] ?></dd>
                          <div class="clear"></div>
                        <?php endif ?>

                        <?php if ($this->setting['phone_2'] != ''): ?>
                          <dt><i class="icon-Line"></i></dt>
                          <dd><?php echo $this->setting['phone_2'] ?></dd>
                          <div class="clear"></div>
                        <?php endif ?>

                        <?php if ($this->setting['phone'] != ''): ?>
                          <dt><i class="icon-phone"></i></dt>
                          <dd><?php echo $this->setting['phone'] ?></dd>
                          <div class="clear"></div>
                        <?php endif ?>
                    </dl>
                <div class="clear"></div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="clear height-25"></div>
            <div class="w-720 tengah">
                <h3>Pembayaran dapat di lakukan ke nomor rekening di bawah ini</h3>
                <table width="100%">
                    <tr>
                        <?php foreach (Bank::model()->findAll() as $key => $value): ?>
                        <td valign="top">
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/bank/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                            <div class="height-10"></div>
                            <p><?php echo $value->no_rek ?> <br> a/n <?php echo $value->name ?></p>
                        </td>
                        <?php endforeach ?>
                    </tr>
                </table>
            </div>
            <div class="lines-grey-dashed w-1000 tengah"></div>
            <div class="height-40"></div>
            <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ill-online-support.jpg" alt="" align="center">
            <div class="height-40"></div>
            <div class="w-720 tengah">
            <h4>Jika Anda mengalami kesulitan dan butuh bantuan, Anda dapatmeminta bantuan
dari tim customer support online kami dengan menekan tombol chat di bagian bawah layar Anda.</h4>
            <div class="height-40"></div>
            <div class="height-40"></div>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="height-30"></div>

</section>