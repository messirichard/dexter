<h6><?php echo Yii::t('main', 'Do you need help?') ?></h6>
<div class="menu-left-line"></div>
<div class="height-10"></div>
<dl class="dl-horizontal">
    <dt><i class="icon-telp"></i></dt>
    <dd><?php echo $this->setting['phone'] ?></dd>
	<dt><i class="icon-fax"></i></dt>
    <dd><?php echo $this->setting['fax'] ?></dd>
    <dt><i class="icon-mail"></i></dt>
    <dd><a href="mailto:<?php echo $this->setting['email'] ?>"><?php echo $this->setting['email'] ?></a></dd>
    <dt><i class="icon-flag"></i></dt>
    <dd><?php echo $this->setting['address1'] ?></dd>
    <dt><i class="icon-pin"></i></dt>
    <dd><a class="fancy-location" href="<?php echo Yii::app()->baseUrl; ?>/asset/images/peta-lokasi.jpg" title="Map Of Our Location"><?php echo $this->setting['location'] ?></a></dd>
</dl>
<script type="text/javascript">
    $(function(){
        $('.fancy-location').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        type        : 'image',
        fitToView   : false,
    });
    });
</script>
