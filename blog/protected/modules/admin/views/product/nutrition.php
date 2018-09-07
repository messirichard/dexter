<?php
$this->breadcrumbs=array(
	'Product'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);
?>
<style type="text/css">
.dragged {
  position: absolute;
  top: 0;
  opacity: 0.5;
  z-index: 2000; }
.sorted_table tr.placeholder {
  display: block;
  background: red;
  position: relative;
  margin: 0;
  padding: 0;
  border: none; }
.sorted_table tr.placeholder:before {
content: "";
position: absolute;
width: 0;
height: 0;
border: 5px solid transparent;
border-left-color: red;
margin-top: -5px;
left: -5px;
border-right: none; }
</style>

<h1>Nutrition Fact "<?php echo $model->title ?>"
<a href="" class="btn btn-large btn-danger" onclick="window.close();return false;">Close</a>
</h1>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php
$criteria=new CDbCriteria;

$criteria->select = "t.*, product_description.title";

$criteria->join = "
LEFT JOIN product_description ON product_description.product_id=t.id
RIGHT JOIN product_nutrition ON product_nutrition.product_id=t.id
";
$criteria->group = 't.id';
$data = Product::model()->findAll($criteria);
?>
<select name="copy" class="span5">
	<?php foreach ($data as $key => $value): ?>
		<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
	<?php endforeach ?>
</select>
<button type="submit" value="ok" class="btn btn-primary">Copy</button>

<?php $this->endWidget(); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	<div class="control-group ">
		<label for="Nutrition_name" class="control-label required">Name</label>
		<div class="controls">
			<input type="text" name="Nutrition[name]" id="Nutrition_name" value="<?php echo $modelData['single']['name'] ?>" class="span5">
		</div>
	</div>
	<div class="control-group ">
		<label for="Nutrition_color" class="control-label required">Color/Taste</label>
		<div class="controls">
			<input type="text" name="Nutrition[color]" id="Nutrition_color" value="<?php echo $modelData['single']['color'] ?>" class="span5">
		</div>
	</div>
	<div class="control-group ">
		<label for="Nutrition_ingredients" class="control-label required">Other Ingredients</label>
		<div class="controls">
			<textarea name="Nutrition[ingredients]" id="Nutrition_ingredients" class="span5"><?php echo $modelData['single']['ingredients'] ?></textarea>
		</div>
	</div>
	<div class="control-group ">
		<label for="Nutrition_warning" class="control-label required">Allergen Warning</label>
		<div class="controls">
			<textarea name="Nutrition[warning]" id="Nutrition_warning" class="span5"><?php echo $modelData['single']['warning'] ?></textarea>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label required">&nbsp;</label>
		<div class="controls">
			<a id="add-field1" class="add-field1 btn btn-info">Field 1</a>
			<a id="add-field2" class="add-field2 btn btn-info">Field 2</a>
			<a id="add-line-bold" class="add-line-bold btn btn-info">Line Bold</a>
			<a id="add-line-thin" class="add-line-thin btn btn-info">Line Thin</a>
		</div>
	</div>


	<div class="grid-view">
	<table class="items table table-striped sorted_table">
	<thead>
		<tr>
			<th>Value</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody class="edit">
		<?php if (count($modelData['multi']) > 0): ?>
		<?php foreach ($modelData['multi'] as $key => $value): ?>
			<?php
			switch ($value['type']) {
				case 'field1':
				?>
					<tr>
						<td>
							<input type="text" name="Nutrition[field1][]" value="<?php echo $value['value'] ?>" class="span5">
							<input type="hidden" name="Nutrition[field21][]"  value="">
							<input type="hidden" name="Nutrition[field22][]" value="">
							<input type="hidden" name="Nutrition[field23][]" value="">
							<input type="hidden" name="Nutrition[type][]" value="field1">
						</td>
						<td width="12%">
							<a href="#" class="btn btn-primary delete-btn">Delete</a>
						</td>
					</tr>
				<?php
					break;
				case 'field2':
				$field2 = unserialize($value['value']);
				?>
					<tr>
						<td>
							<input type="hidden" name="Nutrition[field1][]" value="">
							<input type="text" name="Nutrition[field21][]" value="<?php echo $field2['field21'] ?>">
							<input type="text" name="Nutrition[field22][]" value="<?php echo $field2['field22'] ?>">
							<input type="text" name="Nutrition[field23][]" value="<?php echo $field2['field23'] ?>">
							<input type="hidden" name="Nutrition[type][]" value="field2">
						</td>
						<td width="12%">
							<a href="#" class="btn btn-primary delete-btn">Delete</a>
						</td>
					</tr>
				<?php
					break;
				case 'line-bold':
				?>
					<tr>
						<td>
							Line Bold
							<input type="hidden" name="Nutrition[field1][]" value="">
							<input type="hidden" name="Nutrition[field21][]" value="">
							<input type="hidden" name="Nutrition[field22][]" value="">
							<input type="hidden" name="Nutrition[field23][]" value="">
							<input type="hidden" name="Nutrition[type][]" value="line-bold">
						</td>
						<td width="12%">
							<a href="#" class="btn btn-primary delete-btn">Delete</a>
						</td>
					</tr>
				<?php
					break;
				case 'line-thin':
				?>
					<tr>
						<td>
							Line Thin
							<input type="hidden" name="Nutrition[field1][]" value="">
							<input type="hidden" name="Nutrition[field21][]" value="">
							<input type="hidden" name="Nutrition[field22][]" value="">
							<input type="hidden" name="Nutrition[field23][]" value="">
							<input type="hidden" name="Nutrition[type][]" value="line-thin">
						</td>
						<td width="12%">
							<a href="#" class="btn btn-primary delete-btn">Delete</a>
						</td>
					</tr>
				<?php
					break;

				default:
					
					break;
			}
			?>
		<?php endforeach ?>
		<?php endif ?>
	</tbody>
	</table>
	</div>

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
			'htmlOptions'=>array('onclick'=>"window.close();return false;"),
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
<table style="display: none;">
<tbody class="field1">
	<tr>
		<td>
			<input type="text" name="Nutrition[field1][]" value="" class="span5">
			<input type="hidden" name="Nutrition[field21][]"  value="">
			<input type="hidden" name="Nutrition[field22][]" value="">
			<input type="hidden" name="Nutrition[field23][]" value="">
			<input type="hidden" name="Nutrition[type][]" value="field1">
		</td>
		<td width="12%">
			<a href="#" class="btn btn-primary delete-btn">Delete</a>
		</td>
	</tr>
