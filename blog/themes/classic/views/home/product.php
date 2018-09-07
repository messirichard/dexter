<?php
$this->breadcrumbs = array(
    'Product'
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
            <div class="col-md-3">
                <div class="padding-left-30 padding-top-10">
                    <div class="left-side">
                        <h3>Alcohol</h3>
                        <ul class="menu-left-side">
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Alcoholic Desserts <span>(23)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Beer / Bir <span>(8)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Wine <span>(10)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Liquer <span>(13)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Sake <span>(5)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Spirit <span>(20)</span></a></li>
                            <li><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Wine Accessories <span>(3)</span></a></li>
                        </ul>
                        <div class="height-20"></div>
                        <p>
                            <i class="glyphicon glyphicon-th-large"></i> <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">View All</a>
                        </p>
                        <div class="height-20"></div>

                        <h3>Filter Produk</h3>
                        <h4>Harga</h4>
                        <?php 
                        $optionHarga = array(
                            "Kurang dari Rp 50.000",
                            "Rp 50.000 - Rp 100.000",
                            "Rp 100.000 - Rp 250.000",
                            "Rp 250.000 - Rp 500.000",
                            "Rp 500.000 - Rp 1.000.000",
                        )
                        ?>
                        <div class="option-product">
                        <?php foreach ($optionHarga as $key => $value): ?>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            <?php echo $value ?>
                          </label>
                        </div>
                        <?php endforeach ?>
                        </div>

                        <h4>Promo</h4>
                        <?php 
                        $optionHarga = array(
                            "Hanya produk diskon",
                            "Produk bundling",
                        )
                        ?>
                        <div class="option-product">
                        <?php foreach ($optionHarga as $key => $value): ?>
                        <div class="checkbox">
                          <label>
                            <a href="#">
                            <input type="checkbox" value="">
                            <?php echo $value ?>
                            </a>
                          </label>
                        </div>
                        <?php endforeach ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <div class="padding-left-5 padding-right-25">
                <div class="height-20"></div> 
                <div class="promo-box-container">
                    <div class="promo-box-content">
                        Promo:
                        <h3>
                        Minimum pembelanjaan Rp 200.000 di kategori Alcohol, <br>
                        gratis biaya pengiriman - khusus Surabaya, Jakarta & Bali.
                        </h3>
                    </div>
                </div>
                <div class="title-product-overview">
                    <h1>Alcohol</h1>
                    <h2>Menampilkan <b>140</b> produk</h2>
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
                <div class="control-filter">
                    Sortir berdasar
                    <select name="test" class="select-custom">
                        <option value="Produk Terbaru">Produk Terbaru</option>
                        <option value="Termurah ke termahal">Termurah ke termahal</option>
                        <option value="Termahal ke termurah">Termahal ke termurah</option>
                        <option value="Abjad A - Z">Abjad A - Z</option>
                        <option value="Abjad Z - A">Abjad Z - A</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    Tampilkan
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">12</a> |
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">24</a> |
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">72</a>
                    <div class="pagination-filter">
                        <div class="pagination-product">
                            <a href="" class="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="active" href="<?php echo CHtml::normalizeUrl(array('/')); ?>">1</a>
                            <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">2</a>
                            <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">3</a>
                            <a href="" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-container">
                    <?php for ($i=0; $i < 12 ; $i++) { ?>
                    <?php if ((($i+1) % 3) == 0 ): ?>
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
                <div class="control-filter">
                    Sortir berdasar
                    <select name="test" class="select-custom">
                        <option value="Produk Terbaru">Produk Terbaru</option>
                        <option value="Termurah ke termahal">Termurah ke termahal</option>
                        <option value="Termahal ke termurah">Termahal ke termurah</option>
                        <option value="Abjad A - Z">Abjad A - Z</option>
                        <option value="Abjad Z - A">Abjad Z - A</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    Tampilkan
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">12</a> |
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">24</a> |
                    <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">72</a>
                    <div class="pagination-filter">
                        <div class="pagination-product">
                            <a href="" class="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="active" href="<?php echo CHtml::normalizeUrl(array('/')); ?>">1</a>
                            <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">2</a>
                            <a href="<?php echo CHtml::normalizeUrl(array('/')); ?>">3</a>
                            <a href="" class="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="height-15"></div>
                <div class="text-bottom-product">
                    <p>
                    <b>galerifitness.com - Alcohol</b> <br>
                    Galeri Fitness menjual produk Alcohol merk asli resmi / original dengan harga terbaik. Pembeli produk Pandaku.com Alcohol di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
                    </p>
                </div>
                <div class="height-15"></div>


            </div>
            </div>
            <div class="clear"></div>

        </div>
<script>
$(function() {

var selectBox = $(".select-custom").selectBoxIt();

});
</script>
