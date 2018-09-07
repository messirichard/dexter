<?php
$this->breadcrumbs=array(
	'Testimonials',
);

$this->pageHeader=array(
	'icon'=>'fa fa-send-o',
	'title'=>'Testimonial',
	'subtitle'=>'Data Testimonial',
);

$this->menu=array(
	array('label'=>' Add Testimonial', 'icon'=>'plus-sign','url'=>array('create')),
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
		<h1>Testimonial</h1>
		<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'pg-testimonial-grid',
			'dataProvider'=>$model->search($this->languageID),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
				// 'id',
				'name',
				'email',
				// array(
				// 	'name'=>'testimonial',
				// 	'value'=>'substr($data->testimonial, 0, 130)."..."',
				// 	),
				array(
					'name'=>'status',
					'type'=>'raw',
					'value'=>'($data->status == 0)? "Di Sembunyikan": "Di Tampilkan";',
					),
				// 'status',
				array(
					'name'=>'date',
					'type'=>'raw',
					'value'=>'date("d M y", strtotime($data->date) )',
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
