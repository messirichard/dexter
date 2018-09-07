<?php
/* @var $this MainController */
$this->breadcrumbs=array(
	//'new Born'=>array('main/product'),
	'',
);

$this->pageTitle = $this->pageTitle;
?>
<div class="full-content">
	<div class="height-25"></div>
	<div class="inner-content">
		<div class="top-right-content">
			<div class="name-left">
				<div class="breadcumb"> 
					<span class="sp-cart">Shopping Cart </span>
				<!-- breadcrumbs -->
				</div>
			</div>
			
			<div class="clear height-0"></div>
		</div>
		<div class="height-10"></div>
		<div class="height-2"></div>

		<div class="middle-content hmincart">
			<div class="inner-middle-content padding-incart">
				
				<div class="tb-cart-detail">
					<table class="cartlist">
						<thead>
							<tr>
								<th>Shopping Items:</th>

								<th>
									<div align="center">
										Quantity
									</div>
								</th>
								<th>
									<div align="center">
										Price
									</div>
								</th>
								<!-- <th>&nbsp;&nbsp;&nbsp;</th> -->
							</tr>
						</thead>
						<tbody>
						<?php for ($i=0; $i < 3; $i++) { ?>
							<tr>
								<td class="dt-vwproduct">
									<div class="c-viewproduct">
												<div class="img">
													<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-example-cartdt.jpg" alt="">
												</div>
												<div class="t-text">
													Pink Lace Gown												
												</div>
												<div class="clear"></div>
											</div>
								</td>
								<td>
									<div align="center">

										<div class="quantity-c">
													<form action="<?php echo CHtml::normalizeUrl(array('cart', 'id'=>$value['id'])); ?>" id="form_qty_<?php echo $value['id'] ?>" method="post">
														<input type="text" class="input-small" name="qty" value="<?php echo $value['qty'] ?>">
														<div class="upd-q"><a href="#" onclick="$('#form_qty_<?php echo $value['id'] ?>').submit()"><i class="icon-updt"></i></a></div>
														<div class="canc-q"><a href="<?php echo CHtml::normalizeUrl(array('cartdelete', 'id'=>$value['id'])); ?>"><i class="icon-canc"></i></a></div>
													</form>
												</div>

									</div>
								</td>
								<td>
									<div align="center">
										IDR 850,000,-
									</div>
								</td>
								<!-- <td>
									<div align="center">
										<div class="btn btn-edcart">Edit</div>
										&nbsp;&nbsp;&nbsp;
									</div>
								</td> -->
							</tr>
						<?php  } ?>
						<tr class="total">
									<td>
										&nbsp;
									</td>
									<td>
										<div align="center">
											TOTAL
										</div>
									</td>
									<td>
										<div class="n-total" align="center">
											IDR 1,850,000,-
										</div>
									</td>
									<!-- <td>
										<div align="center">
											<div class="btn btn-succart">Check Out</div>
										</div>
									</td> -->
								</tr>
						</tbody>
					</table>
				</div>
				<!-- End Tb Cart Detail -->

				<div class="clear height-0"></div>
			</div>
			<div class="clear height-0"></div>
		</div>
		<div class="clear"></div>
		<div class="height-15"></div>
		
		<div class="box-information-order">
						<div class="inner">
							<div class="top-information">
								<div class="left-info">
									Informasi Pembeli
								</div>
								<div class="right-info">
									<div class="r-info-kirim">Informasi Tujuan Pengiriman</div>
									<div class="r-infopembeli">
										<div class="control-group ">
											<div class="controls">
												<label class="checkbox" for="TestForm_radioButton"><input name="TestForm[radioButton]" id="TestForm_radioButton" value="1" type="checkbox">
Sama dengan informasi pembeli </label></div></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#TestForm_radioButton').click(function(){
			if($('#TestForm_radioButton:checked').val()==1){
				$('#DeliveryDestination_name').val($('#Client_name').val());
				$('#DeliveryDestination_phone').val($('#Client_phone').val());
				$('#DeliveryDestination_address').val($('#Client_address').val());
				$('#DeliveryDestination_address2').val($('#Client_address2').val());
				$('#DeliveryDestination_kota').val($('#Client_kota').val());
				$('#DeliveryDestination_province').val($('#Client_province').val());

			}else{
				$('#DeliveryDestination_name').val('');
				$('#DeliveryDestination_phone').val('');
				$('#DeliveryDestination_address').val('');
				$('#DeliveryDestination_address2').val('');
				$('#DeliveryDestination_kota').val('');
				$('#DeliveryDestination_province').val('');
			}
		})
	})
</script>
									</div>
								</div>
							<div class="clear"></div>
							<div class="line-top-information"></div>
							</div>
							<!-- End top information -->
							<?php $form = $this->beginWidget('CActiveForm', array(
								// 'action'=>array('/estore/cart'),
							    'id'=>'order-form',
							    'enableAjaxValidation'=>false,
							    'enableClientValidation'=>false,
							    'clientOptions'=>array(
										'inputContainer'=>'.right-form .row-form',
									),
							)); ?>
							<div class="form-detail-information">
								<div class="height-10"></div>
								<div class="height-10"></div>
									<div class="left-form">
										<?php echo $form->errorSummary($model) ?>
										
										 <div class="row-form">
											<?php echo $form->label($model,'name'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'name'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div> 

										<div class="row-form">
											<?php echo $form->label($model,'phone'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'phone'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model,'email'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'email'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model,'address'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'address'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php //echo $form->label($model,'address2', array('disabled'=>'disabled')); ?>
											<label for="">&nbsp;</label>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'address2'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model,'kota'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'kota'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model,'province'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model,'province'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

									</div>
										<!-- End Left Form -->

									<div class="right-form">
										<?php echo $form->errorSummary($model2) ?>
										<div class="row-form">
											<?php echo $form->label($model2,'name'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'name'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div> 

										<div class="row-form">
											<?php echo $form->label($model2,'phone'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'phone'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model2,'address'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'address'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php //echo $form->label($model,'address2', array('disabled'=>'disabled')); ?>
											<label for="">&nbsp;</label>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'address2'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model2,'kota'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'kota'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

										<div class="row-form">
											<?php echo $form->label($model2,'province'); ?>
											<div class="input-box-med">
												<div class="inner-box">
											    <?php echo $form->textField($model2,'province'); ?>
												</div>
											</div>
											<div class="clear"></div>
										</div>

									</div>

									<div class="clear"></div>
									<div class="height-5"></div>
							</div>
									
							<div class="clear"></div>
							<div class="line-top-information"></div>
							<div class="l-submitform">
								<input type="submit" name="submit" value="Check Out" >
							</div>
							<?php $this->endWidget(); ?>
							</div>
							<div class="clear height-10"></div>
						</div>

		<div class="clear height-5"></div>
	</div>
</div>

<style type="text/css">
	.b-productc-home{
		padding-bottom: 15px !important;
	}
</style>