<div style="padding: 40px;">
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Error '.$code,
)); ?>

<p class="less">
<?php echo CHtml::encode($message); ?>
</p>
<p class="less">
<a href="javascript:history.back()">Back previous page</a>
</p>
<?php $this->endWidget(); ?>
</div>
