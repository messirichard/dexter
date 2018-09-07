<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layoutsAdmin/main'); ?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('<i class="fa fa-home"></i>',array('/admin/site/index')),
    'separator'=>' ',
    'htmlOptions'=>array(
        'class'=>'breadcrumbs',
    )
)); ?><!-- breadcrumbs -->

<?php echo $content; ?>
<?php $this->endContent(); ?>