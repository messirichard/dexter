<?php
$this->breadcrumbs=array(
	'Menu Akses',
);

$this->menu=array(
	array('label'=>'Add MenuAkses', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Menu Akses</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'menu-akses-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'type',
		'name',
		'controller',
		// 'action',
		// 'sub_action',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
