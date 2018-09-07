<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data User</h4>
<div class="widgetcontent">

	<?php if ($model->scenario == 'insert'): ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
	<?php endif ?>

	<?php echo $form->textFieldRow($model,'initial',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>
	
	<?php if ($model->scenario != 'update'): ?>
	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>100)); ?>
	<?php endif ?>

	<?php echo $form->dropDownListRow($model, 'group_id',CHtml::listData(Group::model()->findAll(), 'id', 'group'),
	array('empty'=>'---- Choose ----')); ?>
	<?php /*

	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 200 x 200px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/user/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>
	*/ ?>
	<?php echo $form->dropDownListRow($model, 'type', array(
		'root'=>'Root',
		'gerai'=>'Gerai',
	)); ?>

	<?php echo $form->dropDownListRow($model, 'aktif', array(
		'1'=>'Active',
		'0'=>'Non Active',
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
	)); ?>

</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
