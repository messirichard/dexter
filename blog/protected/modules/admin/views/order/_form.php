<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	// 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span8">
    <div class="widget">
    <h4 class="widgettitle">Data User</h4>
    <div class="widgetcontent">
                <div class="height-10"></div>
                <?php echo $form->errorSummary($model); ?>
                <?php if(Yii::app()->user->hasFlash('success')): ?>
                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                        'alerts'=>array('success'),
                    )); ?>
                <?php endif; ?>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->dropDownListRow($model, 'ticket_id',$this->combonamapaket(),array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'qty',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'ktp',array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->dropDownListRow($model, 'gerai',array(
                                'gerai 1'=>'gerai 1',
                                'gerai 2'=>'gerai 2',
                            ),array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'first_name',array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'last_name',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'phone',array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'email',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'address',array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'city',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'post_code',array('class'=>'input-block-level field')); ?>
                        </div>
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'state',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo $form->textFieldRow($model,'comment',array('class'=>'input-block-level field')); ?>
                        </div>
                    </div>
                
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'type'=>'primary',
                        'label'=>$model->isNewRecord ? 'Save And Add Item' : 'Save Item',
                        'htmlOptions'=>array('class'=>'btn-large'),
                    )); ?>


                        


                <?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>


    </div>
    </div>
</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
<style type="text/css" media="screen">
	.col-md-6{
		height: 32px;
	}
	.btn.btn-danger {
    margin-left: 30px;
    margin-top: 15px;
	}	
</style>
