<div class="border-black">
	<div class="padding-20">
		<div align="center">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="">
			<div class="height-10"></div>
		</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>array('/profile/login'),
	'id'=>'account-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
			<div class="popup-form">
				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'name', array('class'=>'col-sm-4 control-label')); ?>
					<div class="col-sm-7">
						<?php echo $form->textField($modelDelivery, 'name', array('class'=>'form-control')); ?>
					</div>
				</div>
				<div class="clear height-5"></div>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-4 control-label')); ?>
					<div class="col-sm-7">
						<?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
					</div>
				</div>
				<div class="clear height-5"></div>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'passconf', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->passwordField($model, 'passconf', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>
				<hr>
				<div class="clear height-5"></div>
				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'hp', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($modelDelivery, 'hp', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>

				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'address', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($modelDelivery, 'address', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>

				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'city', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($modelDelivery, 'city', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>

				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'postcode', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($modelDelivery, 'postcode', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>

				<div class="form-group">
					<?php echo $form->labelEx($modelDelivery, 'province', array('class'=>'col-sm-4 control-label')); ?>
				    <div class="col-sm-7">
				    <?php echo $form->textField($modelDelivery, 'province', array('class'=>'form-control')); ?>
				    </div>
				</div>
				<div class="clear height-5"></div>
				<p align="center">
				<button type="submit" class="btn btn-add-to-cart">
		            Sign Up
		        </button>
				</p>
				<div class="clear height-5"></div>
			</div>
			<div class="clear"></div>
<?php $this->endWidget(); ?>
	</div>
</div>