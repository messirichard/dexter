<?php
$this->breadcrumbs=array(
	'Tickets'=>array('index', 'parent'=>$_GET['parent']),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-ticket',
	'title'=>'Ticket',
	'subtitle'=>'Add Ticket',
);

$this->menu=array(
	array('label'=>'List Ticket', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>