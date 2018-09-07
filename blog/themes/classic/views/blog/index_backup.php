<?php
$this->breadcrumbs = array(
    'Tips & Artikel',
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
        </div>
        <div class="clear"></div>
        <div class="height-10"></div>
        <div class="product-list-warp no-background">
            <div class="col-md-4">
                <div class="margin-left-50">
                    <div class="left-side padding-left-5">
                        <span class="n-text">Lihat Tips & Artikel berdasarkan:</span>
                        <div class="clear height-10"></div>
                        <div class="lines-red"></div>
                        <div class="clear height-10"></div>

                        <h4 class="no-border"><b>BERDASARKAN</b> ARSIP TANGGAL</h4>
                        <div class="lines-red"></div>
                        <div class="clear height-5"></div>
                         <div class="option-product">
                             <?php $this->widget('zii.widgets.CMenu', array(
                                'items'=>$menu,
                                'encodeLabel'=>false,
                                'htmlOptions'=>array(
                                    'class'=>'menu-artikel',
                                ),
                            )); ?>
                        </div>
                        <div class="clear height-10"></div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="back-white-rghtcontent-product">
                    <div class="padding-left-5">
                        <div class="height-20"></div> 
                        <div class="title-product-overview">
                            <h1>Tips & Artikel</h1>
                            <h2>Menampilkan <b><?php echo $data['jml'] ?></b> artikel</h2>
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
                        <form action="<?php echo $this->createUrl('/blog/index'); ?>" method="get">
                        <?php
                        $orderGet = $get;
                        unset($orderGet['order']);
                        ?>
                        <?php if (count($orderGet) > 0): ?>
                        <?php foreach ($orderGet as $key => $value): ?>
                        <input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
                        <?php endforeach ?>
                        <?php endif ?>
                        <div class="control-filter">
                            Sortir berdasar
                            <select name="order" class="select-custom" id="select-order">
                                <option value="new">Artikel Terbaru</option>
                                <option value="from-a">Abjad A - Z</option>
                                <option value="from-z">Abjad Z - A</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;

                            <?php
                            $perpageGet = $get;
                            $perpageGet['perpage'] = 12;
                            ?>
                            Tampilkan
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">12</a> |
                            <?php $perpageGet['perpage'] = 24; ?>
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">24</a> |
                            <?php $perpageGet['perpage'] = 72; ?>
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">72</a>
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
                                </div>
                            </div>
                        </div>
                        </form>
                        <script type="text/javascript">
                        $('#select-order').change(function() {
                            $(this).parent().parent().submit();
                        })
                        $('#select-order').val('<?php echo $_GET['order'] ?>');
                        </script>
                        <div class="product-container">


        	                <?php foreach ($data['data'] as $key => $value): ?>
        	                <?php if ((($key+1) % 3) === 0 ): ?>
                            <!-- border-none -->
        	                <div class="product-list list-fitness-p">
        	                <?php else: ?>
        	                <div class="product-list list-fitness-p">
        	                <?php endif ?>
        	                    <div class="product-image">
        	                        <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title))); ?>">
                                        <!-- $value->image -->
        	                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(170,170, '/images/blog/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
        	                        </a>
        	                    </div>
                                <div class="left dsk-detail">
                                    <div class="margin-right-25">
                	                    <div class="product-name">
                	                        <h3>
                	                            <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title))); ?>">
                	                                <?php echo $value->title ?>
                	                            </a>
                	                        </h3>
                	                    </div>
                                        <div class="clear height-10"></div>
                                        <div class="product-intro">
                                            <?php echo substr(strip_tags($value->content), 0, 250) ?>
                                        </div>
                                        <div class="clear height-10"></div>
                                        <div class="ds-bt-product"><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title))); ?>" class="btn bt-purple-product">BACA ARTIKEL</a></div>
                                    </div>
                                    <div class="clear"></div>
            	                   
                                </div>
                                
                                <div class="clear"></div>
        	                </div>
        	                <?php endforeach ?>
                            

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
                        <form action="<?php echo $this->createUrl('/blog/index'); ?>" method="get">
                        <?php
                        $orderGet = $get;
                        unset($orderGet['order']);
                        ?>
                        <?php if (count($orderGet) > 0): ?>
                        <?php foreach ($orderGet as $key => $value): ?>
                        <input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
                        <?php endforeach ?>
                        <?php endif ?>
                        <div class="control-filter">
                            Sortir berdasar
                            <select name="order" class="select-custom" id="select-order">
                                <option value="new">Artikel Terbaru</option>
                                <option value="from-a">Abjad A - Z</option>
                                <option value="from-z">Abjad Z - A</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;

                            <?php
                            $perpageGet = $get;
                            $perpageGet['perpage'] = 12;
                            ?>
                            Tampilkan
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">12</a> |
                            <?php $perpageGet['perpage'] = 24; ?>
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">24</a> |
                            <?php $perpageGet['perpage'] = 72; ?>
                            <a href="<?php echo $this->createUrl('/blog/index', $perpageGet); ?>">72</a>
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
                        </div>
                        </form>
                        <script type="text/javascript">
                        $('#select-order2').change(function() {
                            $(this).parent().parent().submit();
                        })
                        $('#select-order2').val('<?php echo $_GET['order'] ?>');
                        </script>
                        <div class="height-15"></div>
                        <div class="text-bottom-product">
                            <p>
                            <b>Galerifitness.com - Suplemen Fitness - WHEY PROTEIN</b> <br>
                            Galerifitness menjual suplemen fitness atau produk WHEY PROTEIN merk asli resmi / original dengan harga terbaik. Pembeli produk Galerifitness.com WHEY PROTEIN di Surabaya, Jakarta, Bali serta seluruh Indonesia akan memperoleh keuntungan berbelanja dengan harga terbaik dan lebih murah.
                            </p>
                        </div>
                        <div class="height-15"></div>
                    </div>
                    </div>
            </div>
            <div class="clear"></div>

        </div>

        <div class="clear"></div>
    </div>

  <div class="clear height-50"></div>
  <div class="clear height-30"></div>
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