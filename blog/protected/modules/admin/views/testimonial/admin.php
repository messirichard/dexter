<?php
$this->breadcrumbs=array(
	'Pg Testimonials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PgTestimonial','url'=>array('index')),
	array('label'=>'Add PgTestimonial','url'=>array('create')),
);
?>

<h1>Manage Pg Testimonials</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pg-testimonial-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'email',
		'testimonial',
		'status',
		'date',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
