<?php
$this->breadcrumbs=array(
	'Administrator'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Administrator',
	'subtitle'=>'Tambah Administrator',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>