<style type="text/css">
body{
	background: #fff;
}
.background-blue{
	background: #121b69;
	color: #fff;
	font-family: "Roboto", sans-serif;
	font-weight: 700;
	font-size: 16px;
	margin-top: -15px;
	padding: 3px 15px;
}
.text-field-iframe{
	padding: 3px 0px;
}
.form-custom{
	border: 1px solid #d2d2d2;
}
.text-field-iframe .control-label{
	padding: 0px;
	padding-left: 15px;
}
.text-field-iframe .form-group{
	margin: 0px;
	margin-bottom: 10px;
}
.text-field-iframe input{
	width: 90%;
}
.text-field-iframe textarea{
	width: 90%;
}
</style>
<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl ?>/asset/images/header-iframe.jpg" alt="Header DV Computers">
<div class="col-xs-3">
	
</div>
<div class="col-xs-9 background-blue">
	Onsite Request Form
</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'type'=>'horizontal',
    'enableAjaxValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<div class="clear"></div>
<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
	<div class="margin-15">
		<?php echo $form->errorSummary($model, '', '', array('class'=>'alert alert-danger', 'role'=>'alert')); ?>
	</div>
</div>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>
<?php endif; ?>
<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">First Name *</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'first_name', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Last Name *</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'last_name', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Phone Number *</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'phone', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Email *</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'email', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Address</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'address', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Request</label>
        <div class="col-xs-8">
                <?php echo $form->textArea($model, 'body', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">&nbsp;</label>
        <div class="col-xs-8">
		    <?php $this->widget('CCaptcha', array(
		        'imageOptions'=>array(
		            'style'=>'margin-bottom: 0px; margin-right: 10px;',
		        ),
		    )); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <div class="form-group">
        <label class="col-xs-4 control-label">Verification Code</label>
        <div class="col-xs-8">
            <?php echo $form->textField($model, 'verifyCode', array('class'=>'form-custom')); ?>
        </div>
    </div>
</div>

<div class="col-xs-3">
</div>
<div class="col-xs-9 text-field-iframe">
    <label class="col-xs-4 control-label">&nbsp;</label>
    <div class="col-xs-8">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'htmlOptions'=>array('class'=>"btn btn-primary"),
            'label'=>'Submit',
        )); ?>
    </div>
</div>
<?php $this->endWidget(); ?>