<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layoutsAdmin/main'); ?>

        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('<i class="fa fa-home"></i>',array('/admin/site/index')),
            'separator'=>' ',
            'htmlOptions'=>array(
                'class'=>'breadcrumbs',
            )
        )); ?><!-- breadcrumbs -->
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="<?php echo $this->pageHeader['icon'] ?>"></span></div>
            <div class="pagetitle">
                <h5><?php echo $this->pageHeader['title'] ?></h5>
                <h1><?php echo $this->pageHeader['subtitle'] ?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner inside">
                    <?php echo $content; ?>
            </div><!--maincontentinner-->
        </div><!--maincontent-->

<?php $this->endContent(); ?>