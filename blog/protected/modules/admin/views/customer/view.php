<?php
$this->breadcrumbs=array(
	'Cs Customers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CsCustomer', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add CsCustomer', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit CsCustomer', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CsCustomer', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View CsCustomer #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'pass',
		'group_member_id',
		'first_name',
		'last_name',
		'telp',
		'date_join',
		'last_login',
		'status',
		'data',
	),
)); ?>
