<div class="height-15"></div>
<div class="popup-logo">
	<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-popup-glow.jpg" alt="">
</div>
<div class="popup-link-header">
	Product Detail &gt; Check Out
</div>
<div class="clear"></div>
<div class="height-5"></div>
<div class="product-detail-container">
	<div class="product-detail-container2">
<?php if (Yii::app()->user->isGuest): ?>
		<div class="checkout-right" style="float: right">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>array('/login/index', 'return'=>'cart'),
	'id'=>'form-login',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
			<div class="popup-form form-horizontal">
				
				<div class="height-20"></div>
				<b>Already have an account at Glow68.com?</b>
				<div class="height-10"></div>
				<div class="control-group ">
					<label for="LoginForm_usernmae" class="control-label required">Username <span class="required">*</span></label>
					<div class="controls">
						<input type="text" placeholder="Username . . . ." name="LoginForm[username]" id="LoginForm_usernmae" class="span2"></br>
					</div>
				</div>
				<div class="control-group ">
					<label for="LoginForm_password" class="control-label required">Password <span class="required">*</span></label>
					<div class="controls">
						<input type="password" placeholder="Password . . . ." name="LoginForm[password]" id="LoginForm_password" class="span2"></br>
					</div>
				</div>
				<div class="height-10"></div>
				<h6 class="margin-bottom-5"><a href="#">Forgot Password?</a></h6>
				<input type="submit" class="btn-orange" value="Login">
				<a href="https://graph.facebook.com/oauth/authorize?type=user_agent&client_id=519404248115580&scope=email&redirect_uri=<?php echo urlencode(Yii::app()->request->hostInfo . CHtml::normalizeUrl(array('/login/facebook', 'return'=>'cart'))) ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/facebook-login.jpg" alt=""></a>
			</div>
<?php $this->endWidget(); ?>
		</div>
<?php endif ?>
<?php if (Yii::app()->user->isGuest): ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>array('/register/index'),
	'id'=>'member-form-popup2',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
		<div class="checkout-left">
			<div class="popup-form form-horizontal">
				<div class="height-20"></div>
				<b>Create your account. Less than 2 minutes!</b>
				<div class="height-10"></div>
				
				<?php echo $form->textFieldRow($model,'userid', array('class'=>'span2')); ?>
				<?php echo $form->textFieldRow($model,'email', array('class'=>'span2')); ?>
				<?php echo $form->passwordFieldRow($model,'pass', array('class'=>'span2')); ?>
				<?php echo $form->passwordFieldRow($model,'pass2', array('class'=>'span2')); ?>
				<div class="control-group ">
					<label for="" class="control-label required">&nbsp;</label>
					<div class="controls">
						<input type="submit" class="btn-orange" value="Next">
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
<?php $this->endWidget(); ?>
<?php endif ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'form-checkout',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>
<?php if (Yii::app()->user->isGuest): ?>
		<div class="cart-display-none" style="display: none;">
<?php endif ?>
			<div class="checkout-left">
				<div class="popup-form form-horizontal">
					<div class="height-20"></div>
					<b>BUYER INFORMATION</b>
					<div class="height-10"></div>
					
					<?php echo $form->hiddenField($model,'userid', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'hp', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'bb', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'alamat', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'kota', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'kodepos', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model,'provinsi', array('class'=>'span2')); ?>

				</div>
			</div>
			<div class="checkout-right">
				<div class="popup-form form-horizontal">
					<div class="height-20"></div>
					<b>DELIVERY INFORMATION</b> <br> <input type="checkbox" id="TestForm_radioButton" value="1"> Use my address for the delivery address.
					<div class="height-10"></div>

					<?php echo $form->textFieldRow($model2,'name', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model2,'phone', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model2,'address', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model2,'kota', array('class'=>'span2')); ?>
					<?php echo $form->textFieldRow($model2,'province', array('class'=>'span2')); ?>

					<div class="control-group ">
						<label for="" class="control-label required">&nbsp;</label>
						<div class="controls">
							<input type="submit" class="btn-orange2" value="Finish Shoping">
						</div>
					</div>
				</div>
			</div>
<?php if (Yii::app()->user->isGuest): ?>
		</div>	
<?php endif ?>
		<div class="clear"></div>
<?php $this->endWidget(); ?>
	</div>
</div>
<script type="text/javascript">
	$('#TestForm_radioButton').click(function(){
		if($('#TestForm_radioButton:checked').val()==1){
			$('#DeliveryDestination_name').val($('#Member_userid').val());
			$('#DeliveryDestination_phone').val($('#Member_hp').val());
			$('#DeliveryDestination_address').val($('#Member_alamat').val());
			$('#DeliveryDestination_kota').val($('#Member_kota').val());
			$('#DeliveryDestination_province').val($('#Member_provinsi').val());

		}else{
			$('#DeliveryDestination_name').val('');
			$('#DeliveryDestination_phone').val('');
			$('#DeliveryDestination_address').val('');
			$('#DeliveryDestination_kota').val('');
			$('#DeliveryDestination_province').val('');
		}
	})
</script>