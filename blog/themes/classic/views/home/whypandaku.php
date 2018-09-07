<?php
$this->breadcrumbs = array(
    'Why Galeri Fitness',
);
?>
<div class="height-30"></div>
<div class="breadcrump-container">
    <div class="pull-left">
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Home',array('/home/index')),
        )); ?>
    <?php endif?>
    </div>
</div>
<div class="clear"></div>
<div class="height-10"></div>
<div class="product-list-warp">
    <div class="padding-20">
		<h1>Why Galeri Fitness</h1>
		<?php echo $this->setting['about_overview'] ?>
    </div>
</div>
