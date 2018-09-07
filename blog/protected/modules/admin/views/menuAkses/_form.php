<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'menu-akses-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'controller',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="control-group ">
		<label class="control-label required" for="MenuAkses_action">Action <span class="required">*</span></label>
		<div class="controls">
			<div class="akses-container">
				<?php
				$akses = unserialize($model->action);
				if ($model->scenario == 'insert') {
					$akses = array(
						'index'=>'List Data',
						'create'=>'Create Data',
						'update'=>'Update Data',
						'delete'=>'Delete Data',
					);
				}
				?>
				<?php if (count($akses) > 0 AND $akses != ''): ?>
				<?php foreach ($akses as $key => $value): ?>
				<div class="akses-list">
					<input type="text" name="akses[name][]" placeholder="name" value="<?php echo $value ?>">
					<input type="text" name="akses[action][]" placeholder="action" value="<?php echo $key ?>">
					<a href="#" class="btn akses-delete">Delete</a><br>
				</div>
				<?php endforeach ?>
				<?php endif ?>
				<div class="akses-list-template">
					<div class="akses-list">
						<input type="text" name="akses[name][]" placeholder="name">
						<input type="text" name="akses[action][]" placeholder="action">
						<a href="#" class="btn akses-delete">Delete</a><br>
					</div>
				</div>
			</div>
			<a href="#" class="btn akses-add">Add Akses</a>
		</div>
	</div>
	<script type="text/javascript">
	var akses_template = $('.akses-list-template').html();
	$('.akses-add').click(function() {
		$('.akses-container').append(akses_template);
		return false;
	})
	$('.akses-delete').live('click', function() {
		$(this).parent().remove();
		return false;
	})
	</script>

	<div class="control-group ">
		<label class="control-label required" for="MenuAkses_action">Sub Action <span class="required">*</span></label>
		<div class="controls">
			<div class="sub_action-container">
				<?php
				$sub_action = unserialize($model->sub_action);
				?>
				<?php if (count($sub_action) > 0 AND $sub_action != ''): ?>
				<?php foreach ($sub_action as $key => $value): ?>
				<div class="sub_action-list">
					<input type="text" name="sub_action[name][]" placeholder="name" value="<?php echo $value ?>">
					<input type="text" name="sub_action[action][]" placeholder="action" value="<?php echo $key ?>">
					<a href="#" class="btn sub_action-delete">Delete</a><br>
				</div>
				<?php endforeach ?>
				<?php endif ?>
				<div class="sub_action-list-template">
					<div class="sub_action-list">
						<input type="text" name="sub_action[name][]" placeholder="name">
						<input type="text" name="sub_action[action][]" placeholder="action">
						<a href="#" class="btn sub_action-delete">Delete</a><br>
					</div>
				</div>
			</div>
			<a href="#" class="btn sub_action-add">Add Akses</a>
		</div>
	</div>
	<script type="text/javascript">
	var sub_action_template = $('.sub_action-list-template').html();
	$('.sub_action-add').click(function() {
		$('.sub_action-container').append(sub_action_template);
		return false;
	})
	$('.sub_action-delete').live('click', function() {
		$(this).parent().remove();
		return false;
	})
	</script>

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
