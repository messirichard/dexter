<?php
$this->breadcrumbs=array(
	'Faq'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-weixin',
	'title'=>'Faq',
	'subtitle'=>'Add Faq',
);

$this->menu=array(
	array('label'=>'List Faq', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>