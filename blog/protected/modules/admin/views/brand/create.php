<?php
$this->breadcrumbs=array(
	'Brand'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Brand',
	'subtitle'=>'Data Brand',
);

$this->menu=array(
	array('label'=>'List Brand', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
