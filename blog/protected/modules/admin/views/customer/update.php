<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-group',
	'title'=>'Customer',
	'subtitle'=>'Edit Customer',
);

$this->menu=array(
	array('label'=>'List Customer', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Customer', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Customer', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelAddress'=>$modelAddress,)); ?>