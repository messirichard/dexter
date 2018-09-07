<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ticket', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Ticket', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Ticket', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Ticket', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Ticket #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
		'images',
	),
)); ?>
