<div class="in-content">
                <div class="breadcumb" >
                    <div class="text-breadcumb"><a href="../index.php">Home</a> &gt; <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Blog</a> &gt; <?php echo $detail->description->title ?></div>
                </div>
            <div class="box-content blog-news">
                <div class="text-cont-inside" style="padding-bottom: 50px;">
                    
                    <div class="blocks_sdetail_blog">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tops">
                                    <h4 class="names"><?php echo ucwords($detail->description->title); ?></h4>
                                    <div class="clear height-10"></div>
                                    <span class="dates_article"><i class="fa fa-calendar"></i> &nbsp;<?php echo date('d F Y', strtotime($detail->date_input)) ?></span>
                                </div>
                                <div class="picture">
                                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(980,450, '/images/blog/'.$detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
                                </div>
                                <div class="info description">
                                     <?php echo $detail->description->content ?>
                                      <?php 
                                      $baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl. $this->createUrl($this->route, $_GET);
                                      ?>

                                        <div class="clear height-10"></div>
                                        <div class="shares-text text-left p_shares_article">
                                            <span class="inline-t">SHARE</span>&nbsp; / &nbsp;<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $baseUrl ?>">FACEBOOK</a>&nbsp; /
                                            &nbsp;<a target="_blank" href="https://plus.google.com/share?url=<?php echo $baseUrl ?>">GOOGLE PLUS</a>&nbsp; /
                                            &nbsp;<a target="_blank" href="https://twitter.com/home?status=<?php echo $baseUrl ?>">TWITTER</a>
                                        </div>

                                        <div class="clear height-25"></div>
                                        <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>" class="backs_artikel"><i class="fa fa-chevron-left"></i> &nbsp;Kembali ke artikel lainnya</a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clear" style="height: 20px;"></div>
                </div>
                <br class="clear" />
            </div>
                <!-- div content -->
            </div>