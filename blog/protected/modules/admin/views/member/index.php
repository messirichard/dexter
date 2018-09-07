<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	// array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<h1>Users</h1>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-grid',
	'dataProvider'=>$model->search2(),
	// 'filter'=>$model,
	'summaryText'=>'',
	'enableSorting'=>false,
	'columns'=>array(
		'email',
		// 'group.group',
		'login_terakhir',
		'tanggal_input',
		array(
			'name'=>'aktif',
			'filter'=>array(
				'0'=>'No',
				'1'=>'Yes',
			),
			'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
