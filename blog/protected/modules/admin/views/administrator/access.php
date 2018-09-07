<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Access',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
	array('label'=>'View User', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<h1>Access User <?php echo $model->user; ?></h1>

<?php echo $this->renderPartial('_formAccess',array('model'=>$model,'model2'=>$model2)); ?>