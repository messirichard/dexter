<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php echo $content ?>
<div class="wfull footer">
	<div class="container">
		<div class="height-20"></div>
		<?php echo $this->renderPartial('//layouts/_footer') ?>
	</div>
</div>
<?php $this->endContent(); ?>