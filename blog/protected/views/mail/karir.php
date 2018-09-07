<?php /*
<h2>Pemesanan Kamar</h2>

<p>Data Pemesan</p>
<p>
	<b>Name:</b> <?php echo $model->name ?><br/>
	<b>Address:</b> <?php echo $model->address ?><br/>
	<b>Telp:</b> <?php echo $model->telp ?><br/>
	<b>Email:</b> <?php echo $model->email ?><br/>
	<b>Credit Card:</b> <?php echo $model->credit_card ?><br/>
</p>
Deskripsi Pemesanan
<p>
	<b>Check In:</b> <?php echo $model2->date_add ?><br/>
	<b>Check Out:</b> <?php echo $model2->date_end ?><br/>
	<b>Adults:</b> <?php echo $model2->adults ?><br/>
	<b>Children:</b> <?php echo $model2->children ?><br/>
	<b>Room:</b> <?php echo $model2->room ?><br/>
	<b>Package:</b> <?php echo $model2->pack->name ?><br/>
</p>
*/ ?>
<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff">
<font face="tahoma, arial"> 
<table border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="3">Detail Career</td>
	</tr>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php echo $model->name; ?></td>
	</tr>
	
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $model->email; ?></td>
	</tr>
	<!-- <tr>
		<td>Subject</td>
		<td>:</td>
		<td><?php //echo $model->subject; ?></td>
	</tr> -->
	<tr>
		<td>Telephone</td>
		<td>:</td>
		<td><?php echo $model->telp; ?></td>
	</tr>
	<!-- <tr>
		<td>Address</td>
		<td>:</td>
		<td><?php //echo $model->address; ?>
		</td>
	</tr> -->
	<tr>
		<td>Message</td>
		<td>:</td>
		<td><?php echo $model->body; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	
</table>

</font>