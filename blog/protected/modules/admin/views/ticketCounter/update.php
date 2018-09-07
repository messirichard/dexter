<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Ticket',
	'subtitle'=>'Edit Ticket',
);

$this->menu=array(
	array('label'=>'List Ticket', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Ticket', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Ticket', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>