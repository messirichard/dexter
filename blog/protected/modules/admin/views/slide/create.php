<?php
$this->breadcrumbs=array(
	'Slide'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-camera',
	'title'=>'Slide',
	'subtitle'=>'Data Slide',
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
