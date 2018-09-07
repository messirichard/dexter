<?php
$this->breadcrumbs=array(
	'Menu Akses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MenuAkses', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MenuAkses', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MenuAkses', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MenuAkses', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MenuAkses #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name',
		'controller',
		'action',
		'sub_action',
	),
)); ?>
