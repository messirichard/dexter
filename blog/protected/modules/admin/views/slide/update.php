<?php
$this->breadcrumbs=array(
	'Slide'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-camera',
	'title'=>'Slide',
	'subtitle'=>'Data Slide',
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Slide', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Slide', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
