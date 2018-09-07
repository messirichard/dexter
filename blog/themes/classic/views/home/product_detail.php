<?php
$this->breadcrumbs = array(
    'Product'=>array('/'),
    'Product Name ABCDE'
);
?>
<div class="height-30"></div>
<div class="breadcrump-container">
    <div class="pull-left">
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Home',array('/home/index')),
        )); ?>
    <?php endif?>
    </div>
    <div class="pull-right">
        <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">
        <i class="glyphicon glyphicon-chevron-left"></i> Back
        </a>
    </div>
</div>
<div class="clear"></div>
<div class="height-10"></div>
<div class="product-list-warp">
    <div class="padding-20">
        <div class="product-detail-image">
            <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ex-product3.jpg" alt="">
        </div>
        <div class="product-detail-container">
            <div class="title-product-overview">
                <h1>Product Name ABCD</h1>
                <h2>Category: Alcohol</h2>
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
            <div class="product-qty">
                <b>Beli sejumlah</b>
                &nbsp;&nbsp;&nbsp;
                <div class="input-qty-container">
                    <input type="text" class="form-control" value="1">
                    <a href="#" class="input-qty-up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="input-qty-down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                </div>
                Pcs

                <div class="pull-right">
                    Total
                    &nbsp;&nbsp;&nbsp;
                    <span class="price">Rp 85,000</span>
                </div>
            </div>
            <div class="clear"></div>
            <div class="height-5"></div>
            <div class="product-keterangan">
                <div class="col-xs-9">
                    <div class="padding-left-10 padding-top-5">
                        Biaya yang tertera adalah tidak termasuk biaya pengiriman. <br>
                        Biaya pengiriman akan dikalkulasikan total ada proses selesai belanja.
                    </div>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-add-to-cart">
                        Add to Cart
                    </button>
                </div>
            </div>
            <div class="clear"></div>
            <div class="height-10"></div>
            <hr>
            <div class="height-15"></div>
            <div class="product-label-keterangan">
                DESCRIPTION
            </div>
            <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
                <p>
                    This elegant product will suit to any style preferences. Very chic and stylish,
                suitable for the modern living style.
                </p>
            </div>
            <div class="product-label-keterangan">
                SHIPING INFO
            </div>
            <div class="content-text padding-left-10 padding-right-10 padding-top-10 ">
                <p>
                    Usually dispatches in 1-2 days after payment received
                </p>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="height-10"></div>
<div class="product-list-home-warp">
    <div class="product-title2">Anda mungkin juga ingin membeli...</div>
    <div class="height-40"></div>
    <div class="product-container">
        <?php for ($i=0; $i < 4 ; $i++) { ?>
        <?php if ((($i+1) % 4) == 0 ): ?>
        <div class="product-list border-none">
        <?php else: ?>
        <div class="product-list">
        <?php endif ?>
            <div class="product-image">
                <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/ex-product2.jpg" alt="">
                </a>
            </div>
            <div class="product-category">
                Grocery
            </div>
            <div class="product-name">
                <h3>
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">
                        Digestive Biscuits, easy
                        to chew for baby aged
                        5-6 months
                    </a>
                </h3>
            </div>
            <div class="product-price">
                Rp 75,000
            </div>
            <form action="<?php echo CHtml::normalizeUrl(array('/')); ?>">
                <div class="input-qty-container">
                    <input type="text" class="form-control" value="1">
                    <a href="#" class="input-qty-up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="input-qty-down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                </div>
                <button type="submit" class="btn btn-add-to-cart">
                    Add to Cart
                </button>
                <div class="clear"></div>
            </form>
            <div class="view-detail">
                <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">
                    <i class="glyphicon glyphicon-search"></i> View Detail
                </a>
            </div>
        </div>
        <?php } ?>
        <div class="clear"></div>
        <div class="height-20"></div>
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
    </div>
    <div class="clear"></div>


</div>
