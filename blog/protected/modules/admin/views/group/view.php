<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Group', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Group', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Group', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Group', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Group #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group',
		'aktif',
		'akses',
	),
)); ?>
