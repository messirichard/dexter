<div class="content-inside-about prelatif">
	<div class="clear h140"></div>
	<div class="prelatif container padding-left-30">
		<div class="left breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a> &gt; <b>Articles & Publication</b></div>
		<div class="clear height-10"></div>
		<div class="clear"></div>
	</div>
	<div class="lines-green"></div>
	<div class="prelatif container margin-left-30">
		<div class="clear height-25"></div>

		<!-- /. start left content -->
		<div class="left w257 left-content" style="height: 100px;">
			<div class="inside w232">

				<div class="menu-left-inscontent">
					<ul>
						<?php foreach ($data as $key => $value): ?>
							<li><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title))); ?>">
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
				
				<h1 class="title-toppages"><font style="font-weight: normal;">Articles & Publication</font></h1>
				<div class="clear height-3"></div>
				<h1 class="title-toppages">Surabaya Spine Clinic</h1>
				<div class="clear height-25"></div>
				<!-- <p>Sorry, There is no Articles at the moment.</p> -->
				<div class="list-item-facilities-data">
					<div class="row">
							<?php foreach ($data as $key => $value): ?>
								<div class="col-xs-4">
									<div class="item prelatif">
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(275,186, '/images/artikel/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->title ?>"></div>
										<div class="clear height-20"></div>
										<div class="w220 tengah text-gothic h115">
											<div class="title"><?php echo ucwords( $value->title ); ?></div>
											<!-- <div class="clear height-15"></div> -->
											<div class="desc"><p><?php echo substr(strip_tags($value->content), 0, 45) ; ?>...</p></div>
										</div>
										<div class="bc-readmore-item text-gothic"><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title))); ?>">read more&nbsp;&nbsp;&nbsp; <i class="icon-mr-bt-facilities-item"></i> </a></div>
										<div class="back-shadow-item-fclities"></div>
									</div>	
								</div>
							<?php endforeach; ?>
					</div>
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