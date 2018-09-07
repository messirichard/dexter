<?php
$this->breadcrumbs=array(
	'Menu Akses'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List MenuAkses', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MenuAkses', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View MenuAkses', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit MenuAkses <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>