</tbody>
<tbody class="field2">
	<tr>
		<td>
			<input type="hidden" name="Nutrition[field1][]" value="">
			<input type="text" name="Nutrition[field21][]" value="">
			<input type="text" name="Nutrition[field22][]" value="">
			<input type="text" name="Nutrition[field23][]" value="">
			<input type="hidden" name="Nutrition[type][]" value="field2">
		</td>
		<td width="12%">
			<a href="#" class="btn btn-primary delete-btn">Delete</a>
		</td>
	</tr>
</tbody>
<tbody class="line-bold">
	<tr>
		<td>
			Line Bold
			<input type="hidden" name="Nutrition[field1][]" value="">
			<input type="hidden" name="Nutrition[field21][]" value="">
			<input type="hidden" name="Nutrition[field22][]" value="">
			<input type="hidden" name="Nutrition[field23][]" value="">
			<input type="hidden" name="Nutrition[type][]" value="line-bold">
		</td>
		<td width="12%">
			<a href="#" class="btn btn-primary delete-btn">Delete</a>
		</td>
	</tr>
</tbody>
<tbody class="line-thin">
	<tr>
		<td>
			Line Thin
			<input type="hidden" name="Nutrition[field1][]" value="">
			<input type="hidden" name="Nutrition[field21][]" value="">
			<input type="hidden" name="Nutrition[field22][]" value="">
			<input type="hidden" name="Nutrition[field23][]" value="">
			<input type="hidden" name="Nutrition[type][]" value="line-thin">
		</td>
		<td width="12%">
			<a href="#" class="btn btn-primary delete-btn">Delete</a>
		</td>
	</tr>
</tbody>
</table>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/asset/js/jquery-sortable.js"></script>
<script type="text/javascript">
	var field1 = $('.field1').html();
	var field2 = $('.field2').html();
	var lineThin = $('.line-thin').html();
	var lineBold = $('.line-bold').html();
	$('.sorted_table').sortable({
	  containerSelector: 'table',
	  itemPath: '> tbody',
	  itemSelector: 'tr',
	  placeholder: '<tr class="placeholder"/>'
	})
	$('#add-field1').click(function() {
		$('tbody.edit').append(field1);
		$('.sorted_table').sortable({
		  containerSelector: 'table',
		  itemPath: '> tbody',
		  itemSelector: 'tr',
		  placeholder: '<tr class="placeholder"/>'
		})
		return false;
	})
	$('#add-field2').click(function() {
		$('tbody.edit').append(field2);
		$('.sorted_table').sortable({
		  containerSelector: 'table',
		  itemPath: '> tbody',
		  itemSelector: 'tr',
		  placeholder: '<tr class="placeholder"/>'
		})
		return false;
	})
	$('#add-line-thin').click(function() {
		$('tbody.edit').append(lineThin);
		$('.sorted_table').sortable({
		  containerSelector: 'table',
		  itemPath: '> tbody',
		  itemSelector: 'tr',
		  placeholder: '<tr class="placeholder"/>'
		})
		return false;
	})
	$('#add-line-bold').click(function() {
		$('tbody.edit').append(lineBold);
		$('.sorted_table').sortable({
		  containerSelector: 'table',
		  itemPath: '> tbody',
		  itemSelector: 'tr',
		  placeholder: '<tr class="placeholder"/>'
		})
		return false;
	})
	$('.delete-btn').live('click', function() {
		$(this).parent().parent().remove();
		$('.sorted_table').sortable({
		  containerSelector: 'table',
		  itemPath: '> tbody',
		  itemSelector: 'tr',
		  placeholder: '<tr class="placeholder"/>'
		})
		return false;
	})
</script>
