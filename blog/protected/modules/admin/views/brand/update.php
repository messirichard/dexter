<?php
$this->breadcrumbs=array(
	'Brand'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Brand',
	'subtitle'=>'Data Brand',
);

$this->menu=array(
	array('label'=>'List Brand', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Brand', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Brand', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
