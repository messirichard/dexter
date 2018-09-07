<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slide-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="row-fluid">
	<div class="span8">
	<?php if ($model->scenario == 'update'): ?>
	<h1>Edit Ticket</h1>
	<?php else: ?>
	<h1>Add Ticket</h1>
	<?php endif ?>
	<div class="widget">
		<!-- <h4 class="widgettitle">Data Pages</h4> -->
		<div class="widgetcontent">
			<?php echo $form->errorSummary($model); ?>
        	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>
			<?php // echo $form->dropDownListRow($model,'blog_id',CHtml::listData(Category::model()->findAll('type = :type', array(':type' => 'kategori')), 'id', 'name'),array('class'=>'field span12', 'empty'=>'------ Pilih Kategori ------')); ?>
			<?php echo $form->labelEx($model, 'blog_id'); ?>
			<div class="controls">
				<select id="Ticket_blog_id" name="Ticket[blog_id]" class="input-block-level">
					<?php 
					$criteria=new CDbCriteria;

					$criteria->with = array('description');
					$criteria->addCondition('active = "1" OR active = "2"');
					$criteria->addCondition('description.language_id = :language_id');
					$criteria->params[':language_id'] = $this->languageID;
					$criteria->order = 'date_update ASC';

					$dataBlog = Blog::model()->findAll($criteria);
					?>
					<option value="">---- Choose Event ----</option>
					<?php foreach ($dataBlog as $key => $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->description->title ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<script type="text/javascript">
			jQuery('#Ticket_blog_id').val('<?php echo $model->blog_id ?>');
			</script>
        	<?php echo $form->textAreaRow($model,'desc',array('class'=>'span5')); ?>
        	<?php echo $form->textFieldRow($model,'harga',array('class'=>'span5')); ?>
        	<?php // echo $form->textFieldRow($model,'url',array('class'=>'span5')); ?>
        	<?php echo $form->textFieldRow($model,'quota',array('class'=>'span5')); ?>
        	<?php echo $form->dropDownListRow($model, 'status', array(
        		'1'=>'Di Tampilkan',
        		'0'=>'Di Sembunyikan',
        	)); ?>
        	


		</div>


	<!-- span 12 -->
	</div>

	</div>

	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent" style="padding-bottom: 30px;">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index', 'parent'=>$_GET['parent'])),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php /*<?php if ($model->scenario == 'update'): ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('create', 'copy'=>$model->id)),
					'label'=>'Copy',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php endif ?>*/?>
		    </div>
		</div>
		<?php /*
		<div class="clearfix" style="height: 20px;"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'images',array(
				'hint'=>'<b>Note:</b> Image size is 209 x 107px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(209,107, '/../images/ticket/'.$model->images , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		*/ ?>

	</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})

</script>
