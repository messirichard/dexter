<?php
$this->breadcrumbs=array(
	'Administrator'=>array('/admin/administrator/index'),
	'Group Edit',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Administrator',
	'subtitle'=>'Update Group',
);

$this->menu=array(
	array('label'=>'List Group', 'icon'=>'th-list','url'=>array('/admin/administrator/index')),
	array('label'=>'Add Group', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Group', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>