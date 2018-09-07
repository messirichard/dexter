<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'group-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data User</h4>
<div class="widgetcontent">

	<?php echo $form->textFieldRow($model,'group',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'aktif',array(
		'1'=>'Active',
		'0'=>'Non Active',
	),array('class'=>'span5')); ?>

	<div class="control-group ">
		<label class="control-label required" for="MenuAkses_action">Hak Akses <span class="required">*</span></label>
		<?php 
		$menuAkses = MenuAkses::model()->findAll(); 
		$sekarang = array();
		if ($model->scenario = 'update') {
			$sekarang = Group::model()->getAksesGroup($model->akses);
		}
		?>
		<div class="controls">
			<table class="table table-bordered">
				<tr>
					<th>Akses Name</th>
					<th>Action</th>
				</tr>
				<?php foreach ($menuAkses as $key => $value): ?>
				<tr>
					<td><?php echo $value->name ?></td>
					<td>
						<?php
						$action = unserialize($value->action);
						?>
						<?php if (count($action) > 0 AND $action != ''): ?>
						<label for="<?php echo $value->controller.'_'.$k ?>" class="ckeckbox">
							<input type="checkbox" data-class="<?php echo $value->controller ?>" class="check-all" value="1">
							Check All
						</label>
						<div class="row">
						<?php foreach ($action as $k => $v): ?>
						<div class="span2">
							<label for="<?php echo $value->controller.'_'.$k ?>" class="ckeckbox">
								<input 
								type="checkbox" 
								name="akses[]" 
								class="<?php echo 'check_'.$value->controller ?>" 
								id="<?php echo $value->controller.'_'.$k ?>" 
								value="<?php echo $value->type.'.'.$value->controller.'.'.$k ?>"
								<?php if (isset($sekarang[$value->type.'.'.$value->controller.'.'.$k])): ?>
								checked="checked"
								<?php endif ?>
								>
								<?php echo $v ?>
							</label>
						</div>
						<?php endforeach ?>
						</div>
						<?php endif ?>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
	<script type="text/javascript">
	$('.check-all').click(function() {
		if ($(this).is(':checked')) {
			$(this).parent().parent().find('input[type=checkbox]').prop('checked', true);
		}else{
			$(this).parent().parent().find('input[type=checkbox]').prop('checked', false);
		};
	})
	</script>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('/admin/administrator/index')),
			'label'=>'Batal',
		)); ?>
</div>
</div>
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
