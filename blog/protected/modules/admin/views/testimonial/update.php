<?php
$this->breadcrumbs=array(
	'Testimonial'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-send-o',
	'title'=>'Testimonial',
	'subtitle'=>'Edit Testimonial',
);

$this->menu=array(
	array('label'=>'List Testimonial', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Testimonial', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Testimonial', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>