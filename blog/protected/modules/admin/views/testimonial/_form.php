<div class="row-fluid">
	<div class="span8">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'pg-testimonial-form',
		    // 'type'=>'horizontal',
			'enableAjaxValidation'=>false,
			'clientOptions'=>array(
				'validateOnSubmit'=>false,
			),
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>

		<?php echo $form->errorSummary($model); ?>

		<div class="widget">
		<h4 class="widgettitle">Data Testimonial</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>


			<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>225)); ?>

			<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>225)); ?>

			<?php // echo $form->textAreaRow($model,'testimonial',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
			<?php // echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>
			<?php // echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

			<?php
			foreach ($modelDesc as $key => $value) {
				$lang = Language::model()->getName($key);
				?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']content');
			    echo $form->textArea($value,'['.$lang->code.']content',array('class'=>'span11', 'maxlength'=>100));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
			    <?php
			}
			?>

        	<?php echo $form->dropDownListRow($model, 'status', array(
        		'1'=>'Di Tampilkan',
        		'0'=>'Di Sembunyikan',
        	)); ?>
            <div class="divider5"></div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Add' : 'Save',
					'htmlOptions'=> array(''=>'',),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
				)); ?>
		</div>
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>

		<?php $this->endWidget(); ?>
		<script type="text/javascript">
		jQuery(function( $ ) {
			$('.multilang').multiLang({
			});
		})
		</script>

	</div>
	<div class="span4">
		<?php $this->renderPartial('/pages/page_menu') ?>
	</div>
</div>
