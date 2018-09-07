<?php
$this->breadcrumbs=array(
	'Lines ups'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Lines up',
	'subtitle'=>'Edit Lines up',
);

$this->menu=array(
	array('label'=>'List Linesup', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Linesup', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Linesup', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>