<?php
$this->pageTitle = $layanan['name'].' - '.$this->pageTitle;
$layanan['image'] = json_decode($layanan['image']);
?>
<div class="wfull content-full">
	<div class="container">
		<div class="content-left">
			<div class="text-content">
				<div class="height-40"></div>
				<h1 class="main-title"><?php echo $data['title'] ?></h1>				
				<h3 style="text-align: right; margin-top: -35px; margin-bottom: 10px;"><a href="<?php echo CHtml::normalizeUrl(array('/layanan/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'Back') ?></a></h3>
				<div class="fcs-line"></div>
				<div class="height-15"></div>
				
				<?php if ($layanan['id'] != 6): ?>
					<img class="image-news" align="right" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(250,5000, '/images/layanan/'.$layanan['image']->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
					<h3><?php echo $layanan['name'] ?></h3>
					<?php echo $layanan['content'] ?>
				<?php else: ?>

					<h3><?php echo $layanan['name'] ?></h3>
					<?php echo $layanan['content'] ?>
					
					<div class="clear height-20"></div>
					<div class="lines"></div>
					<?php $modelListConsult = ListVisit::Model()->findAll(); ?>
					<div class="box-column-consult">
						<div class="height-20"></div>
						<div class="height-4"></div>
						<?php foreach ($modelListConsult as $key => $va_consult): ?>
						<div class="list-column-consult">
							<div class="left">
								<div class="picture"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(175,5000, '/images/visiting-consultan/'.$va_consult->images , array('method' => 'resize', 'quality' => '90')) ?>" alt="<?php echo $va_consult->name ?>"></div>
							</div>
							<div class="right">
								<div class="desc">
									<?php echo $va_consult->description; ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="height-3"></div>
						<?php endforeach ?>

					</div>
				<?php endif ?>

				<div class="clear"></div>
				<div class="height-15"></div>
				<div class="fcs-line"></div>
				<div class="height-15"></div>
			</div>
		</div>
		<div class="text-content menu-left-container">
			<div class="menu-left-shad-l"></div>
			<div class="menu-left-shad-r"></div>
			<div class="padding-20 padding-right-5">
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