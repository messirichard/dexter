<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>\n"; ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
	<?php echo '</php' ?> 
	foreach ($modelDesc as $key => $value): 
		echo $form->errorSummary($value); 
	endforeach
	?>
	<?php echo "<?php"; ?> if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php echo "<?php"; ?> endif; ?>
	<?php echo '<?php' ?>
	$tabs = array();
	foreach ($modelDesc as $key => $value) {
		$lang = Language::model()->getName($key);
		$tabs[] = array('label'=>$lang->name, 'content'=>
	        $form->textFieldRow($value,'['.$lang->code.']name',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($value,'['.$lang->code.']content',array('class'=>'span5','maxlength'=>200))
	        , 'active'=>($key=='id')?TRUE:false,
	    );
		// $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
		// 	'model'=>$value,
		// 	'attribute'=>'['.$lang->code.']content', // model atribute
		// 	'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
		// 	'return'=>TRUE, // Toolbar settings (full, basic, advanced)
		// 	//'contentCSS'=>Yii::app()->baseUrl.'/asset/images/de_font2.css'
		// ));
	}
	?>
	<?php echo '<?php' ?> $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>$tabs,
	)); ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

<?php
}
?>
	<div class="form-actions">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Add' : 'Save',
		)); ?>\n"; ?>
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index', \$this->varGet=>\$_GET[\$this->varGet])),
			'label'=>'Batal',
		)); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
