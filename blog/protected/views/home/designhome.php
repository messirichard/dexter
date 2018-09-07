<div class="container">
    <div class="slide-home">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl ?>/images/slide/slide-1.jpg" alt="Slide UBS Style">
                    <div class="slides-container">
                        <div class="line-slide"></div>
                        <h3>THE AXEL VINESSE COLLECTION</h3>
                        <div class="line-slide"></div>
                        <div class="height-30"></div>
                        <p>
                            A PLAYFUL CONTEMPORARY DESIGN <br>
                            COMBINING ETNICAL BOLDNESS WITH <br>
                            A PEEK OF THE FUTURE LIFESTYLE
                        </p>
                        <div class="height-20"></div>
                        <p>
                            <a class="button-border-black inverse" style="width: 180px;" href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">BROWSE JEWELRY</a> <br>
                        </p>
                        <p>
                            <a class="button-border-black inverse" style="width: 180px;" href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">VIEW PRODUCT</a>
                        </p>
                    </div>
                </li>
                <li>
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl ?>/images/slide/slide-1.jpg" alt="Slide UBS Style">
                </li>
            </ul>
        </div>
    </div>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/asset/js/FlexSlider/jquery.flexslider-min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/FlexSlider/flexslider.css');
?>
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: false,
  });
});
</script>
    <div class="category-banner-home">
        <div class="row">
            <div class="col-sm-4">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/thumb-category-woman.jpg" alt="category woman UBS Style" class="img-responsive"></a>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/thumb-category-man.jpg" alt="category man UBS Style" class="img-responsive"></a>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/thumb-category-kids.jpg" alt="category kids UBS Style" class="img-responsive"></a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="container-by-brand">
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/thumb-category-youth.jpg" alt="category kids UBS Style" class="img-responsive"></a>
            </div>
            <div class="col-md-6">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl ?>/asset/images/shop-by-brand.jpg" alt="Shop By Brand UBS Style"></a>
            </div>
        </div>
    </div>
    <div class="height-30"></div>
    <div class="line-grey"></div>
    <div class="height-30"></div>
    <div class="gift-lifestyle">
        <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl ?>/asset/images/lifestyle-gift-items.jpg" alt="Shop By Brand UBS Style"></a>
    </div>
    <div class="height-20"></div>
    <div class="sub-content-header">
        <div class="height-10"></div>
        <div class="line-grey"></div>
        <div class="title">
            <h3>LIFESTYLE BLOG</h3>
        </div>
    </div>
    <div class="height-20"></div>
    <div class="container-lifestyle-blog-home">
        <div class="col-md-3 col-sm-6">
            <div class="image-blog-home">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-raisya.jpg" alt="Blog Raisya UBS Style">
                </a>
            </div>
            <div class="blog-desc-home">
                <h3><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Model minute: Tips cantik ala Raisa untuk daily activity!</a></h3>
                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Beauty Stars</a></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="image-blog-home">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-sepatu-bulu.jpg" alt="Blog Raisya UBS Style">
                </a>
            </div>
            <div class="blog-desc-home">
                <h3><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Wow! Sepatu baru Louboutin bertabur bulu Ostritch!</a></h3>
                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Beauty Stars</a></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="image-blog-home">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-pallete.jpg" alt="Blog Raisya UBS Style">
                </a>
            </div>
            <div class="blog-desc-home">
                <h3><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Masquerade party? How to “still” look fabulous with nude pallete.</a></h3>
                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Beauty Stars</a></p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="image-blog-home">
                <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-model.jpg" alt="Blog Raisya UBS Style">
                </a>
            </div>
            <div class="blog-desc-home">
                <h3><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">2015 Trends is going to be ethnically Epic!</a></h3>
                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Beauty Stars</a></p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <p style="text-align: center;">
        <a class="button-border-black" href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">VIEW ALL ARTICLE</a>
    </p>
</div>
