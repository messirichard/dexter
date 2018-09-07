<style type="text/css">
	.t-back-fc-healing {
		margin-top: 125px;
	}
</style>
<div class="outer-content">
			<div class="ill-inside-pages-outer3" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/asset/images/ill-life-group-menu.jpg);">
				<!-- <img class="img-responsive" src="<?php // echo Yii::app()->baseUrl; ?>/asset/images/ill-about.jpg" alt=""> -->
					<div class="ds-tx-illinside">
							<div class="prelatif container">
								<div class="clear height-50"></div>
								<div class="height-20"></div>
								<div class="t-back-fc-healing center">
									We dream of creating environments where people from every walk of life can connect deeply with God and with others who are heading in the same direction. For a growing church like New Life Church the only way to do that is to grow smaller as we grow larger.
								</div>
							</div>
					</div>
			</div>
			<div class="clear"></div>
			<div class="lines-pink"></div>

			<div class="outer-inside-content">
				<div class="prelatif container">
						<div class="clear height-35"></div>
						<div class="top">
							<div class="left title-topsitel"><b>Life Group</b> at New Life Church</div>
							<div class="right breadcumb text-raleway">
								<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a>  &gt;  <b>Life Group</b>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="height-2"></div>
						<div class="lines-black"></div>
						<div class="clear height-35"></div>
						
						<div class="inside content-text">

							<div class="list-data-healing">
								<div class="row">
									<?php foreach ($data as $key => $v_lfgroup): ?>
									<div class="col-md-4">
										<div class="item">
											<div class="pic">
												<a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detail', 'id'=> $v_lfgroup->id, 'slug'=>Slug::create($v_lfgroup->title) )); ?>">
													<img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(349,198, '/images/life/'.$v_lfgroup->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo Slug::create($v_lfgroup->title); ?>" title="<?php echo Slug::create($v_lfgroup->title); ?>">
												</a>
											</div>
											<div class="clear height-10"></div>
											<div class="name"><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detail', 'id'=>$v_lfgroup->id, 'slug'=>Slug::create($v_lfgroup->title) )); ?>"><?php echo $v_lfgroup->title ?></a></div>
											<div class="clearfix"></div>
										</div>
										<div class="clear height-30"></div>
									</div>
									<?php endforeach; ?>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="clear height-20"></div>
							<div class="clear height-15"></div>

							<div class="clear"></div>
						</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			

	<div class="clear"></div>
</div>