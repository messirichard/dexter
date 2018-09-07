<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-language',
	'title'=>'Language',
	'subtitle'=>'Create Language',
);

$this->menu=array(
	array('label'=>'List Language', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>