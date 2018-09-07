<div class="content-inside-about prelatif">
	<div class="clear h140"></div>
	<div class="prelatif container padding-left-30">
		<div class="left breadcumb">
			<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a> 
			&gt; <b>Error <?php echo $error['code'] ?></b>
		</div>
		<div class="clear height-10"></div>
		<div class="clear"></div>
	</div>
	<div class="lines-green"></div>
	<div class="prelatif container margin-left-30">
		<div class="clear height-25"></div>

		<!-- /. start left content -->
		<div class="left w257 left-content">
			<div class="inside w232">
				<div class="t-nws-detail text-gothic"><b>Articles & Publication Index</b></div>
				<div class="clear height-10"></div>
				<div class="menu-left-inscontent">
					<ul>
						<?php foreach ($dataSub as $key => $value): ?>
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
			<div class="text-content inside det-articles">
				<h1 class="title-toppages"><font style="font-weight: normal;">Error <?php echo $error['code'] ?></font></h1>
				<div class="clear height-20"></div>
					<h4><?php echo CHtml::encode($error['message']); ?></h4>
        
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