<?php
$this->breadcrumbs = array(
    'Login',
);
?>
<section class="promosi-banner2">
    <div class="prelatif container">

<div class="height-30"></div>
<div class="breadcrump-container">
    <div class="pull-left">
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'separator'=>'',
            'homeLink'=>CHtml::link('<i class="icon-home-breadcrumb"></i>',array('/home/index')),
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    </div>
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="prelatif">
<div class="product-list-warp back-white-product content-text">
    <div class="padding-15 padding-left-30 padding-right-30">

		<!-- /. Start Content About -->
		<div class="inside-content">
			<div class="clear height-50"></div>
				<div class="m-ins-content m-ins-myaccount">
					<?php if(Yii::app()->user->hasFlash('success')): ?>
					
					    <?php $this->widget('bootstrap.widgets.TbAlert', array(
					        'alerts'=>array('success'),
					    )); ?>
					
					<?php endif; ?>
					<div class="row">
						<div class="col-xs-6">
							<div class="center box-account-history">
								<h1 class="title">Login / My Account</h1>
								<div class="clear height-30"></div>
								
								<div class="basic-information">
								<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								    'id'=>'verticalForm',
								    'type'=>'horizontal',
								    //'htmlOptions'=>array('class'=>'well'),
									'enableClientValidation'=>false,
									'clientOptions'=>array(
										'validateOnSubmit'=>false,
									),
								)); ?>
								<?php echo $form->errorSummary($modelLogin); ?>
								<div class="form-group">
									<?php echo $form->labelEx($modelLogin, 'username', array('class'=>'col-sm-5 control-label')); ?>
								    <div class="col-sm-5">
								    <?php echo $form->textField($modelLogin, 'username', array('class'=>'form-control')); ?>
								    </div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($modelLogin, 'password', array('class'=>'col-sm-5 control-label')); ?>
								    <div class="col-sm-5">
								    <?php echo $form->passwordField($modelLogin, 'password', array('class'=>'form-control')); ?>
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-offset-5 col-sm-7">
								      <div class="checkbox" style="text-align: left;">
								        <label>
								          <?php echo $form->checkbox($modelLogin, 'rememberMe'); ?> Remember me
								        </label>
								      </div>
								    </div>
								</div>
							 
							    <div class="form-group">
								    <label class="col-sm-5 control-label" for="input"></label>
								    <div class="col-sm-5">
								    	<button type="submit" class="left btn btn-primary">LOGIN</button>
								    </div>
							    </div>
								 
								<?php $this->endWidget(); ?>

								 </div>
							</div>
						</div>
						<div class="col-xs-6">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'account-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
							<div class="center box-infomation-account border-left-brown padding-left-50">
								<div class="basic-information">
								<h1 class="title">New Customer Sign Up</h1>
								<div class="clear height-30"></div>

										<?php echo $form->errorSummary($model); ?>
										<?php echo $form->errorSummary($modelDelivery); ?>
										
										<div class="form-group">
											<?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
										    </div>
										</div>
										<div class="form-group">
											<?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
										    </div>
										</div>
										<div class="form-group">
											<?php echo $form->labelEx($model, 'passconf', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->passwordField($model, 'passconf', array('class'=>'form-control')); ?>
										    </div>
										</div>

								 </div>

								 <div class="clear height-0"></div>
								 <div class="lines-grey"></div>
								 <div class="clear height-20"></div>
								 <div class="height-2"></div>

								 <div class="basic-information">
								 	<h4>DELIVERY INFORMATION</h4>
								 	<div class="clear height-25"></div>


										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'name', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'name', array('class'=>'form-control')); ?>
										    </div>
										</div>


										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'hp', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'hp', array('class'=>'form-control')); ?>
										    </div>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'address', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'address', array('class'=>'form-control')); ?>
										    </div>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'city', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'city', array('class'=>'form-control')); ?>
										    </div>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'postcode', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'postcode', array('class'=>'form-control')); ?>
										    </div>
										</div>

										<div class="form-group">
											<?php echo $form->labelEx($modelDelivery, 'province', array('class'=>'col-sm-5 control-label')); ?>
										    <div class="col-sm-5">
										    <?php echo $form->textField($modelDelivery, 'province', array('class'=>'form-control')); ?>
										    </div>
										</div>

									    <div class="form-group">
										    <label class="col-sm-5 control-label" for="input"></label>
										    <div class="col-sm-5">
										    	<button type="submit" class="left btn btn-primary">SIGN UP</button>
										    </div>
									    </div>

								 </div>

							</div>
<?php $this->endWidget(); ?>
						</div>
					</div>

					<div class="clear height-25"></div>

					<div class="clear"></div>
				</div>
				<!-- /. End Content About -->

				<div class="clear height-15"></div>

			<div class="clear"></div>
			</div>

		<div class="clear"></div>

    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="height-30"></div>

</section>