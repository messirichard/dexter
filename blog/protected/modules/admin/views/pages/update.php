<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-file-text-o',
	'title'=>'Pages',
	'subtitle'=>'Edit Pages <b>'.ucwords($model->name).'</b>',
);

$this->menu=array(
	array('label'=>'List Pages', 'icon'=>'th-list','url'=>array('index')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>