<?php
$this->breadcrumbs=array(
	' Customers'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-group',
	'title'=>'Customer',
	'subtitle'=>'Add Customer',
);

$this->menu=array(
	array('label'=>'List Customer', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelAddress'=>$modelAddress)); ?>