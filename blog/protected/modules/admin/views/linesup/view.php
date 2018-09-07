<?php
$this->breadcrumbs=array(
	'Linesups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Linesup', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Linesup', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Linesup', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Linesup', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Linesup #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'logo',
		'images',
	),
)); ?>
