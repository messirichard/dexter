<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View User', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit User <?php echo $model->email; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDelivery'=>$modelDelivery,)); ?>