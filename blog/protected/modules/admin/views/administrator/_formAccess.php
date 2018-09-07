<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model2); ?>
<?php
$dbAuth = new CDbAuthManager;
$dbAuth->db = Yii::app()->db;
$data = $dbAuth->getAuthItems('2');
?>
	<?php echo $form->dropDownListRow($model2, 'name', CHtml::listData($data, 'name', 'name')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
