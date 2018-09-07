<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff"><div class="adM">
</div><table width="750" cellspacing="0" cellpadding="0" style="BORDER-BOTTOM:#0a5aaa 2px solid">
<tbody>
<tr valign="bottom" align="left">
<td width="" height="62"><a target="_blank" name="" href="<?php echo $url.CHtml::normalizeUrl(array('/main/index')) ?>"><img src="<?php echo $baseUrl ?>/asset/images/logo-gallery-fitness-header.png"></a></td>
</tr>
</tbody>
</table>
<font face="tahoma, arial"> 
<h2>Hallo <?php echo $model->email ?></h2>

<p>Selamat bergabung dengan Galeri Fitness</p>
<p>Silahkan login <a href="<?php echo $url.CHtml::normalizeUrl(array('/')); ?>">di sini</a> dengan menggunakan password di bawah</p>
<p>Password: <?php echo $pass ?></p>
<p>&nbsp;</p>
<p>Salam,</p>
<p>&nbsp;</p>
<p>Galeri Fitness</p>
<table width="750" height="90" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td bgcolor="#f5f5f5" align="left" colspan="2" style="PADDING-BOTTOM:8px;LINE-HEIGHT:14px;PADDING-LEFT:8px;PADDING-RIGHT:8px;FONT-SIZE:11px;PADDING-TOP:8px">Harap tidak mengirimkan balasan melalui alamat ini, karena kami tidak dapat menanggapi surat yang dikirimkan ke alamat ini.<br>
</td>
</tr>
<tr>
<td align="left" style="FONT-SIZE:11px">Copyright GaleriFitness.com - 2013. </td>
</tr>
</tbody>
</table>
