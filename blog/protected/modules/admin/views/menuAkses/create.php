<?php
$this->breadcrumbs=array(
	'Menu Akses'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List MenuAkses', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add MenuAkses</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>