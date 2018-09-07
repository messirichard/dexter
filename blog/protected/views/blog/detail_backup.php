<?php
$this->breadcrumbs = array(
    'Tips & Artikel'=>array('/blog/index'),
    $detail->title,
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
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>" class="link-backpage"><i class="icon-chev-back"></i>&nbsp;Back</a>
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
                            <?php /*
							<?php foreach ($menu as $key => $value): ?>
                            <div class="checkbox">
                                <label>
                                    <a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'year'=>$value['year'], 'month'=>$value['month'])); ?>">
                                        <!-- <?php // if ($_GET['year']==$value['year'] AND $_GET['month']==$value['month']): ?>checked="checked"<?php // endif ?> -->
                                        <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                        <?php echo $value['label'] ?>
                                    </a>
                                        <!-- sub option artikel -->
                                        <span class="checkbox"><label></label></span>
                                </label>
                            </div>
							<?php endforeach ?>
                             */ ?>
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
                            <h1><?php echo $detail->title ?></h1>
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
                        <div class="content-text">
							<img align="left" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/blog/'.$detail->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">                        	
							<?php echo $detail->content; ?>
                        </div>
                        <div class="clear"></div>
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
<script>
$(function() {

var selectBox = $(".select-custom").selectBoxIt();

});
</script>
<?php /*
<div class="outer-content">
			
			<div class="clear"></div>
			<div class="outer-inside-content">
				<div class="prelatif container">
						<div class="clear height-50"></div>
						<div class="clear visible-lg height-45"></div>
						<div class="top">
							<div class="left title-topsitel"><b>Blogs</b> at New Life Church</div>
							<div class="right breadcumb text-raleway margin-right-25">
								<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a>  &gt;  <a href="<?php echo CHtml::normalizeUrl(array('home/news')); ?>">Blogs</a> &gt; <?php echo $detail->title ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="height-2"></div>
						<div class="lines-black"></div>
						<div class="clear height-35"></div>
						
						<div class="inside content-text">
							<div class="row">
								<div class="col-md-3">
									<div class="left-content">
										<div class="left b-previousdblog">
											<a href="<?php echo CHtml::normalizeUrl(array('blog/index')); ?>" class="bt previous-blog">&lt; Back to blog</a>
										</div>
										<div class="clear height-20"></div>
											<h6 class="title-newsst">BY WRITERS</h6>
											<div class="clear height-5"></div>
											<div class="list-sect-blogs">
												<ul>
													<?php foreach ($writer as $key => $value): ?>
													<li><a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'writer'=>$value->writer, 'writer_name'=>Slug::create($value->writer_name))); ?>"><?php echo $value->writer_name ?></a></li>
													<?php endforeach ?>
												</ul>
												<div class="clear"></div>
											</div>

											<div class="clear height-35"></div>
											<h6 class="title-newsst">BY ARCHIVE DATE</h6>
											<div class="clear height-5"></div>
											<div class="list-sect-blogs">
												<ul>
													<?php foreach ($menu as $key => $value): ?>
													<li><a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'year'=>$value['year'], 'month'=>$value['month'])); ?>"><?php echo $value['label'] ?></a></li>
													<?php endforeach ?>
												</ul>
												<div class="clear"></div>
											</div>



										<div class="clear"></div>
									</div>
								</div>
								<div class="col-md-9">
									<div class="right-content right w755">
											
											<div class="data-news-blog">
													<div class="item no-border">
														<div class="top">
															<h1 class="titlt"><?php echo $detail->title ?></h1>
															<div class="clear height-15"></div>
															<div class="left dDate"><span class="date"><?php echo date("F d, Y" ,strtotime($detail->date_input)) ?></span></div>
															<div class="right author">
																<div class="left thumb-pic"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-pic-example.jpg" alt=""></div>
																<div class="left txt padding-left-10"><?php echo $detail->writer_name ?></div>
															</div>
															<div class="clear height-15"></div>
														</div>
														<div class="clear height-15"></div>
														<div class="center">
															<div class="pic"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(752,446, '/images/blog/'.$detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt=""></div>
																<div class="clear height-35"></div>
															<div class="desc">
																<?php echo $detail->content; ?>

																<div class="clear"></div>
															</div>
															<div class="clear height-25"></div>
														</div>

													</div>

												<div class="clear"></div>
											</div>

											<!-- <div class="clear height-40"></div> -->
											<div class="clear height-15"></div>
											
											<!-- <div class="b-othersblog-data">
												<div class="top">
													<div class="dtitle">Other Blogs</div>
												<div class="clear height-10"></div>
												</div>
												<div class="clear"></div>
												<div class="middle">
														<div class="clear height-20"></div>
														<div class="list">
															<div class="row">
																<div class="col-md-6">
																	<div class="item">
																		<div class="pic margin-right-10 left">
																			<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-news-pic2.jpg" alt="">
																		</div>
																		<div class="left text w265">
																			<p>&quot;Breathtaking&quot;: The White House Releases Its Climate Heavy Hitter on the Polar Vortex</p>
																			<div class="clear height-2"></div>
																			<span class="date">January 15, 2014</span>
																			<div class="clear height-2"></div>
																			<span class="ps">Ps. Irwan Alexander</span>
																		</div>
																		<div class="clear"></div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="item">
																		<div class="pic margin-right-10 left">
																			<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-news-pic2.jpg" alt="">
																		</div>
																		<div class="left text w265">
																			<p>&quot;Breathtaking&quot;: The White House Releases Its Climate Heavy Hitter on the Polar Vortex</p>
																			<div class="clear height-2"></div>
																			<span class="date">January 15, 2014</span>
																			<div class="clear height-2"></div>
																			<span class="ps">Ps. Irwan Alexander</span>
																		</div>
																		<div class="clear"></div>
																	</div>
																</div>
															</div>
															<div class="clear"></div>
														</div>
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div> -->
											

										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear height-50"></div>
							<div class="clear height-15"></div>

							<div class="clear"></div>
						</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			

	<div class="clear"></div>
</div>
*/ ?>