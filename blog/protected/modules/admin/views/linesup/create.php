<?php
$this->breadcrumbs=array(
	'Linesups'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Linesup',
	'subtitle'=>'Add Linesup',
);

$this->menu=array(
	array('label'=>'List Linesup', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>