<div class="content-inside-about prelatif">
	<div class="clear h140"></div>
	<div class="prelatif container padding-left-30">
		<div class="left breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a> &gt; <b>Promotions</b></div>
		<div class="clear height-10"></div>
		<div class="clear"></div>
	</div>
	<div class="lines-green"></div>
	<div class="prelatif container margin-left-30">
		<div class="clear height-25"></div>

		<!-- /. start left content -->
		<div class="left w257 left-content">
			<div class="inside">
				<div class="menu-left-inscontent">
					<ul>
						<?php foreach ($data as $key => $value): ?>
							<li><a href="<?php echo CHtml::normalizeUrl(array('/promotion/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>">
								<?php echo $value->title ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /. End left content -->
		
		<!-- /. start right content -->
		<div class="left w842 right-content">
			<div class="text-content inside">
				<h1 class="title-toppages"><font style="font-weight: normal;">Promotions from</font></h1>
				<div class="clear height-3"></div>
				<h1 class="title-toppages">Surabaya Spine Clinic</h1>
				<div class="clear height-25"></div>

				<div class="list-promotions">
					<?php if ($data): ?>
					<?php foreach ($data as $key => $value): ?>
					<div class="item">
						<div class="row">
							<div class="col-xs-5 w311">
								<div class="pic"><a href="<?php echo CHtml::normalizeUrl(array('/promotion/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>">
									<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(277,187, '/images/promotion/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
								</a></div>
							</div>
							<div class="col-xs-7 w528">
								<div class="title text-gothic"><a href="<?php echo CHtml::normalizeUrl(array('/promotion/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>"><?php echo $value->title ?></a></div>
								<div class="clear height-15"></div>
								<div class="desc text-gothic">
									<?php echo $value->content ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<?php endif ?>
					<div class="clear"></div>

				</div>

				<div class="clear height-35"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /. End right content -->

		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
		<div class="back-bottom-fcs-grey"></div>