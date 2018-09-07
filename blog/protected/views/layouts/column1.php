<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
    $session = new CHttpSession;
    $session->open();
    $login_member = $session['login_member'];
?>
<body>
<div class="main-wrapper">
    <?php echo $this->renderPartial('//layouts/_header', array()); ?>
    <div class="header-content">
        <div class="tengah w954">
            <div class="hd-pos">
                <div class="hdr-content">
                    <div class="img-hd"><img src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../images/pattern-header-in.jpg" class="img-responsive" />
                    <div class="jdul neosans">
                        <div class="text-jdul">
                        Blog
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- div header content -->
    </div>
    <div>
        <div class="tengah w954" style="padding-top: 22px; padding-bottom:40px;">
            <?php echo $content ?>
        </div>
    </div>
</div>
    <?php echo $this->renderPartial('//layouts/_footer', array()); ?>
</body>

<?php $this->endContent(); ?>