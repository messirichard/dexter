<?php
$this->breadcrumbs=array(
	'Featured Produk',
);

$this->menu=array(
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
);
$categorySelect = Category::model()->findAll('parent_id = "0" AND type = "kategori" LIMIT 10')
?>

<h3>produk UNGGULAN galeri fitness (Anda memiliki 9 space untuk produk unggulan)</h3>
<h4>* Klik pada gambar untuk mengedit</h4>
<div>
	<?php
	$featured = json_decode($this->setting['unggulan']);
	$no = 1;
	?>
	<?php foreach ($featured as $key => $value): ?>
	<?php
	$model = Product::model()->findByPk($value);
	?>
	<div class="featured-list">
		<a data-id="<?php echo $no ?>" class="unggulan-add unggulan-add-<?php echo $no ?>" href="#myModal-unggulan" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
	</div>
	<?php $no++; ?>
	<?php endforeach ?>
	<div style="clear: both;"></div>
</div>

<h3>produk PROMOSI galeri fitness (Anda memiliki 9 space untuk featured)</h3>
<h4>* Klik pada gambar untuk mengedit</h4>
<div>
	<?php
	$featured = json_decode($this->setting['featured']);
	$no = 1;
	?>
	<?php foreach ($featured as $key => $value): ?>
	<?php
	$model = Product::model()->findByPk($value);
	?>
	<div class="featured-list">
		<a data-id="<?php echo $no ?>" class="featured-add featured-add-<?php echo $no ?>" href="#myModal" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
	</div>
	<?php $no++; ?>
	<?php endforeach ?>
	<div style="clear: both;"></div>
</div>

<?php
$noFeatured = 2;
?>
<?php foreach ($featuredData as $featuredDataValue): ?>
<div class="clear" style="height: 30px;"></div>
<div>
	<select name="group" class="select-group" data-id="<?php echo 'group-'.$featuredDataValue['varBaru'] ?>" data-select="select-group-<?php echo $featuredDataValue['varBaru'] ?>">
	<?php foreach ($categorySelect as $key => $value): ?>
	<?php if (json_decode($this->setting['group-'.$featuredDataValue['varBaru']]) == $value->id): ?>
		<option value="<?php echo $value->id ?>" selected="selected"><?php echo $value->name ?></option>
	<?php else: ?>
		<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
	<?php endif ?>
	<?php endforeach ?>
	</select>
</div>
<div class="bagidua">
<h4><?php // echo $featuredDataValue['title'] ?>
BARU (Anda memiliki <?php echo $featuredDataValue['jml'] ?> space untuk best seller)</h4>
<h5>* Klik pada gambar untuk mengedit</h5>
<div>
	<?php
	$best = json_decode($this->setting[$featuredDataValue['varBaru']]);
	$no = 1;
	?>
	<?php foreach ($best as $key => $value): ?>
	<?php
	$model = Product::model()->findByPk($value);
	?>
	<div class="product-list">
		<a data-id="<?php echo $no ?>" class="<?php echo $featuredDataValue['varBaru'] ?>-add <?php echo $featuredDataValue['varBaru'] ?>-add-<?php echo $no ?>" href="#myModal<?php echo $noFeatured ?>" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
	</div>
	<?php $no++; ?>
	<?php endforeach ?>
	<div style="clear: both;"></div>
