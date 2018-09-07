<?php
$this->breadcrumbs=array(
	'setting'=>array('/admin/setting/index'),
	'PureChat',
);

$this->pageHeader=array(
	'icon'=>'fa fa-comment',
	'title'=>'Setting',
	'subtitle'=>'PureChat',
);
?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">PureChat</h4>
		<div class="widgetcontent">
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
				'id'=>'setting-form',
			    // 'type'=>'horizontal',
				'enableAjaxValidation'=>false,
				'clientOptions'=>array(
					'validateOnSubmit'=>false,
				),
				'htmlOptions' => array('enctype' => 'multipart/form-data'),
			)); ?>

				<?php if(Yii::app()->user->hasFlash('success')): ?>
				
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				
				<?php endif; ?>

				<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
				<?php $this->widget('ImperaviRedactorWidget', array(
				    'selector' => '.redactor',
				    'options' => array(
				        'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
				        'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
				    ),
				    'plugins' => array(
				        'clips' => array(
				        ),
				    ),
				)); ?>

				<?php $type = 'purechat_status' ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::dropDownList('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array(
					'1'=>'Show',
					'0'=>'Hide',
				)) ?>

				<?php $type = 'purechat_code' ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::textArea('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>

				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  PureChat memungkinkan Anda melayani percakapan dengan pelanggan yang datang via website melalui sebuah aplikasi terpadu. 
				  Untuk memanfaatkan fitur istimewa ini dengan gratis, silakan registrasi 
				  pada <a href="https://www.purechat.com/pricing">https://www.purechat.com/pricing</a> dan pilih paket FREE. Setelah Anda 
				  mendapatkan informasi account login di PureChat, silakan ikuti petunjuk 
				  pengaturan integrasi pada tautan berikut: 
				  <a href="https://www.purechat.com/pricing">https://www.purechat.com/pricing</a>
				</div>

				<div class="alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Anda bisa menggunakan applikasi chat yang lain seperti <a href="http://zopim.com/">zopim</a> dengan memasukkan code yang di butuhkan ke text area di atas
				</div>


				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>

			<?php $this->endWidget(); ?>
		</div>
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
		<script type="text/javascript">
		if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

		RedactorPlugins.advanced = {
		    init: function()
		    {
		        alert(1);
		    }
		}
		jQuery(function( $ ) {
			$('.multilang').multiLang({
			});
		})
		</script>
	</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>