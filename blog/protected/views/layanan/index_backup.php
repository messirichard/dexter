<?php
$this->pageTitle = $data['title'].' - '.$this->pageTitle;
?>
<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title"><?php echo $data['title'] ?></h1>
				<div class="fcs-line"></div>
				<div class="height-15"></div>
				<?php echo $data['content'] ?>
				<div class="content-list-container">
					<?php foreach ($layanan as $key => $value): ?>
					<?php
					$value['image'] = json_decode($value['image']);
					?>
					<div class="content-list">
						<div class="content-list-img">
							<a href="<?php echo CHtml::normalizeUrl(array('/layanan/view', 'id'=>$value['id'], 'url'=>Slug::create($value['name']), 'lang'=>Yii::app()->language)); ?>">
								<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(195,232, '/images/layanan/'.$value['image']->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
							</a>
						</div>
						<div class="content-list-desc">
							<h3 class="content-list-title"><a href="<?php echo CHtml::normalizeUrl(array('/layanan/view', 'id'=>$value['id'], 'url'=>Slug::create($value['name']), 'lang'=>Yii::app()->language)); ?>"><?php echo $value['name'] ?></a></h3>
							<p><?php echo substr(strip_tags($value['content']),0,320) ?>....</p>
							<div class="link"><a href="<?php echo CHtml::normalizeUrl(array('/layanan/view', 'id'=>$value['id'], 'url'=>Slug::create($value['name']), 'lang'=>Yii::app()->language)); ?>"><i class="icon-panah"></i> <?php echo Yii::t('main', 'Read More') ?></a></div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="text-content menu-left-container">
			<div class="menu-left-shad-l"></div>
			<div class="menu-left-shad-r"></div>
			<div class="padding-20">
				<div class="height-35"></div>
				<h6><?php echo Yii::t('main', 'Related to this page:') ?></h6>
				<div class="menu-left-line"></div>
				<div class="height-15"></div>
				<?php $this->widget('zii.widgets.CMenu', array(
				    'items'=>$menu,
				    'encodeLabel'=>false,
				)); ?>				
				<div class="height-20"></div>
				<?php echo $this->renderPartial('//layouts/_contact') ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

