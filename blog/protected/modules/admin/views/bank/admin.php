<?php
$this->breadcrumbs=array(
	'Banks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Bank','url'=>array('index')),
	array('label'=>'Add Bank','url'=>array('create')),
);
?>

<h1>Manage Banks</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'ib_bank',
		'nama',
		'rekening',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
