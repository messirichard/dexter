<?php
$this->breadcrumbs=array(
	'Cs Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CsCustomer','url'=>array('index')),
	array('label'=>'Add CsCustomer','url'=>array('create')),
);
?>

<h1>Manage Cs Customers</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cs-customer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'pass',
		'group_member_id',
		'first_name',
		'last_name',
		/*
		'telp',
		'date_join',
		'last_login',
		'status',
		'data',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
