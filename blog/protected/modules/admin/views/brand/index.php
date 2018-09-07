<?php
$this->breadcrumbs=array(
	'Brand',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Brand',
	'subtitle'=>'Data Brand',
);

$this->menu=array(
	array('label'=>'Add Brand', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
<h1>Brand</h1>
		<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'brand-grid',
			'dataProvider'=>$model->search($this->languageID),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
				array(
		            'name'=>'image',
		            'type'=>'html',
		            'value'=>'CHtml::image(Yii::app()->baseUrl.ImageHelper::thumb(150,150, "/images/brand/".$data->image , array("method" => "resize", "quality" => "90")),"",array())',
	            ),
				array(
		            'name'=>'title',
		        ),    
				// array(
		  //           'name'=>'writer_name',
		  //       ),    
				// array(
				// 	'name'=>'date_input',
				// 	'filter'=>false,
				// ),
				// array(
				// 	'name'=>'date_update',
				// 	'filter'=>false,
				// ),
				// array(
				// 	'name'=>'insert_by',
				// ),
				// array(
				// 	'name'=>'last_update_by',
				// ),
				array(
					'name'=>'active',
					'filter'=>array(
						'0'=>'Non Active',
						'1'=>'Active',
					),
					'type'=>'raw',
					'value'=>'($data->active == "1") ? "Di Tampilkan" : "Di Sembunyikan"',
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{update} {delete}'
				),
			),
		)); ?>
	</div>
</div>
		