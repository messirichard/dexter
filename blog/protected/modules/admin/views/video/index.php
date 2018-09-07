<?php
$this->breadcrumbs=array(
	'Video',
);

$this->pageHeader=array(
	'icon'=>'fa fa-book',
	'title'=>'Video',
	'subtitle'=>'Data Video',
);

$this->menu=array(
	array('label'=>'Add Video', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
<h1>Video</h1>
		<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'promotion-grid',
			'dataProvider'=>$model->search($this->languageID),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
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
				array(
					'name'=>'url_youtube',
				),
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
					'name'=>'date',
				),
				array(
					'name'=>'sort',
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{update} {delete}'
				),
			),
		)); ?>
	</div>
	<?php /*
	<div class="span4">
		<?php //$this->renderPartial('/setting/page_menu') ?>
	</div>
	*/ ?>
</div>
		