<div class="popup-container">
	<div class="height-15"></div>
	<div class="popup-logo">
		<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-popup-glow.jpg" alt="">
	</div>
	<div class="popup-link-header">
		CHANGE PASSWORD
	</div>
	<div class="clear"></div>
	<div class="height-5"></div>
	<div class="popup-border-container">
		<div class="text-content small">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'form-change-pass',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
			<div class="height-20"></div>
			<div class="popup-form form-horizontal">
			    <?php echo $form->uneditableRow($model,'userid',array('class'=>'span2','maxlength'=>100)); ?>
			</div>
			<div class="height-10"></div>
			<div class="popup-line"></div>
			<div class="popup-form form-horizontal">
				<div class="height-20"></div>
			    <?php echo $form->passwordFieldRow($model,'oldpass',array('class'=>'span2','maxlength'=>100)); ?>
			    <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span2','maxlength'=>100)); ?>
			    <?php echo $form->passwordFieldRow($model,'pass2',array('class'=>'span2','maxlength'=>100)); ?>
				<div class="control-group ">
					<label for="" class="control-label required">&nbsp;</label>
					<div class="controls">
						<input type="submit" class="btn btn-orange" value="Change Pass"  name="signup"  >
					</div>
				</div>
			</div>
<?php $this->endWidget(); ?>
			<div class="height-10"></div>
		</div>
	</div>
</div>
