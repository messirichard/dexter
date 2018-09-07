<div class="outer-middle">
	<div class="prelatif container">
			<div class="fcs-wrap region h222 prelatif">
				<div class="ill-page-inside"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/ill-career.jpg" alt="ill Career cheetam salt"></div>
				<div class="clearfix"></div>
			</div>
			<div class="clear height-15"></div>
			<div class="height-1"></div>
			<div class="region inside-content prelatif">
				<div class="clear height-5"></div>
				<div class="height-2"></div>

				<div class="left left-content-ins margin-right-35">
					<div class="ins">
						<h2 class="title"><?php echo Yii::t('main', 'career') ?></h2>
						<div class="clear height-10"></div>
						<div class="lines-blue"></div>
						<div class="clear height-5"></div>

						<div class="menu-inside">
							<ul>
								<?php foreach ($data as $key => $value): ?>
								<li><a href="<?php echo CHtml::normalizeUrl(array('/home/careerdetail', 'id'=>$value->id, 'slug'=>Slug::create($value->title), 'lang'=>Yii::app()->language)); ?>"><?php echo $value->title ?></a></li>
								<li class="separator"></li>
								<?php endforeach ?>
							</ul>
						</div>


						<div class="clear"></div>
					</div>
				</div>
				<div class="left right-content">
						<div class="clear height-20"></div>
						<div class="right breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'home') ?></a> &gt; <b><?php echo Yii::t('main', 'career') ?></b></div>
						<div class="clear height-25"></div>
						<div class="content-text">
							<?php echo $this->setting['career_content'] ?>
							<?php /*
							<h5>Apakah Anda kandidat yang kami cari?</h5>
							<p>Mari bergabung bersama Cheetam Salt, perusahaan garam terbesar dan terbaik di duia. Anda akan memiliki jenjang karir yang jelas untuk masa depan Anda. Sebagai perusahaan internasional, kami tidak pernah berhenti merekrut kandidat yang kreatif, berpengalaman dan memiliki kemampuan yang tinggi.</p>
							<p>Silahkan kirim CV anda dengan form di bawah ini dan ceritakan mengapa Cheetam Salt membutuhkan Anda. Anda mungkin kandidat yang kami cari.</p>
							*/ ?>
							
							<div class="clear height-10"></div>
							<div class="contact-form career-box">
								<div class="clear height-30"></div>
							<div class="ins">
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
						    <label class="col-sm-3 control-label"><?php echo Yii::t('main', 'nama') ?></label>
						    <div class="col-sm-9 padding-0">
						      <input type="text" name="ContactForm[name]" value="" class="form-control" >
						    </div>
						</div>
						<!-- email_address -->
						<div class="form-group">
						    <label class="col-sm-3 control-label"><?php echo Yii::t('main', 'email') ?></label>
						    <div class="col-sm-9 padding-0">
						      <input type="text" name="ContactForm[email]" value="" class="form-control" >
						    </div>
						</div>
						<!-- telepon -->
						<div class="form-group">
						    <label class="col-sm-3 control-label"><?php echo Yii::t('main', 'upload cv') ?></label>
						    <div class="col-sm-9 padding-0">
						      <input type="file" name="ContactForm[files]" >
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
						    <label class="col-sm-3 control-label"><?php echo Yii::t('main', 'security code') ?></label>
						    <div class="col-sm-9 inline-flex">
						      	<?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control w194')); ?>&nbsp;
						      	<?php $this->widget('bootstrap.widgets.TbButton', array(
									'buttonType'=>'submit',
									'htmlOptions'=>array('bt-submit'),
									'label'=>'',
								)); ?>
						    </div>
						</div>

						<?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

					<?php $this->endWidget(); ?>
							<div class="clear"></div>
						</div>
					
					<div class="clear"></div>
				</div>

							<div class="clear height-20"></div>

							<div class="clear"></div>
						</div>

					<div class="clearfix"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear height-10"></div>
			<div class="height-2"></div>
			
		<div class="clearfix"></div>
	</div>
	<div class="clear"></div>
</div>