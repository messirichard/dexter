<?php
$this->breadcrumbs=array(
	'Banks',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Bank',
	'subtitle'=>'Data Bank',
);

$this->menu=array(
	array('label'=>'Add Bank', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
<h1>Bank</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		// 'ib_bank',
		array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'CHtml::image(Yii::app()->baseUrl.ImageHelper::thumb(150,150, "/images/bank/".$data->image , array("method" => "resize", "quality" => "90")),"",array())',
        ),
		'nama',
		'rekening',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php // $this->renderPartial('/pages/page_menu') ?>
	</div>
</div>