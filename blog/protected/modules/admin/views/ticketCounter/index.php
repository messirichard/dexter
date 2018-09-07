<?php
$this->breadcrumbs=array(
	'Laporan Tickets',
);

$this->pageHeader=array(
	'icon'=>'fa fa-ticket',
	'title'=>'Ticket',
	'subtitle'=>'Laporan Ticket',
);

$this->menu=array(
	// array('label'=>'Add Ticket', 'icon'=>'th-list','url'=>array('create')),
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
		'url',
		// 'images',
		array(
        	'header'=>'Status',
            // 'name'=>'status',
            'type'=>'raw',
            'filter'=>false,
            'value'=>'($data->status == 1)? "Di Tampilkan": "Di sembunyikan" ',
        ),
		'counters',
	),
)); ?>
