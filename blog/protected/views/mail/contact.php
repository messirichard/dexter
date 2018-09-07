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
		<td>First Name</td>
		<td>:</td>
		<td><?php echo $model->first_name; ?></td>
	</tr>
	<tr>
		<td>Lats Name</td>
		<td>:</td>
		<td><?php echo $model->last_name; ?></td>
	</tr>
	
	<tr>
		<td>Phone Number</td>
		<td>:</td>
		<td><?php echo $model->phone; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $model->email; ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $model->address; ?></td>
	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php echo $model->city; ?></td>
	</tr>
	<tr>
		<td>Post Code</td>
		<td>:</td>
		<td><?php echo $model->postcode; ?></td>
	</tr>
	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php echo $model->state; ?></td>
	</tr>
	<tr>
		<td>Comments</td>
		<td>:</td>
		<td><?php echo nl2br($model->body); ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

</font>