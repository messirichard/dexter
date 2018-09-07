<?php
$this->breadcrumbs=array(
	'Tickets',
);

$this->pageHeader=array(
	'icon'=>'fa fa-ticket',
	'title'=>'Ticket',
	'subtitle'=>'Data Ticket',
);

$this->menu=array(
	array('label'=>'Add Ticket', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent'])),
	array('label'=>'back to Event', 'icon'=>'chevron-left','url'=>array('/admin/blog/index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Ticket</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'ticket-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'name',
		'harga',
		'quota',
		// array(
  //           'name'=>'images',
  //           'type'=>'raw',
  //           'filter'=>false,
  //           'value'=>"'<img src=\"'.Yii::app()->baseUrl . ImageHelper::thumb(150,70, '/../images/ticket/'.\$data->images , array('method' => 'adaptiveResize', 'quality' => '90')).'\" />'",
  //       ),
        array(
        	'header'=>'Status',
            // 'name'=>'status',
            'type'=>'raw',
            'filter'=>false,
            'value'=>'($data->status == 1)? "Di Tampilkan": "Di sembunyikan" ',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
