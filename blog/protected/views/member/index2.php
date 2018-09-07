<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>My Account</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
    <div class="prelatife container">
        <div class="clear height-20"></div>
        <div class="height-3"></div>
        <div class="prelatife product-list-warp">
            <div class="box-featured-latestproduct" id="cart-shop">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product">My Account</div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>


    <div class="inside-content">
        <!-- /. Start Content About -->
        <div class="m-ins-content m-ins-myaccount">
            <?php if(Yii::app()->user->hasFlash('success')): ?>
            
                <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'alerts'=>array('success'),
                )); ?>
            
            <?php endif; ?>
            
            <div class="margin-15">
            <div class="row">
                <div class="col-xs-6">
                    <div class="padding-right-40">
                        <div class="box-account-history w519">
                            <h1 class="title-inside-page">Account History</h1>
                            <div class="clear height-30"></div>
                            <div class="t-hstory">Submitted Shopping / Transaction</div>
                            <div class="clear height-15"></div>
                            
                                <table class="table table-striped tb-history-account">
                                    <thead>
                                        <tr>
                                            <td>Date</td>
                                            <td>Status</td>
                                            <td>Tracking Code</td>
                                        </tr>
                                    </thead>
                                    <?php foreach ($order as $key => $value): ?>
                                    <tr>
                                        <td><?php echo date("d F Y H:i",strtotime($value->date_add )) ?></td>
                                        <td><?php echo OrOrderStatus::model()->findByPk($value->order_status_id)->name ?></td>
                                        <td><?php echo $value->comment ?></td>
                                        <td><a href="<?php echo CHtml::normalizeUrl(array('/member/vieworder', 'nota'=>$value->order_id)); ?>"><i class="fa fa-search fa-2x"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </table>

                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-form',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
)); ?>
                    <div class="box-infomation-account w358">
                        <h1 class="title-inside-page">Account Information</h1>
                        <div class="clear height-30"></div>
                        
                        <div class="basic-information">

                                <?php echo CHtml::errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>


                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'passold', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'passold', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass', array('class'=>'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'pass2', array('class'=>'col-sm-4 control-label')); ?>
                                    <div class="col-sm-5">
                                    <?php echo $form->passwordField($model, 'pass2', array('class'=>'form-control')); ?>
                                    </div>
                                </div>

                         </div>

                         <div class="clear height-0"></div>
                         <div class="lines-grey"></div>
                         <div class="clear height-20"></div>
                         <div class="height-2"></div>

                         <div class="basic-information">
                            <h1 class="title-inside-page">Delivery Information</h1>
                            <div class="clear height-25"></div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'first_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'last_name', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'hp', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'hp', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'address', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'address', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'city', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'city', array('class'=>'form-control')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'province', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->dropDownList($model, 'province',array(
                                            'Australian Capital Territory'=>'Australian Capital Territory',
                                            'New South Wales'=>'New South Wales',
                                            'Northern Territory'=>'Northern Territory',
                                            'Queensland'=>'Queensland',
                                            'South Australia'=>'South Australia',
                                            'Tasmania'=>'Tasmania',
                                            'Victoria'=>'Victoria',
                                            'Western Australia'=>'Western Australia',
                                            'Other'=>'Other',
                                        ), array('class'=>'form-control', 'empty'=>'Select State')) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'postcode', array('class'=>'control-label col-sm-4')) ?>
                                    <div class="col-sm-5">
                                        <?php echo $form->textField($model, 'postcode', array('class'=>'form-control')) ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="input"></label>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
                                    </div>
                                </div>


                         </div>

                    </div>
<?php $this->endWidget(); ?>
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
        </div>
        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
</section>
