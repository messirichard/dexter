<?php
$this->breadcrumbs=array(
	'Order'=>array('index'),
	'Edit Order '.$model->email,
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Update Order',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View User', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>