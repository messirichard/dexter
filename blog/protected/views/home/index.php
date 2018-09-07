<div class="in-content">
                <div class="breadcumb" >
                    <div class="text-breadcumb"><a href="../index.php">Home</a> &gt; Blog</div>
                </div>
            <div class="box-content blog-news">
                <div class="text-cont-inside" style="padding-bottom: 50px;">
                    
                    <div class="blocks_list_blog">
                        <div class="row">
                            <?php foreach ($dataBlog->getData() as $key => $value): ?>
                            <div class="col-md-3">
                                <div class="items">
                                    <div class="picture">
                                        <a href="<?php echo CHtml::normalizeUrl(array('/home/detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(313,204, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></a>
                                    </div>
                                    <div class="info">
                                        <span class="dates"><i class="fa fa-calendar"></i> <?php echo date('d F Y', strtotime($value->date_input)) ?></span>
                                        <div class="names">
                                            <a href="<?php echo CHtml::normalizeUrl(array('/home/detail', 'id'=>$value->id)); ?>"><?php echo ucwords($value->description->title); ?></a>
                                        </div>
                                        <div class="clear"></div>
                                        <a href="<?php echo CHtml::normalizeUrl(array('/home/detail', 'id'=>$value->id)); ?>" class="btn btn-link btns_news_default">Lihat Artikel</a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div class="clear" style="height: 20px;"></div>
                </div>
                <br class="clear" />
            </div>
                <!-- div content -->
            </div>