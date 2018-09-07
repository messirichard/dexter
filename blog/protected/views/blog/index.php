<div class="container">
    <div class="container-breadcrump">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                    <li class="active">LIFESTYLE BLOG</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-blog-list">
        <div class="row">
            <div class="col-sm-2 containersub-blog-list">
                <div class="height-15"></div>
                <h3 class="product-list-title">LIFESTYLE BLOG</h3>
                <div class="height-10"></div>
                <div class="line-grey"></div>
                <ul class="list-unstyled list-left-menu">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">ON THE SPOTLIGHT</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">FASHION GUIDE</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">BEAUTY TIPS</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">BEAUTY STARS</a></li>
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">LIFESTYLE EVENTS</a></li>
                </ul>
            </div>
            <div class="col-sm-10">
                <div class="content-header-product">
                    <div class="height-10"></div>
                    <div class="row">
                        <div class="col-lg-8">
                            <span class="product-list-title">&nbsp;</span>
                            <span>25 articles on UBS Lifestyle Blog</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="pull-right">
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async></script>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_native_toolbox"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="height-10"></div>
                </div>

                <div class="line-grey"></div>
                <div class="height-20"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="container-image-blog">
                            <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail')); ?>">
                                <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-image-1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="title-blog"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail')); ?>">Bagaimana tampil sederhana, namun tetap “Fabulous” seperti Chelsea Islan</a></h1>
                        <div class="height-20"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Oktober 21, 2014 - <span class="recommended-product-price">Beauty Stars</span></p>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-creator">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/user/foto-member.jpg" alt="User UBS LifeStyle">
                                    By Peter Adrianus
                                </div>
                            </div>
                        </div>
                        <div class="height-20"></div>
                        <div class="blog-teks">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam convallis mauris et arcu bibendum, in placerat nisi semper. Vivamus eu risus aliquam, vehicula magna eu, sodales elit. Quisque pellentesque est sed dolor fermentum, eget porta diam ultricies. Mauris id viverra diam. Vestibulum pretium purus accumsan molestie bibendum. Nullam sed purus vitae mi viverra volutpat. Vestibulum vulputate metus quis velit semper venenatis. Curabitur sed sapien justo. Integer eu urna lorem. Phasellus ac auctor quam. Vivamus gravida posuere tortor, eu placerat metus tincidunt non. Nulla ultrices eu purus quis mattis. Praesent ut orci molestie, molestie leo ac, ornare est. Maecenas ornare leo faucibus, rutrum diam a, finibus risus. Nunc congue laoreet porttitor.</p>
                            <p>Nulla ullamcorper ipsum vel dui egestas mattis. Aenean ut convallis augue. Integer nec tempor nibh. Fusce quis odio id est tempor mollis vitae at ex. In ut est pellentesque, porttitor est eu, eleifend lectus. Sed sollicitudin leo non ante elementum ultricies. Quisque vel varius orci, in elementum urna.</p>
                            <p>
                                <a class="button-border-black" href="<?php echo CHtml::normalizeUrl(array('home/detail')); ?>">LEBIH LANJUT</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="height-20"></div>
                <div class="line-grey"></div>
                <div class="height-20"></div>
                <div class="container-lifestyle-blog-home">
                    <div class="row">
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <div class="col-md-4 col-sm-6 blog-list-container">
                            <div class="image-blog-home">
                                <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-raisya.jpg" alt="Blog Raisya UBS Style">
                                </a>
                            </div>
                            <div class="blog-desc-home">
                                <h3><a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Model minute: Tips cantik ala Raisa untuk daily activity!</a></h3>
                                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Beauty Stars</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 blog-list-container">
                            <div class="image-blog-home">
                                <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-sepatu-bulu.jpg" alt="Blog Raisya UBS Style">
                                </a>
                            </div>
                            <div class="blog-desc-home">
                                <h3><a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Wow! Sepatu baru Louboutin bertabur bulu Ostritch!</a></h3>
                                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Beauty Stars</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 blog-list-container">
                            <div class="image-blog-home">
                                <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/blog/blog-pallete.jpg" alt="Blog Raisya UBS Style">
                                </a>
                            </div>
                            <div class="blog-desc-home">
                                <h3><a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Masquerade party? How to “still” look fabulous with nude pallete.</a></h3>
                                <p>Jul 21, 2014 - <a href="<?php echo CHtml::normalizeUrl(array('blog/detail')); ?>">Beauty Stars</a></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="clear"></div>
                <p style="text-align: center;">
                    <a class="button-border-black" href="<?php echo CHtml::normalizeUrl(array('blog/index')); ?>">LOAD MORE ARTICLE</a>
                </p>

            </div>
        </div>
    </div>
</div>
