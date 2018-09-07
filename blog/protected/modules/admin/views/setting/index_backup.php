<?php
$this->breadcrumbs=array(
	'Setting Umum',
);

$this->menu=array(
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<h1>Setting Umum</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

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


	<?php $tabs = array(); ?>
	<?php foreach ($model as $key => $value): ?>
		<?php if ($value['data']->dual_language=='y'): ?>
		<?php
		foreach ($value['desc'] as $k => $v) {
			$lang = Language::model()->getName($k);
			if ($value['data']->type=='textarea') {
				$textField = CHtml::textArea('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5'));
			} elseif($value['data']->type=='editor') {
				$textField = CHtml::textArea('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5 redactor'));
				
			} else {
				$textField = CHtml::textField('Setting['.$value['data']->name.']['.$lang->code.']', $v->value, array('class'=>'span5'));
			}
			if (isset($tabs[$lang->code])) {
				$tabs[$lang->code]['content'] .= '
					<div class="control-group ">
						<label for="Setting_'.$value['data']->name.'_'.$lang->code.'" class="control-label required">'.$value['data']->label.'<span class="required"></span></label>
						<div class="controls">
							'.$textField.'
						</div>
					</div>		
				';
			}else{
				$tabs[$lang->code] = array('label'=>$lang->name, 'content'=>'
					<div class="control-group ">
						<label for="Setting_'.$value['data']->name.'_'.$lang->code.'" class="control-label required">'.$value['data']->label.'<span class="required"></span></label>
						<div class="controls">
							'.$textField.'
						</div>
					</div>		
				'
			        , 'active'=>($k==$this->setting['lang_deff'])?TRUE:false,
			    );
			}
		}
		?>
		<?php endif ?>
	<?php endforeach ?>
	<?php if (count($tabs)>0): ?>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>
	<?php endif ?>


	<?php foreach ($model as $key => $value): ?>
		<?php if ($value['data']->dual_language=='n'): ?>
		<div class="control-group ">
			<label for="Setting_<?php echo $value['data']->name ?>" class="control-label required"><?php echo $value['data']->label ?><span class="required"></span></label>
			<div class="controls">
				<?php if ($value['data']->type=='textarea'): ?>
				<?php echo CHtml::textArea('Setting['.$value['data']->name.']', $value['data']->value, array('class'=>'span5')) ?>
				<?php elseif ($value['data']->type=='editor'): ?>
				<?php echo CHtml::textArea('Setting['.$value['data']->name.']', $value['data']->value, array('class'=>'span5 redactor')) ?>
				<?php else: ?>
				<?php echo CHtml::textField('Setting['.$value['data']->name.']', $value['data']->value, array('class'=>'span5')) ?>
				<?php endif ?>
			</div>
		</div>		
		<?php endif ?>
	<?php endforeach ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
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
