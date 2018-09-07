<?php
$this->breadcrumbs=array(
	'Testimonials',
);

$this->pageHeader=array(
	'icon'=>'fa fa-database',
	'title'=>'Setting',
	'subtitle'=>'Data Setting',
);

// $this->menu=array(
// 	array('label'=>' Add Testimonial', 'icon'=>'plus-sign','url'=>array('create')),
// );
?>

<?php // $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php 
	// if(Yii::app()->user->hasFlash('success')):

 //   $this->widget('bootstrap.widgets.TbAlert', array(
 //        'alerts'=>array('success'),
 //    )); 

    ?>

<?php // endif; ?>
<div class="row-fluid">
	<div class="span8">

		<h5 class="subtitle">Default Setting</h5>

                    <ul class="shortcuts setting">
                        <!-- <li>
                            <a href="dashboard.html">
                                <i class="icon-cms fa fa-calendar"></i>
                                <span class="shortcuts-label">Events</span>
                            </a>
                        </li> -->
                        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/administrator/index')); ?>">
								<i class="icon-cms fa fa-user"></i>
                                <span class="shortcuts-label">Administrator Manager</span>
                        </a></li>
                        <?php /*
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/language/index')); ?>">
								<i class="icon-cms fa fa-language"></i>
                                <span class="shortcuts-label">Language (Bahasa)</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/access_block/index')); ?>">
								<i class="icon-cms fa fa-ban"></i>
                                <span class="shortcuts-label">Access Blok</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>">
								<i class="icon-cms fa fa-inbox"></i>
                                <span class="shortcuts-label">Contact & Form Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/#/index')); ?>">
								<i class="icon-cms fa fa-refresh"></i>
                                <span class="shortcuts-label">Import/Export Product</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/invoiceSetting/index')); ?>">
								<i class="icon-cms fa fa-money"></i>
                                <span class="shortcuts-label">Invoice Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/logo_setting/index')); ?>">
								<i class="icon-cms fa fa-flag"></i>
                                <span class="shortcuts-label">Logo Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mail_setting/index')); ?>">
								<i class="icon-cms fa fa-paper-plane"></i>
                                <span class="shortcuts-label">Mail Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mailchimp/index')); ?>">
								<i class="icon-cms fa fa-envelope-o"></i>
                                <span class="shortcuts-label">MailChimp</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/marketplace/index')); ?>">
								<i class="icon-cms fa fa-umbrella"></i>
                                <span class="shortcuts-label">Market Place</span>
		                </a></li>
		                 <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/currency/index')); ?>">
								<i class="icon-cms fa fa-usd"></i>
                                <span class="shortcuts-label">Setting Currency</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mobile_text/index')); ?>">
								<i class="icon-cms fa fa-mobile"></i>
                                <span class="shortcuts-label">Mobile Text Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/payment/index')); ?>">
								<i class="icon-cms fa fa-share"></i>
                                <span class="shortcuts-label">Payment Setting</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/shipping/index')); ?>">
								<i class="icon-cms fa fa-truck"></i>
                                <span class="shortcuts-label">Pengaturan Shipping</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/popOut/index')); ?>">
								<i class="icon-cms fa fa-tree"></i>
                                <span class="shortcuts-label">Setting PopOut</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/purechat/index')); ?>">
								<i class="icon-cms fa fa-comment"></i>
                                <span class="shortcuts-label">Integrasi PureChat</span>
		                </a></li>
		                */ ?>
		                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/defaultMetaPage/index')); ?>">
								<i class="icon-cms fa fa-key"></i>
                                <span class="shortcuts-label">Default Meta Page</span>
		                </a></li>
		                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/googleTools/index')); ?>">
								<i class="icon-cms fa fa-google"></i>
                                <span class="shortcuts-label">Google Tools</span>
		                </a></li> -->
                    </ul>
		
		<div class="clear" style="clear: both;"></div>
		<div class="divider10"></div>
	</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>
