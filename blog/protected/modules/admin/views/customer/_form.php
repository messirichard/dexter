<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cs-customer-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Data Customer</h4>
		<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>100)); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span12','maxlength'=>100)); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model,'telp',array('class'=>'span12','maxlength'=>20)); ?>
				</div>
			</div>


		</div>
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  box "Alamat" untuk daftar pengiriman barang dan kontak
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  Anda bisa memasukkan lebih dari 1 alamat dengan klik tombol "Tambah Alamat" di bawah
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  Bila first name di tidak di isi maka tidak akan tersimpan
		</div>
		<div class="tambah-address">

			<div class="widgetbox">
				<div class="headtitle">
					<div class="btn-group">
						<button type="button" class="btn btn-delete-alamat">Delete Alamat</button>
					</div>
					<h4 class="widgettitle">Alamat</h4>
				</div>
			<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span4">
					<label class="required">First Name</label>
					<input type="text" id="CsCustomerAddress_first_name" name="CsCustomerAddress[first_name][]" class="span12">
				</div>
				<div class="span4">
					<label class="required">Last Name</label>
					<input type="text" id="CsCustomerAddress_last_name" name="CsCustomerAddress[last_name][]" class="span12">
				</div>
				<div class="span4">
					<label class="required">Phone</label>
					<input type="text" id="CsCustomerAddress_phone" name="CsCustomerAddress[phone][]" class="span12">
				</div>
			</div>


			<div class="row-fluid">
				<div class="span4">
					<label class="required">Address</label>
					<textarea name="CsCustomerAddress[address][]" id="CsCustomerAddress_address" class="span12" cols="30" rows="3"></textarea>
				</div>
				<div class="span4">
					<label class="required">Postal Code</label>
					<input type="text" id="CsCustomerAddress_postal_code" name="CsCustomerAddress[postal_code][]" class="span12">
					<label class="required">City</label>
					<input type="text" id="CsCustomerAddress_city" name="CsCustomerAddress[city][]" class="span12">
				</div>
				<div class="span4">
					<label class="required">Country</label>
					<select id="CsCustomerAddress_country_code" name="CsCustomerAddress[country_code][]" class="span12">
						<option value="IDN">Indonesia</option>
					</select>
				</div>
			</div>
			</div>
			</div>
		</div>
		<div class="tempel-address">
		<?php foreach ($modelAddress as $key => $value): ?>
			<div class="widgetbox">
				<div class="headtitle">
					<div class="btn-group">
						<button type="button" class="btn btn-delete-alamat">Delete Alamat</button>
					</div>
					<h4 class="widgettitle">Alamat</h4>
				</div>
			<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span4">
					<label class="required">First Name</label>
					<input type="text" id="CsCustomerAddress_first_name" name="CsCustomerAddress[first_name][]" class="span12" value="<?php echo $value->first_name ?>">
				</div>
				<div class="span4">
					<label class="required">Last Name</label>
					<input type="text" id="CsCustomerAddress_last_name" name="CsCustomerAddress[last_name][]" class="span12" value="<?php echo $value->last_name ?>">
				</div>
				<div class="span4">
					<label class="required">Phone</label>
					<input type="text" id="CsCustomerAddress_phone" name="CsCustomerAddress[phone][]" class="span12" value="<?php echo $value->phone ?>">
				</div>
			</div>


			<div class="row-fluid">
				<div class="span4">
					<label class="required">Address</label>
					<textarea name="CsCustomerAddress[address][]" id="CsCustomerAddress_address" class="span12" cols="30" rows="3"><?php echo $value->address ?></textarea>
				</div>
				<div class="span4">
					<label class="required">Postal Code</label>
					<input type="text" id="CsCustomerAddress_postal_code" name="CsCustomerAddress[postal_code][]" class="span12" value="<?php echo $value->postal_code ?>">
					<label class="required">City</label>
					<input type="text" id="CsCustomerAddress_city" name="CsCustomerAddress[city][]" class="span12" value="<?php echo $value->city ?>">
				</div>
				<div class="span4">
					<label class="required">Country</label>
					<select id="CsCustomerAddress_country_code" name="CsCustomerAddress[country_code][]" class="span12" value="<?php echo $value->country_code ?>">
						<option value="IDN">Indonesia</option>
					</select>
				</div>
			</div>
			</div>
			</div>
		<?php endforeach ?>
		</div>
		<button type="button" class="btn btn-primary tmb-tambah-address">Tambah Alamat</button>
		<script type="text/javascript">
		jQuery(function( $ ) {
			$('.tmb-tambah-address').tambahData({
				targetHtml: '.tambah-address',
				// html: '<tr><td></td></tr>',
				tambahkan: '.tempel-address',
			});
			$(document).on('click', '.btn-delete-alamat',function( e ) {
				$(this).parent().parent().parent().remove();
				return false;
			})
		})

		</script>

		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
		
	</div>
	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widget">
		<h4 class="widgettitle">Data Login</h4>
		<div class="widgetcontent">
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>200)); ?>

			<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span12','maxlength'=>100)); ?>

			<?php echo $form->passwordFieldRow($model,'confirmpass',array('class'=>'span12','maxlength'=>100)); ?>

			<?php echo $form->dropDownListRow($model,'group_member_id', array(), array('class'=>'span12', 'empty'=>'Default Member')); ?>

        	<?php echo $form->dropDownListRow($model, 'status', array(
        		'1'=>'Aktif',
        		'0'=>'Tidak Aktif',
        	), array('class'=>'span12')); ?>
            <div class="divider5"></div>
			<div class="alert">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Kosongkan password jika tidak ingin di ganti
			</div>

		</div>
		</div>
	</div>
</div>


<?php $this->endWidget(); ?>
