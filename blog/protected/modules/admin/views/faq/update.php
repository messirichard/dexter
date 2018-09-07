<?php
$this->breadcrumbs=array(
	'Faq'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-weixin',
	'title'=>'Faq',
	'subtitle'=>'Edit Faq',
);

$this->menu=array(
	array('label'=>'List Faq', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Faq', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Faq', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>