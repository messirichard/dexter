<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>Contact Us</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
        <div class="prelatife container">
            <div class="content-text">
                <div class="clear height-50"></div>
                <div class="height-5"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>There hasn’t been a better <br>
                            time to <span>talk to us!</span></h2>
                        <h4>Please fill out the enquiry form below and someone <br>
                            from our customer relationship department will <br>
                            contact you...</h4>
                        <div class="clear height-20"></div>
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
                                    <label class="col-sm-3 control-label">First Name *</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name *</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone *</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <!-- email_address -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email *</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <!-- alamat -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'address', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'city', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <!-- postcode -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Post Code</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'postcode', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <!-- telepon -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9 padding-0">
                                        <?php echo $form->textField($model, 'state', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <!-- body -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Comments</label>
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
                                    <label class="col-sm-3 control-label">Verification Code</label>
                                    <div class="col-sm-9">
                                        <?php echo $form->textField($model, 'verifyCode', array('class'=>'form-control w137')); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                                            'buttonType'=>'submit',
                                            'htmlOptions'=>array('class'=>"btn btn-default-blue bt-submit"),
                                            'label'=>'Submit',
                                        )); ?>
                                    </div>
                                </div>

                                <?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

                            <?php $this->endWidget(); ?>
                            <div class="clear"></div>
                        </div>
                            

                            <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="featured-image"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/asset/images/ill-contact-dv-computers.png" alt=""></div>
                        <div class="clear height-35"></div>
                        <div class="detail-information-address">
                            <div class="vcard">
                                <p class="fn"><b>DV Computers</b><p>
                                <p class="adr">
                                <span class="street-address">29 Hulme Crt</span><br>
                                <span class="region">Myaree, </span>
                                <span class="postal-code">WA 6154</span>
                                <span class="country-name">Australia</span>
                                </p>
                                <p class="tel margin-bottom-0">Tel: (08) 9329-9028</p>
                                <p class="fax margin-bottom-0">Fax: (08) 9329-9038</p>
                                <p class="email margin-bottom-0">Email: <a href="mailto:sales@dvcomputers.com.au">sales@dvcomputers.com.au</a></p>
                            </div>
                            <div class="clear height-15"></div>
                            <div class="operation-hours">
                                <p>Our Opening Hours are: <br>
                                9:30 am - 6 pm Monday - Friday  <br>
                                9:30 am - 4 pm Saturday <br>
                                Sunday Closed <br>
                                All other times by appointment only.</p>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clear height-20"></div>
                <div class="clear height-50"></div>
            </div>
            <div class="clear"></div>
        </div>
    <div class="clear"></div>
</section>