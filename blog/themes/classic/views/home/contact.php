<?php
$this->breadcrumbs = array(
    'Contact Galeri Fitness',
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
    <div class="padding-15">
        <!-- inside goal content -->
        <div class="clear height-5"></div>
        <div class="height-3"></div>
        <div class="left back-title-landingproduct">
            <div class="text">
                CONTACT GALERI FITNESS
            </div>
        </div>
        <div class="left back-tail-title-landingproduct"></div>

        <div class="right bs-share" style="margin-top: 5px;">
            <div class="s-facebook">
                <div class="fb-like" data-href="" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
            </div>
            <div class="s-tweet">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="s-google">
                <!-- Place this tag where you want the +1 button to render. -->
                <div class="g-plusone" data-size="tall"></div>
            </div>
        </div>
        <div class="clear"></div>

		<div class="about-text content-text contact-text">
			<div class="height-20"></div>
			<h2>Contact Galeri Fitness</h2>
			<div class="height-20"></div>
			<div class="tengah text-center bantuan_sup_phowto">
                <h4>Jika Anda membutuhkan bantuan langsung secara cepat, Anda dapat menghubungi Customer Service kami di:</h4>
                <!-- Logo BBM: 7D33844C     Logo WA/Line/Phone: 0898 9750 294 -->
                <div class="clear height-20"></div>
                <div class="w-ps-iconhowto tengah">
                    <dl class="dl-horizontal">
                    	<?php if ($this->setting['bb_pin'] != ''): ?>
                          <dt><i class="icon-bbms"></i></dt>
                          <dd><?php echo $this->setting['bb_pin'] ?></dd>
                          <div class="clear"></div>
                    	<?php endif ?>

                    	<?php if ($this->setting['wa'] != ''): ?>
                          <dt><i class="icon-wa"></i></dt>
                          <dd><?php echo $this->setting['wa'] ?></dd>
                          <div class="clear"></div>
                    	<?php endif ?>

                    	<?php if ($this->setting['phone_2'] != ''): ?>
                          <dt><i class="icon-Line"></i></dt>
                          <dd><?php echo $this->setting['phone_2'] ?></dd>
                          <div class="clear"></div>
                    	<?php endif ?>

                    	<?php if ($this->setting['phone'] != ''): ?>
                          <dt><i class="icon-phone"></i></dt>
                          <dd><?php echo $this->setting['phone'] ?></dd>
                          <div class="clear"></div>
                    	<?php endif ?>
                    </dl>
                <div class="clear"></div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="clear height-0"></div>
			<?php echo $this->setting['contact_content'] ?>
			<div class="height-20"></div>

		</div>
				
		<div class="clear height-10"></div>
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
			    <label class="col-sm-3 control-label">Name</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textField($model, 'name', array('class'=>'form-control')); ?>
			    </div>
			</div>
			<!-- email_address -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Email</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
			    </div>
			</div>
			<!-- alamat -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Alamat</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textArea($model, 'address', array('class'=>'form-control address')); ?>
			    </div>
			</div>
			<!-- postcode -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Kode Pos</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textField($model, 'postcode', array('class'=>'form-control')); ?>
			    </div>
			</div>
			<!-- telepon -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Telepon</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textField($model, 'telepon', array('class'=>'form-control')); ?>
			    </div>
			</div>
			<!-- body -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Pesan</label>
			    <div class="col-sm-9 padding-0">
			    	<?php echo $form->textArea($model, 'body', array('class'=>'form-control')); ?>
			    </div>
			</div>

			
			<div class="form-group">
			    <label class="col-sm-3 control-label"></label>
			    <div class="col-sm-9 padding-0">
					<?php $this->widget('CCaptcha', array(
						'imageOptions'=>array(
							'style'=>'margin-bottom: 0px; margin-right: 10px;',
						),
					)); ?>
				</div>
			</div>
			<!-- security code -->
			<div class="form-group">
			    <label class="col-sm-3 control-label">Security code</label>
			    <div class="col-sm-9">
			      	<?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control w137')); ?>
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">&nbsp;</label>
			    <div class="col-sm-9">
			      	<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'htmlOptions'=>array('class'=>"btn btn-primary"),
						'label'=>'Submit',
					)); ?>
			    </div>
			</div>

			<?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

		<?php $this->endWidget(); ?>
		<div class="clear"></div>
    </div>
</div>
<div class="back-shadow-blockwhite-product"></div>
</div>
<div class="height-30"></div>

</section>