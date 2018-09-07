<?php
$this->breadcrumbs=array(
	'Video'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-book',
	'title'=>'Video',
	'subtitle'=>'Data Video',
);

$this->menu=array(
	array('label'=>'List Video', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Video', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Video', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span8">
		<h1>Edit Video</h1>
		<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4">
		<?php //$this->renderPartial('/setting/page_menu') ?>
	</div>
</div>
