<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<!-- <section id="content"> -->
    <!-- <div class="container"> -->
		<?php echo $content ?>
        <?php echo $this->renderPartial('//layouts/_footer', array()); ?>
    <!-- </div> -->
<!-- </section> -->
<?php $this->endContent(); ?>