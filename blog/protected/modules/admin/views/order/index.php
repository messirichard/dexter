<?php
$this->breadcrumbs=array(
	'Order',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Data Order',
);

?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'cari',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Cari dengan keyword')); ?>
		</div>
		<div class="span8">
			<?php //echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Reset',
		'url'=>Yii::app()->createUrl($this->route),
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Export Data',
		'url'=>Yii::app()->createUrl('/admin/order/export'),
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Order Manual',
		'url'=>Yii::app()->createUrl('/admin/order/create'),
	)); ?>
<?php $this->endWidget(); ?>

<h1>Users</h1>
<div class="table-responsive">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'rowCssClassExpression'=>'(($data->status == 0) ? "pending-style" : "").
			(($data->status == 1) ? "complete-style" : "").
			(($data->status == 5) ? "claimed-style" : "").
			(($data->status == 3) ? "cancel-style" : "").
			(($data->status == 10) ? "konfirmasi-style" : "").
			(($data->status == 2) ? "paid-style" : "")',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		array(
			'header'=>'Detail Ticket',
			'type'=>'raw',
			// 'value'=>'"No Invoice: ".CHtml::link(DSB."-".$data->id, array("/admin/order/detail", "id"=>$data->id))."<br>".
			'value'=>'"No Invoice: ".$data->no_invoice."<br>".
			"No KTP: ".$data->ktp."<br>".
			"Product Name: ".$data->ticket_name."<br>".
			"Product Desc: ".$data->ticket_desc."<br>".
			"Qty: ".$data->qty."<br>".
			(($data->method == "bank") ? "Kode Unik: ".$data->kode_unik."<br>" : "").
			"Total Payment: ".(($data->method == "bank") ? Cart::money($data->total + $data->kode_unik) : Cart::money($data->total))
			',
		),
		array(
			'header'=>'Order Data',
			'type'=>'raw',
			'value'=>'
			"Name: ".$data->first_name." ".$data->last_name."<br>".
			"Email: ".$data->email."<br>".
			"Phone: ".$data->phone."<br>"
			',
		),
		array(
			'header'=>'Address',
			'type'=>'raw',
			'value'=>'
			"Address: ".$data->address."<br>".
			"City: ".$data->city."<br>".
			"Post Code: ".$data->post_code."<br>".
			"State: ".$data->state."<br>"
			',
		),
		array(
			'header'=>'Comment',
			'type'=>'raw',
			'value'=>'nl2br($data->comment)',
		),
		array(
			'header'=>'Action',
			'type'=>'raw',
			'value'=>'
			"Status: ".(($data->status == 0) ? "Pending Payment" : "").
			(($data->status == 1) ? "Complete" : "").
			(($data->status == 5) ? "Claimed" : "").
			(($data->status == 3) ? "Cancel" : "").
			(($data->status == 10) ? "Konfirmasi Transfer" : "").
			(($data->status == 2) ? "Paid" : "")."<br>".
			"Payement Method: ".(($data->method == "bank") ? "Bank Transfer" : (($data->method == "Gerai") ? "Gerai" : "DokuPay"))."<br>".
			(($data->status == 0 || $data->status == 2 || $data->status == 10) ? (CHtml::link("Change to Complete", array("/admin/order/complete", "id"=>$data->id), array("class"=>"btn btn-primary"))."<br>") : "").
			(($data->status == 0 || $data->status == 2 || $data->status == 10 || $data->status == 1) ? (CHtml::link("Resend Email", array("/admin/order/resend", "id"=>$data->id), array("class"=>"btn btn-primary"))."<br>") : "").
			(($data->status == 1) ? (CHtml::link("Tukar Tiket", array("/admin/order/claimed", "id"=>$data->id), array("class"=>"btn btn-danger"))."<br>") : "").
			(($data->status == 0 || $data->status == 2) ? (CHtml::link("Change to Cancel", array("/admin/order/cancel", "id"=>$data->id), array("class"=>"btn btn-warning"))."<br>") : "").
			TicketOrderHistory::getStatus($data->id).
			""
			',
		),
		// 'login_terakhir',
		// 'tanggal_input',
		// array(
		// 	'name'=>'aktif',
		// 	'filter'=>array(
		// 		'0'=>'No',
		// 		'1'=>'Yes',
		// 	),
		// 	'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		// ),

		// array(
		// 	'class'=>'bootstrap.widgets.TbButtonColumn',
		// 	'template'=>'{update}',
		// 	'header'=>'Action',
		// ),
	),
)); ?>
</div>
<style type="text/css">
tr.pending-style{
	background-color: transparent;
}
tr.complete-style{
	background-color: #BDFFC0;
}
tr.claimed-style{
	background-color: #3CFF2D;
}
tr.cancel-style{
	background-color: #FFF77B;
}
tr.konfirmasi-style{
	background-color: #FF3A3A;
}
tr.paid-style{
	background-color: #C4C5FF;
}
a.btn{
	color: #fff;
}
</style>