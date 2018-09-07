<?php
$this->breadcrumbs=array(
	' Customers',
);

$this->pageHeader=array(
	'icon'=>'fa fa-group',
	'title'=>'Customer',
	'subtitle'=>'Data Customer',
);

$this->menu=array(
	array('label'=>'Add Customer', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Customer</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cs-customer-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'email',
		// 'pass',
		'telp',
		'first_name',
		'last_name',
		'group_member_id',
		array(
			'name'=>'status',
			'filter'=>array(
				'0'=>'Non Active',
				'1'=>'Active',
			),
			'type'=>'raw',
			'value'=>'($data->status == "1") ? "Aktif" : "Tidak Aktif"',
		),
		/*
		'date_join',
		'last_login',
		'data',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
