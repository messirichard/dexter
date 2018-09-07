<?php
$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Faq', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Faq', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Faq', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Faq', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Faq #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question',
		'answer',
		'status',
	),
)); ?>
