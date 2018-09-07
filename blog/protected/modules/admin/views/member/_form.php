<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php if ($model->scenario == 'insert'): ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
	<?php endif ?>

	<?php // echo $form->textFieldRow($model,'initial',array('class'=>'span5','maxlength'=>100)); ?>

	<?php // echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>100)); ?>

	<?php // echo $form->dropDownListRow($model, 'group_id',CHtml::listData(Group::model()->findAll(), 'id', 'group'), array('empty'=>'---- Choose ----')); ?>

	<?php echo $form->dropDownListRow($model, 'aktif', array(
		'1'=>'Active',
		'0'=>'Non Active',
	)); ?>

	<?php echo $form->uneditableRow($modelDelivery,'name',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'hp',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'bb',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'address',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'city',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'postcode',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->uneditableRow($modelDelivery,'province',array('class'=>'span5','maxlength'=>100)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
