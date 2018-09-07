<div class="container">
    <div class="container-breadcrump">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb custom-breadcrumb">
                    <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                    <li class="active">CONTACT</li>
                </ol>
            </div>
        </div>
    </div>

	<div class="box-middle-content-inside">
		<h1 class="title-inside-page center">Contact UBS Life Style</h1>
		<div class="clear height-40"></div>
		
		<div class="contact-form">
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
				<div class="height-10"></div>
				<?php echo $form->errorSummary($model); ?>
				<?php if(Yii::app()->user->hasFlash('success')): ?>
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				<?php endif; ?>
				
				<!-- name -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'name', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($model, 'name', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<!-- email_address -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<!-- phone -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'phone', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<!-- address -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'address', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($model, 'address', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<!-- body -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'body', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textArea($model, 'body', array('class'=>'form-control')); ?>
				    </div>
				</div>

				
				<div class="form-group">
				    <label class="col-sm-5 control-label"></label>
				    <div class="col-sm-7">
						<?php $this->widget('CCaptcha', array(
							'imageOptions'=>array(
								'style'=>'margin-bottom: 0px; margin-right: 10px;',
							),
						)); ?>
					</div>
				</div>
				<!-- body -->
				<div class="form-group">
					<?php echo $form->labelEx($model, 'verifyCode', array('class'=>'col-sm-5 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

				<div class="form-group">
				    <label class="col-sm-5 control-label"></label>
				    <div class="col-sm-7">
						<button type="submit" class="button-border-black wfull">Submit</button>
					</div>
				</div>

			<?php $this->endWidget(); ?>

			<div class="clear"></div>
		</div>
	</div>
</div>
