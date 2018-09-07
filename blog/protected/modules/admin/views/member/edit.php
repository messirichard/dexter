<?php
$this->breadcrumbs=array(
	// 'Users'=>array('index'),
	'Change Password',
);

$this->menu=array(
);
?>

<h1>Change Password <?php echo $model->email; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_formedit',array('model'=>$model)); ?>