<?php
$this->breadcrumbs=array(
	'Order'=>array('index'),
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Data Order '.$model->invoice_prefix.'-'.$model->invoice_no.' ('.OrOrderStatus::model()->findByPk($model->order_status_id)->name.')',
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
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
		<h4 class="widgettitle">Data Order</h4>
		<div class="widgetcontent">
			<div class="row-fluid">
				<div class="span6">
					<dl class="dl-horizontal">
	
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('first_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->first_name); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('last_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->last_name); ?></dd>
                    </dl>
				</div>
				<div class="span6">
					<dl class="dl-horizontal">
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->email); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->phone); ?></dd>
                    </dl>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<h3>Payment</h3>
					<dl class="dl-horizontal">
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_first_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_first_name); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_last_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_last_name); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_address_1')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_address_1); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_city')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_city); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_postcode')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_postcode); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_zone')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->payment_zone); ?></dd>
                    </dl>
				</div>
				<div class="span6">
					<h3>Shipping</h3>
					<dl class="dl-horizontal">
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_first_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_first_name); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_last_name')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_last_name); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_address_1')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_address_1); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_city')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_city); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_postcode')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_postcode); ?></dd>
                        <dt><?php echo CHtml::encode($model->getAttributeLabel('shipping_zone')); ?>:</dt>
                        <dd><?php echo CHtml::encode($model->shipping_zone); ?></dd>
                    </dl>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<dl class="dl-horizontal">
					    <dt><?php echo CHtml::encode($model->getAttributeLabel('total')); ?>:</dt>
					    <dd><?php echo CHtml::encode(Cart::money($model->total)); ?></dd>
                    </dl>
				</div>
				<div class="span6">
					<dl class="dl-horizontal">
					    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_weight')); ?>:</dt>
					    <dd><?php echo CHtml::encode($model->delivery_weight); ?></dd>
                    </dl>
				</div>
			</div>
<?php /*
    <dt><?php echo CHtml::encode($model->getAttributeLabel('comment')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->comment); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('total')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->total); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('order_status_id')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->order_status_id); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('affiliate_id')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->affiliate_id); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('commission')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->commission); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('language_id')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->language_id); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('currency_id')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->currency_id); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('currency_code')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->currency_code); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('currency_value')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->currency_value); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('ip')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->ip); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('date_add')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->date_add); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('date_modif')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->date_modif); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_from')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->delivery_from); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_to')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->delivery_to); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_package')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->delivery_package); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('delivery_price')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->delivery_price); ?></dd>
    <dt><?php echo CHtml::encode($model->getAttributeLabel('payment_method_id')); ?>:</dt>
    <dd><?php echo CHtml::encode($model->payment_method_id); ?></dd>
*/ ?>

		</div>
		</div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Products</h4>
		    </div>
		    <div class="widgetcontent">
				<?php foreach ($data as $key => $value): ?>
				<div class="row-fluid">
					<div class="span3" style="text-align: center;">
						<img style="width: 100%; max-width: 200px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
					</div>
					<div class="span9">
						<h3 class="title-product"><?php echo ucwords($value->name) ?></h3>
						<div class="row-fluid">
							<div class="span12">
				                <table class="table table-bordered responsive table-slim">
				                	<thead>
				                        <tr>
				                            <th>Item Code</th>
				                            <th>Option</th>
				                            <th>Weight</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->kode ?></td>
				                            <td><?php echo $value->attributes_name ?></td>
				                            <td><?php echo $value->berat ?></td>
				                        </tr>
				                    </tbody>
				                	<thead>
				                        <tr>
				                            <th>Qty</th>
				                            <th>Price</th>
				                            <th>Total</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->qty ?></td>
				                            <td><?php echo Cart::money($value->price) ?></td>
				                            <td><?php echo Cart::money($value->total) ?></td>
				                        </tr>
				                    </tbody>
				                </table>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php endforeach ?>
		    </div><!--widgetcontent-->
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
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Update Status Order',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Cancel',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widget">
			<h4 class="widgettitle">Change Status</h4>
			<div class="widgetcontent">
	        	<?php echo $form->dropDownListRow($model, 'order_status_id', array(
	        		''=>'Pilih Status',
	        		'1'=>'Pending',
	        		'2'=>'Processing',
	        		'3'=>'Shipped',
	        		'5'=>'Complete',
	        		'7'=>'Canceled',
	        		'14'=>'Expired',
	        		'11'=>'Refunded',
	        	), array('class'=>'span12')); ?>

				<?php echo $form->textAreaRow($model,'comment',array('class'=>'input-block-level',
				'hint'=>'Note: Type your comment')); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
jQuery('#OrOrder_order_status_id').on('change', function() {
	switch(jQuery(this).val()) {
    case "1":
		jQuery('#OrOrder_comment').html('pending transaction');
        break;
    case "2":
		jQuery('#OrOrder_comment').html('Your order is being processed');
        break;
    case "3":
		jQuery('#OrOrder_comment').html('Your order is being sent');
        break;
    case "5":
		jQuery('#OrOrder_comment').html('the transaction has been completed');
        break;
    case "7":
		jQuery('#OrOrder_comment').html('transaction is canceled');
        break;
    case "14":
		jQuery('#OrOrder_comment').html('transaction expired');
        break;
    case "11":
		jQuery('#OrOrder_comment').html('Goods in return');
        break;
    default:
		jQuery('#OrOrder_comment').html('');
	} 
})
</script>