<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff">
<font face="tahoma, arial"> 
<table border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="3">Detail Contact</td>
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
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $model->address; ?></td>
	</tr>
	<tr>
		<td>Kode Pos</td>
		<td>:</td>
		<td><?php echo $model->postcode; ?></td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td>:</td>
		<td><?php echo $model->telepon; ?></td>
	</tr>
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