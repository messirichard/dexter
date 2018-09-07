<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'blog-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<div class="row-fluid">
	<div id="dasboard-left" class="span8">

<div class="widget">
<h4 class="widgettitle">Data Pages</h4>
<div class="widgetcontent">
	<div class="multilang pj-form-langbar">
	<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
	<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
	<?php endforeach ?>
</div>
<div class="divider5"></div>
	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($modelDesc, 'Please fix the following input errors:', 'Periksa di semua bahasa'); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	<?php endif; ?>
	
	<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<?php 
		$this->widget('ImperaviRedactorWidget', array(
		    'selector' => '.redactor',
		    'options' => array(
		        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
		        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
		    ),
		    'plugins' => array(
		        'clips' => array(
		        ),
		    ),
		)); 
	?>
	<?php if ($model->type == 0): ?>
		<?php echo $form->uneditableRow($model, 'name',array('class'=>'span3')); ?>
	<?php else: ?>
		<?php echo $form->textFieldRow($model, 'name',array('class'=>'span5')); ?>
	<?php endif ?>

	<?php // echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>

	<?php // echo $form->dropDownListRow($model,'topik_id',CHtml::listData(Category::model()->findAll('type = :type', array(':type' => 'topik')), 'id', 'name'),array('class'=>'span5', 'empty'=>'------ Pilih Topik ------')); ?>
	<?php
		foreach ($modelDesc as $key => $value) {
			$lang = Language::model()->getName($key);
			?>
			<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

			<?php
			echo $form->labelEx($value, '['.$lang->code.']page_name');
		    echo $form->textField($value,'['.$lang->code.']page_name',array('class'=>'span8', 'maxlength'=>100));
		    ?>
		    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
		    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
			</div>
			<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

			<?php
			echo $form->labelEx($value, '['.$lang->code.']content');
		    echo $form->textArea($value,'['.$lang->code.']content',array('class'=>'span5 redactor'));
		    ?>
		    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
		    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
			</div>
		    <?php
		}
		?>

	<?php
	// $tabs = array();
	// foreach ($modelDesc as $key => $value) {
	// 	$lang = Language::model()->getName($key);
	// 	$tabs[] = array('label'=>$lang->name, 'content'=>
	//         $form->textFieldRow($value,'['.$lang->code.']page_name',array('class'=>'span5','maxlength'=>100)).
	//         $form->textAreaRow($value,'['.$lang->code.']content',array('class'=>'span5 redactor'))
	//         // $form->textFieldRow($value,'['.$lang->code.']meta_title',array('class'=>'span5','maxlength'=>100)).
	//         // $form->textAreaRow($value,'['.$lang->code.']meta_keyword',array('class'=>'span5')).
	//         // $form->textAreaRow($value,'['.$lang->code.']meta_description',array('class'=>'span5'))
	//         , 'active'=>($key==$this->setting['lang_deff'])?TRUE:false,
	//     );
	// }
	?>
	<?php 
	// $this->widget('bootstrap.widgets.TbTabs', array(
	//     'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	//     'placement'=>'above', // 'above', 'right', 'below' or 'left'
	//     'tabs'=>$tabs,
	// )); 
	?>

	<?php 
	// echo $form->fileFieldRow($model,'image',array(
	// 'hint'=>'<b>Note:</b> Ukuran gambar adalah 620 x 409px. Gambar yang lebih besar akan ter-crop otomatis, tolong upload foto ukuran horizontal')); 
	?>

	</div>
</div>
</div>
<!-- span 8 -->
	<div id="dasboard-right" class="span4">
		<div class="widgetbox">                        
            <div class="headtitle">
                <h4 class="widgettitle">SEO Tools</h4>
            </div>
            <div class="widgetcontent box-Seotools">
            	<?php
					foreach ($modelDesc as $key => $value) {
						$lang = Language::model()->getName($key);
						?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

						<?php
						echo $form->labelEx($value, '['.$lang->code.']meta_title');
					    echo $form->textField($value,'['.$lang->code.']meta_title',array('class'=>'span10', 'maxlength'=>100));
					    ?>
					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

						<?php
						echo $form->labelEx($value, '['.$lang->code.']meta_keyword');
					    echo $form->textArea($value,'['.$lang->code.']meta_keyword',array('class'=>'span10', 'maxlength'=>100));
					    ?>
					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

						<?php
						echo $form->labelEx($value, '['.$lang->code.']meta_description');
					    echo $form->textArea($value,'['.$lang->code.']meta_description',array('class'=>'span10', 'maxlength'=>100));
					    ?>
					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
					    <?php
					}
					?>
            	<!-- <div class="form-horizontal">
	                <?php
						foreach ($modelDesc as $key => $value) {
							$lang = Language::model()->getName($key);
						        echo $form->textFieldRow($value,'['.$lang->code.']meta_title',array('class'=>'span12','maxlength'=>225));
						        echo $form->textAreaRow($value,'['.$lang->code.']meta_keyword',array('class'=>'span12'));
						        echo $form->textAreaRow($value,'['.$lang->code.']meta_description',array('class'=>'span12'));
						}
						?>
				</div> -->
            </div><!--widgetcontent-->
            </div>
	</div>
</div>
<div class="clear"></div>
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
			'htmlOptions'=>array('class'=>'btn-large'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
			'htmlOptions'=>array('class'=>'btn-large'),
		)); ?>
<div class="divider15"></div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
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
