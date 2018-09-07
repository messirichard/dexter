<?php
$this->breadcrumbs=array(
	'Faq',
);

$this->pageHeader=array(
	'icon'=>'fa fa-weixin',
	'title'=>'Faq',
	'subtitle'=>'Data Faq',
);

$this->menu=array(
	array('label'=>'Add Faq', 'icon'=>'plus-sign','url'=>array('create')),
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
<h1>Faq</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'faq-grid',
	'dataProvider'=>$model->search($this->languageID),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'question',
		// 'answer',
		array(
					'name'=>'status',
					'filter'=>array(
						'0'=>'Non Active',
						'1'=>'Active',
					),
					'type'=>'raw',
					'value'=>'($data->status == "1") ? "Di Tampilkan" : "Di Sembunyikan"',
				),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/pages/page_menu') ?>
	</div>
</div>