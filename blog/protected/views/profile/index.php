<?php
$this->breadcrumbs = array(
    'My Account',
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

		<div class="inside-content">
			<!-- /. Start Content About -->
			<div class="m-ins-content m-ins-myaccount">
				<?php if(Yii::app()->user->hasFlash('success')): ?>
				
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				
				<?php endif; ?>

				<div class="row">
					<div class="col-xs-7">
						<div class="padding-right-40">
							<div class="box-account-history w519">
								<h1 class="title-inside-page">Account History</h1>
								<div class="clear height-30"></div>
								<div class="t-hstory">Submitted Shopping / Transaction</div>
								<div class="clear height-15"></div>
								
								    <table class="table table-striped tb-history-account">
								   		<thead>
								   			<tr>
								   				<td>ID</td>
								   				<td>Date</td>
								   				<td>Status</td>
								   				<td>Tracking Code</td>
								   			</tr>
								   		</thead>
								   		<tbody>
								   			<?php foreach ($order as $key => $value): ?>
								   			<tr>
								   				<td><a href="<?php echo CHtml::normalizeUrl(array('profile/vieworder', 'nota'=>$value->nota)); ?>"><?php echo $value->nota ?></a></td>
								   				<td><?php echo date("d F Y",strtotime($value->date_input)) ?></td>
								   				<td><?php echo $value->status ?></td>
								   				<td><?php echo ($value->tracking_code != '') ? $value->tracking_code : '-' ?></td>
								   			</tr>
								   			<?php endforeach ?>
								   		</tbody>
								    </table>

							</div>
						</div>
					</div>
					<div class="col-xs-5">
						<div class="box-infomation-account w358">
							<h1 class="title-inside-page">Account Information</h1>
							<div class="clear height-30"></div>
							
							<div class="basic-information">
								<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								    'id'=>'user-form',
								    'type'=>'horizontal',
								    'action'=>array('index'),
								    //'htmlOptions'=>array('class'=>'well'),
									'enableClientValidation'=>false,
									'clientOptions'=>array(
										'validateOnSubmit'=>false,
									),
								)); ?>

									<?php echo $form->errorSummary($modelUser); ?>


									<div class="form-group">
										<?php echo $form->labelEx($modelUser, 'passold', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->passwordField($modelUser, 'passold', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelUser, 'pass', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->passwordField($modelUser, 'pass', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelUser, 'passconf', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->passwordField($modelUser, 'passconf', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
									    <label class="col-sm-4 control-label" for="input"></label>
									    <div class="col-sm-8">
									    	<button type="submit" class="btn btn-primary">EDIT</button>
									    </div>
									</div>

								<?php $this->endWidget(); ?>
							 </div>

							 <div class="clear height-0"></div>
							 <div class="lines-grey"></div>
							 <div class="clear height-20"></div>
							 <div class="height-2"></div>

							 <div class="basic-information">
								<h1 class="title-inside-page">Delivery Information</h1>
							 	<div class="clear height-25"></div>

								<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
								    'id'=>'user-form',
								    'type'=>'horizontal',
								    'action'=>array('index'),
								    //'htmlOptions'=>array('class'=>'well'),
									'enableClientValidation'=>false,
									'clientOptions'=>array(
										'validateOnSubmit'=>false,
									),
								)); ?>

									<?php echo $form->errorSummary($modelDelivery); ?>

									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'name', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'name', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'address', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'address', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'city', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'city', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'postcode', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'postcode', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'province', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'province', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'hp', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'hp', array('class'=>'form-control')); ?>
									    </div>
									</div>
									<div class="form-group">
										<?php echo $form->labelEx($modelDelivery, 'bb', array('class'=>'col-sm-4 control-label')); ?>
									    <div class="col-sm-8">
									    <?php echo $form->textField($modelDelivery, 'bb', array('class'=>'form-control')); ?>
									    </div>
									</div>

									<div class="form-group">
									    <label class="col-sm-4 control-label" for="input"></label>
									    <div class="col-sm-8">
									    	<button type="submit" class="btn btn-primary">EDIT</button>
									    </div>
									</div>

								<?php $this->endWidget(); ?>

							 </div>

						</div>
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