</div>
<div id="myModal<?php echo $noFeatured ?>" class="modal hide fade">
	<form action="" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Best Seller</h3>
		</div>
		<div class="modal-body">
			<?php /*
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Kategori <span class="required">*</span></label>
				<div class="controls">
					<select name="<?php echo $featuredDataValue['varBaru'] ?>[category]" id="" class="span5" required>
						
					</select>
				</div>
			</div>
			*/ ?>
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Produk <span class="required">*</span></label>
				<div class="controls">
					<select name="<?php echo $featuredDataValue['varBaru'] ?>[product]" id="" class="span5 select-group-<?php echo $featuredDataValue['varBaru'] ?>" required>
						<option value="">----- Pilih Produk -----</option>
						<?php
						$_GET['category_id'] = json_decode($this->setting['group-'.$featuredDataValue['varBaru']]);
						$data = Product::model()->getAllData(1000000000, false, $this->languageID);
						?> 
						<?php foreach ($data['data'] as $key => $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="<?php echo $featuredDataValue['varBaru'] ?>[id]" value="" id="<?php echo $featuredDataValue['varBaru'] ?>-id">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
			<input type="submit" class="btn btn-primary" value="Save">
		</div>
	</form>
</div>
</div>
<?php $noFeatured++ ?>
<div class="bagidua">
<h4><?php //echo $featuredDataValue['title'] ?> TERLARIS (Anda memiliki <?php echo $featuredDataValue['jml'] ?> space untuk best seller)</h4>
<h5>* Klik pada gambar untuk mengedit</h5>
<div>
	<?php
	$terlaris = json_decode($this->setting[$featuredDataValue['varLama']]);
	$no = 1;
	?>
	<?php foreach ($terlaris as $key => $value): ?>
	<?php
	$model = Product::model()->findByPk($value);
	?>
	<div class="product-list">
		<a data-id="<?php echo $no ?>" class="<?php echo $featuredDataValue['varLama'] ?>-add <?php echo $featuredDataValue['varLama'] ?>-add-<?php echo $no ?>" href="#myModal<?php echo $noFeatured ?>" role="button" data-toggle="modal">
			<?php if ($model == null): ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/js/miniupload/assets/img/icon-plus.png">
			<?php else: ?>
			<img alt="" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>">
			<?php endif ?>
		</a>
	</div>
	<?php $no++; ?>
	<?php endforeach ?>
	<div style="clear: both;"></div>
</div>
<div id="myModal<?php echo $noFeatured ?>" class="modal hide fade">
	<form action="" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Best Seller</h3>
		</div>
		<div class="modal-body">
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Produk <span class="required">*</span></label>
				<div class="controls">
					<select name="<?php echo $featuredDataValue['varLama'] ?>[product]" id="" class="span5 select-group-<?php echo $featuredDataValue['varBaru'] ?>" required>
						<option value="">----- Pilih Produk -----</option>
						<?php
						// $data = Product::model()->getAllData(1000000000, false, $this->languageID);
						?> 
						<?php foreach ($data['data'] as $key => $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="<?php echo $featuredDataValue['varLama'] ?>[id]" value="" id="<?php echo $featuredDataValue['varLama'] ?>-id">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
			<input type="submit" class="btn btn-primary" value="Save">
		</div>
	</form>
</div>
</div>
<div style="clear: both;"></div>
<?php $noFeatured++ ?>

<script type="text/javascript">
	$('a.<?php echo $featuredDataValue['varBaru'] ?>-add').bind('click',function() {
		$('#<?php echo $featuredDataValue['varBaru'] ?>-id').val($(this).attr('data-id'))
	})
	$('a.<?php echo $featuredDataValue['varLama'] ?>-add').bind('click',function() {
		$('#<?php echo $featuredDataValue['varLama'] ?>-id').val($(this).attr('data-id'))
	})
</script>
<?php endforeach ?>

<div id="myModal" class="modal hide fade">
	<form action="" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Featured</h3>
		</div>
		<div class="modal-body">
			<?php /*
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Kategori <span class="required">*</span></label>
				<div class="controls">
					<select name="featured[category]" id="" class="span5" required>
						
					</select>
				</div>
			</div>
			*/ ?>
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Produk <span class="required">*</span></label>
				<div class="controls">
					<select name="featured[product]" id="" class="span5" required>
						<option value="">----- Pilih Produk -----</option>
						<?php
						$data = Product::model()->getAllData(1000000000, false, $this->languageID);
						?> 
						<?php foreach ($data['data'] as $key => $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="featured[id]" value="" id="featured-id">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
			<input type="submit" class="btn btn-primary" value="Save">
		</div>
	</form>
</div>

<div id="myModal-unggulan" class="modal hide fade">
	<form action="" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Featured</h3>
		</div>
		<div class="modal-body">
			<?php /*
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Kategori <span class="required">*</span></label>
				<div class="controls">
					<select name="featured[category]" id="" class="span5" required>
						
					</select>
				</div>
			</div>
			*/ ?>
			<div class="control-group ">
				<label for="Product_name" class="control-label required">Pilih Produk <span class="required">*</span></label>
				<div class="controls">
					<select name="unggulan[product]" id="" class="span5" required>
						<option value="">----- Pilih Produk -----</option>
						<?php
						$data = Product::model()->getAllData(1000000000, false, $this->languageID);
						?> 
						<?php foreach ($data['data'] as $key => $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
						<?php endforeach ?>
					</select>
					<input type="hidden" name="unggulan[id]" value="" id="unggulan-id">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
			<input type="submit" class="btn btn-primary" value="Save">
		</div>
	</form>
</div>

<script type="text/javascript">
	// $('#myModal').modal(options)
	$('a.featured-add').bind('click',function() {
		$('#featured-id').val($(this).attr('data-id'))
	})
	$('a.unggulan-add').bind('click',function() {
		$('#unggulan-id').val($(this).attr('data-id'))
	})

	$('.select-group').change(function() {
		var select_group = $(this).attr('data-select');
		// alert(select_group);
		$.ajax({
			url: '<?php echo CHtml::normalizeUrl(array('/admin/setting/featuresnbest')); ?>',
			data: { ajax: "group", name: $(this).attr('data-id'), value: $(this).val() },
			dataType: 'html',
			type: 'post',
			success: function(msg){
				$('select.'+select_group).html(msg);
			},
			error: function(msg){
				errorMessage('sending data error, cek your connection');
				console.log(msg);
			}
		});
	})
</script>
