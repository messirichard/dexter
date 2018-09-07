<?php
$this->breadcrumbs=array(
	'Event',
);

$this->pageHeader=array(
	'icon'=>'fa fa-comments-o',
	'title'=>'Blog',
	'subtitle'=>'',
);

$this->menu=array(
	array('label'=>'Tambah Blog', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->labelEx($model, 'topik_id'); ?>
			<!-- <div class="controls">
				<select id="Blog_topik_id" name="Blog[topik_id]" class="input-block-level">
					<?php 
					$dataCategory = (PrdCategory::model()->categoryTree('category', $this->languageID));
					?>
					<option value="">---- Choose Category ----</option>
					<?php foreach ($dataCategory as $key => $value): ?>
						<?php if (count($value['children']) > 0): ?>
						<optgroup label="<?php echo $value['title'] ?>">
							<?php foreach ($value['children'] as $k => $v): ?>
							<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
							<?php endforeach ?>
						</optgroup>
						<?php else: ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div> -->
			<script type="text/javascript">
			$('#Blog_topik_id').val('<?php echo $model->topik_id ?>');
			</script>		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Reset',
		'url'=>Yii::app()->createUrl($this->route),
	)); ?>

<?php $this->endWidget(); ?>

<div class="row-fluid">
	<div class="span8">
<h1>Blog</h1>
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
				// array(
				// 	'name'=>'insert_by',
				// ),
				// array(
				// 	'name'=>'Judul'
				// ),
				// array(
				// 	'name'=>'Caption'
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
					'value'=>'
					(($data->active == "1") ? "Di Tampilkan" : "").
					(($data->active == "0") ? "Di Sembunyikan" : "").
					(($data->active == "2") ? "Pass Event" : "")
					',
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{update} {delete}',
					// 'buttons'=> array(
					// 	'detail' => array(
					// 	    'label'=>'Ticket',     // text label of the button
					// 	    'url'=>'array("/admin/ticket/index", "parent"=>$data->id)', // a PHP expression for generating the URL of the button
					// 	    'options'=>array('class'=>'btn btn-warning'), // HTML options for the button tag
					// 	),Ticket
					// ),
				),
			),
		)); ?>
	</div>
	<div class="span4">
		<?php //$this->renderPartial('/pages/page_menu') ?>
	</div>
</div>
		