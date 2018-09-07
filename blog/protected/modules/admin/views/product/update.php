<?php
$this->breadcrumbs=array(
	'Product'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);
$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product',
	'subtitle'=>'Edit Product',
);

$this->menu=array(
	array('label'=>'List Product', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Product', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Product', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelAttributes'=>$modelAttributes, 'modelImage'=>$modelImage, 'modelColor'=>$modelColor,)); ?>