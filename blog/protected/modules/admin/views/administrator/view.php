<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
	array('label'=>'Edit User', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete User', 'icon'=>'trash', 'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'user',
		'email',
		// 'pass',
		// 'last_login',
		array(               // related city displayed as a link
            'name'=>'sts',
            'value'=>($model->sts=='m')?'No':'Yes',
        ),
	),
)); ?>
