<?php
$this->breadcrumbs=array(
	'Lines ups',
);

$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Lines up',
	'subtitle'=>'Data Line sup',
);

$this->menu=array(
	array('label'=>'Add Linesup', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php 
$assetsDir = Yii::getPathOfAlias("webroot")."/../images/linesup/";
?>
<h1>Linesup</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'linesup-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'name',
		array(
            'name'=>'logo',
            'type'=>'raw',
            'filter'=>false,
            'value'=>"'<img src=\"'.Yii::app()->baseUrl . ImageHelper::thumb(165,75, '/../images/linesup/'.\$data->logo , array('method' => 'adaptiveResize', 'quality' => '90')).'\" />'",
        ),    

		array(
            'name'=>'images',
            'type'=>'raw',
            'filter'=>false,
            'value'=>"'<img src=\"'.Yii::app()->baseUrl . ImageHelper::thumb(150,150, '/../images/linesup/'.\$data->images , array('method' => 'adaptiveResize', 'quality' => '90')).'\" />'",
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
