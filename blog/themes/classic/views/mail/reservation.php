<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff">
<font face="tahoma, arial"> 
<table border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="3">Detail Reservasi</td>
	</tr>
	<tr>
		<td>First Name</td>
		<td>:</td>
		<td><?php echo $model['first_name']; ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>:</td>
		<td><?php echo $model['last_name']; ?></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td>:</td>
		<td><?php echo $model['email']; ?></td>
	</tr>
	<tr>
		<td>Office Number</td>
		<td>:</td>
		<td><?php echo $model['office_number']; ?></td>
	</tr>
	<tr>
		<td>Mobile Number</td>
		<td>:</td>
		<td><?php echo $model['mobile_number']; ?></td>
	</tr>
	<tr>
		<td>Preferred Day</td>
		<td>:</td>
		<td><?php echo implode(', ', $model['preferred_day']); ?></td>
	</tr>
	<tr>
		<td>Preferred Time</td>
		<td>:</td>
		<td><?php echo implode(', ', $model['preferred_time']); ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $model['address']; ?></td>
	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php echo $model['city']; ?></td>
	</tr>
	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php echo $model['state']; ?></td>
	</tr>
	<tr>
		<td>Message</td>
		<td>:</td>
		<td><?php echo $model['body']; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	
</table>

</font>