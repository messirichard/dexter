<?php
$this->breadcrumbs=array(
	'Linesups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Linesup','url'=>array('index')),
	array('label'=>'Add Linesup','url'=>array('create')),
);
?>

<h1>Manage Linesups</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'linesup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'logo',
		'images',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
