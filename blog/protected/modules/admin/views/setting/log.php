<?php
$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
);
?>

<h1>Log</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'setting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'username',
		'activity',
		'time',
	),
)); ?>
