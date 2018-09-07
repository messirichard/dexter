<?php
$this->breadcrumbs=array(
	'Testimonial'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-send-o',
	'title'=>'Testimonial',
	'subtitle'=>'Add Testimonial',
);

$this->menu=array(
	array('label'=>'List Testimonial', 'icon'=>'th-list','url'=>array('index')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>