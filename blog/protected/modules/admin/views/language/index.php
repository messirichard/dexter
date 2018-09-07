<?php
$this->breadcrumbs=array(
	'Languages',
);

$this->pageHeader=array(
	'icon'=>'fa fa-language',
	'title'=>'Language',
	'subtitle'=>'Data Language',
);

$this->menu=array(
	array('label'=>'Add Language', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Language</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'language-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'name',
		'code',
		'sort',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonOptions'=>array('class'=>'delete-custom'),
		),
	),
)); ?>
