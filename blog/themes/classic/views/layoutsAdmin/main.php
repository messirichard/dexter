<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/styles.css" type="text/css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/responsive-tables.css">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-migrate-1.1.1.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-ui-1.10.3.min.js"></script>
    <?php /*
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.ui/jquery-ui-1.10.4.custom.min.js"></script>
    */ ?>
    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/modernizr.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.uniform.min.js"></script>
    <?php /*
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/flot/jquery.flot.resize.min.js"></script>
    */ ?>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/responsive-tables.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/my.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php // echo Yii::app()->baseUrl; ?>/asset/backend/js/excanvas.min.js"></script><![endif]-->


</head>
<body>
<div id="mainwrapper" class="mainwrapper">
    <!-- // start header -->
    <div class="header">
        <div class="logo">
            <a href="<?php echo CHtml::normalizeUrl(array('/admin/site/index')); ?>">
                <?php /* <img src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/images/logo-markdesign-inside.png" alt="Cms Markdesign" /> */ ?>
            </a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li >
                    <a class="dropdown-toggle" href="#">
                        <span class="head-icon fa fa-life-ring"></span>
                        <span class="headmenu-label"><?php echo Tt::t('admin', 'Produk') ?></span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="<?php echo CHtml::normalizeUrl(array('/admin/pages/index')); ?>">
                    <span class="head-icon fa fa-folder-open"></span>
                    <span class="headmenu-label"><?php echo Tt::t('admin', 'Pages') ?></span>
                    </a>
                </li>
                <li >
                    <a class="dropdown-toggle" data-target="#">
                        <span class="count">10</span>
                        <span class="head-icon fa fa-reorder"></span>
                        <span class="headmenu-label"><?php echo Tt::t('admin', 'New Orders') ?></span>
                    </a>
                </li>
                <li >
                    <a class="dropdown-toggle" data-target="#">
                    <span class="head-icon fa fa-group"></span>
                    <span class="headmenu-label"><?php echo Tt::t('admin', 'New Customers') ?></span>
                    </a>
                </li>
                <li >
                    <a class="dropdown-toggle" data-target="#">
                        <span class="head-icon fa fa-info-circle"></span>
                        <span class="headmenu-label"><?php echo Tt::t('admin', 'Payment Confirmation') ?></span>
                    </a>
                </li>

                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/images/photos/thumb1.png" alt="" />
                        <div class="userinfo">
                            <h5><?php echo Yii::app()->user->name ?> <small>- <?php echo Yii::app()->user->name ?></small></h5>
                            <ul>
                                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/user/index')); ?>"><?php echo Tt::t('admin', 'Edit Profile') ?></a></li>
                                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/user/index')); ?>"><?php echo Tt::t('admin', 'Change Password') ?></a></li>
                                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/home/logout')); ?>"><?php echo Tt::t('admin', 'Sign Out') ?></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!-- headmenu -->
        </div>
    </div>
    <!-- // end header -->
    
    <div class="leftpanel">
        <?php echo $this->renderPartial('//layoutsAdmin/left_menu'); ?>
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <?php echo $content ?>
        
    </div><!--rightpanel-->
    
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
        var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
        var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
            
        function showTooltip(x, y, contents) {
            jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 5
            }).appendTo("body").fadeIn(200);
        }    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
</body>
</html>
