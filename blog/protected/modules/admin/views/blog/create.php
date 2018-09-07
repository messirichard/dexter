<?php
$this->breadcrumbs=array(
	'Blog'=>array('index'),
	'Tambah',
);

$this->pageHeader=array(
	'icon'=>'fa fa-comments-o',
	'title'=>'Blog',
	'subtitle'=>'Tambah Blog',
);

$this->menu=array(
	array('label'=>'Kembali', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span8">
		<h1>Tambah Blog</h1>
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4">
		<?php // $this->renderPartial('/pages/page_menu') ?>
	</div>
</div>
