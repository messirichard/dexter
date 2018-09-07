<div class="outer-middle">
	<div class="prelatif container">
			<div class="fcs-wrap region h222 prelatif">
				<div class="ill-page-inside"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/ill-event-gallery.jpg" alt="ill Event Gallery cheetam salt"></div>
				<div class="clearfix"></div>
			</div>
			<div class="clear height-15"></div>
			<div class="height-1"></div>
			<div class="region inside-content prelatif">
				<div class="clear height-5"></div>
				<div class="height-2"></div>

				<div class="left left-content-ins margin-right-35">
					<div class="ins">
						<h2 class="title"><?php echo Yii::t('main', 'event gallery') ?></h2>
						<div class="clear height-10"></div>
						<div class="lines-blue"></div>
						<div class="clear height-5"></div>

						<div class="menu-inside">
							<ul>
								<?php foreach ($menu as $key => $value): ?>
								<?php foreach ($value as $k => $v): ?>
								<li><a href="<?php echo CHtml::normalizeUrl(array('event/index', 'year'=>$key, 'month'=>$k, 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::app()->locale->getMonthName($k) ?> <?php echo $key ?></a>
									<ul>
										<?php foreach ($v as $ke => $val): ?>

										<li <?php if ($v == $_GET['id']): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/event/detail', 'id'=>$val->id, 'slug'=>Slug::create($val->title), 'lang'=>Yii::app()->language)); ?>"><?php echo $val->title ?></a></li>
										<?php endforeach ?>
									</ul>
								</li>
								<li class="separator"></li>
								<?php endforeach ?>
								<?php endforeach ?>
							</ul>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="left right-content">
						<div class="clear height-20"></div>
						<div class="right breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'home') ?></a> &gt; <b><?php echo Yii::t('main', 'event gallery') ?></b></div>
						<div class="clear height-25"></div>
						<div class="content-text">
							<?php foreach ($gallery as $key => $value): ?>
							<h5><a href="<?php echo CHtml::normalizeUrl(array('/event/detail', 'id'=>$value->id, 'slug'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>"><?php echo $value->title ?></a></h5>
							<?php echo Common::replaceBr(nl2br($value->content)) ?>
							
							<div class="clear height-10"></div>
							<div class="list-gallery">
								<div class="row">
									<?php foreach ($value->galleryPhotos as $k => $v): ?>
									<div class="col-xs-3">
										<div class="item">
											<a class="fancybox" rel="gallery-<?php echo $key ?>" href="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(640,640, '/images/gallery/'.$v->rank.'.jpg' , array('method' => 'resize', 'quality' => '90')) ?>">
												<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(150,108, '/images/gallery/'.$v->rank.'.jpg' , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
											</a>
										</div>
									</div>
									<?php endforeach ?>
									<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
									    'target'=>'.fancybox',
									    'config'=>array(),
									    )
									); ?>
									<div class="clearfix"></div>
								</div>
							</div>
							<hr style="margin: 0px; margin-bottom:30px;">
							<?php endforeach ?>
							<?php $this->widget('CLinkPager', array(
							    'pages' => $pages,
							)) ?>

							<div class="clear"></div>
							<div class="clear height-20"></div>
						</div>

					<div class="clearfix"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear height-10"></div>
			<div class="height-2"></div>
			
		<div class="clearfix"></div>
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
	$('.menu-inside li ul').hide();
	$('.menu-inside > ul > li > a').click(function() {
		$(this).parent().find('ul').toggle();
		return false;
	});
</script>