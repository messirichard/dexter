<?php
$this->breadcrumbs=array(
	'Pastor'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

?>

<h1>Edit Profile</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pastor-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<?php $this->widget('ImperaviRedactorWidget', array(
	    'selector' => '.redactor',
	    'options' => array(
	        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
	        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
	    ),
	    'plugins' => array(
	        // 'fullscreen' => array(
	        //     'js' => array('fullscreen.js',),
	        // ),
	        'clips' => array(
	            // You can set base path to assets
	            // 'basePath' => 'application.components.imperavi.my_plugin',
	            // or url, basePath will be ignored.
	            // Defaults is url to plugis dir from assets
	            // 'baseUrl' => '/js/my_plugin',
	            // 'css' => array('clips.css',),
	            // 'js' => array('clips.js',),
	            // add depends packages
	            // 'depends' => array('imperavi-redactor',),
	        ),
	    ),
	)); ?>

	<?php //echo $form->textFieldRow($model, 'writer', array('class'=>'span5')); ?>

	<?php //echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>
	
	<?php
	$tabs = array();
	foreach ($modelDesc as $key => $value) {
		$lang = Language::model()->getName($key);
		$tabs[] = array('label'=>$lang->name, 'content'=>
	        $form->textFieldRow($value,'['.$lang->code.']title',array('class'=>'span5','maxlength'=>100)).
	        $form->textFieldRow($value,'['.$lang->code.']position',array('class'=>'span5','maxlength'=>200)).
	        // $form->textFieldRow($value,'['.$lang->code.']status',array('class'=>'span5','maxlength'=>200)).
	        $form->textAreaRow($value,'['.$lang->code.']content',array('class'=>'span5 redactor'))
	        , 'active'=>($key==$this->setting['lang_deff'])?TRUE:false,
	    );
	}
	?>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>
	
	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 350 x 350px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(350,350, '/images/pastor/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>

	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
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
</script>
