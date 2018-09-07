<?php
$this->pageTitle = $data['title'].' - '.$this->pageTitle;
?>
<div class="content-inside-about prelatif">
	<div class="clear h140"></div>
	<div class="prelatif container padding-left-30">
		<div class="left breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a> &gt; <b>Services & Facilities</b></div>
		<div class="clear height-10"></div>
		<div class="clear"></div>
	</div>
	<div class="lines-green"></div>
	<div class="prelatif container margin-left-30">
		<div class="clear height-25"></div>

		<!-- /. start left content -->
		<div class="left w257 left-content">
			<div class="inside w232">
				<?php foreach ($menu as $key => $v_Category): ?>
				<div class="t-nws-detail text-gothic"><b><?php echo ucwords($v_Category->category); ?></b></div>
				<div class="clear height-10"></div>
				<div class="menu-left-inscontent">
					<?php $menusub = Service::Model()->getMenuByCategory(1, $v_Category->service_category_id); ?>
					<!-- <ul> -->
						<?php $this->widget('zii.widgets.CMenu', array(
							    'items'=>$menusub,
							    'encodeLabel'=>false,
							)); ?>
					<!-- </ul> -->
				</div>
				<div class="clear height-20"></div>
				<?php endforeach ?>

			</div>
			<div class="clear"></div>
		</div>
		<!-- /. End left content -->
		
		<!-- /. start right content -->
		<div class="left w842 right-content">
			<div class="text-content inside">
				<h1 class="title-toppages"><font style="font-weight: normal;">Services & Facilities from</font></h1>
				<div class="clear height-3"></div>
				<h1 class="title-toppages">Surabaya Spine Clinic</h1>
				<div class="clear height-20"></div>

				<div class="list-item-facilities-data">
					<div class="row">
								<?php $categr = ''; ?>
								<?php foreach ($layanan as $key => $value): ?>				
								<?php if ($value->category != $categr): ?>
									<div class="clear"></div>
									<div class="name_kategori text-gothic">
										<?php 
											echo $value->category_name.':';
										?>
									</div>
									<div class="clear height-20"></div>
								<?php endif; ?>

								<div class="col-xs-4">
									<div class="item prelatif">
										<div class="pic"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(275,186, '/images/service/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo $value->title ?>"></div>
										<div class="clear height-20"></div>
										<div class="w220 tengah text-gothic h115">
											<div class="title"><?php echo ucwords( $value->title ); ?></div>
											<!-- <div class="clear height-15"></div> -->
											<div class="desc"><p><?php echo substr(strip_tags($value->content), 0, 45) ; ?>...</p></div>
										</div>
										<div class="bc-readmore-item text-gothic"><a href="<?php echo CHtml::normalizeUrl(array('/layanan/view', 'id'=>$value->id, 'url'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>">read more&nbsp;&nbsp;&nbsp; <i class="icon-mr-bt-facilities-item"></i> </a></div>
										<div class="back-shadow-item-fclities"></div>
									</div>	
								</div>
								<?php $categr = $value->category; ?>
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