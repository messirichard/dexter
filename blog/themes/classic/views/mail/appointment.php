<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff"><div class="adM">
</div><table width="100%" cellspacing="0" cellpadding="0" style="BORDER-BOTTOM:#0a5aaa 2px solid">
<tbody>
<tr valign="bottom" align="left">
<td width="" height="62"><a target="_blank" name="" href="<?php echo $url.CHtml::normalizeUrl(array('/main/index')) ?>"><img src="<?php echo $baseUrl ?>/asset/images/logo-bethesda.png"></a></td>
</tr>
</tbody>
</table>
<font face="tahoma, arial"> 
<h2>Informasi Contact</h2>
<table border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="3">Data Contact</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $model->name ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $model->email ?></td>
	</tr>

	<tr>
		<td>Tanggal yang diharapkan	</td>
		<td>:</td>
		<td><?php echo $model->tanggal1 ?></td>
	</tr>
	<tr>
		<td>Atau tanggal</td>
		<td>:</td>
		<td><?php echo $model->tanggal2 ?></td>
	</tr>

	<tr>
		<td>Jam yang diharapkan</td>
		<td>:</td>
		<td><?php echo $model->jam1 ?></td>
	</tr>
	<tr>
		<td>Hingga jam</td>
		<td>:</td>
		<td><?php echo $model->jam2 ?></td>
	</tr>


	<tr>
		<td>Message</td>
		<td>:</td>
		<td><?php echo htmlspecialchars( strip_tags($model->body) ); ?></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
</font>
<?php
		$settingweb = Setting::model()->getSetting('id');
?>
<table width="100%" height="90" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td bgcolor="#f5f5f5" align="left" colspan="2" style="PADDING-BOTTOM:8px;LINE-HEIGHT:14px;PADDING-LEFT:8px;PADDING-RIGHT:8px;FONT-SIZE:11px;PADDING-TOP:8px">Harap tidak mengirimkan balasan melalui alamat ini, karena kami tidak dapat menanggapi surat yang dikirimkan ke alamat ini.<br>
&nbsp;&nbsp; - Hubungi kami di email ini <a href="mailto:<?php echo $settingweb['email'] ?>"><?php echo $settingweb['email'] ?></a><br />
</td>
</tr>
<tr>
<td align="left" style="FONT-SIZE:11px">Copyright <?php echo Yii::app()->name ?> - 2013. Website design by <a href="http://markdesign.net">Mark Design</a>. </td>
</tr>
</tbody>
</table>
