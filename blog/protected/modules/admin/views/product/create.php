<?php
$this->breadcrumbs=array(
	'Product'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product',
	'subtitle'=>'Add Product',
);

$this->menu=array(
	// array('label'=>'List Product', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelAttributes'=>$modelAttributes, 'modelImage'=>$modelImage, 'modelColor'=>$modelColor,)); ?>