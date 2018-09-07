<?php

$session = new CHttpSession;
$session->open();
$login_admin = $session['login'];
$this->breadcrumbs=array(
	'Order'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Tambah Order',
);
if ($login_admin['type'] != 'gerai') {
	$this->menu=array(
		array('label'=>'Kembali', 'icon'=>'th-list', 'url'=>array('index')),
	);
}
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>