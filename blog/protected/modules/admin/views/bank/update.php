<?php
$this->breadcrumbs=array(
	'Banks'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Bank',
	'subtitle'=>'Edit Bank',
);

$this->menu=array(
	array('label'=>'List Bank', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Bank', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Bank', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>