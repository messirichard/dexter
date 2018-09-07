<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/style.default.css" type="text/css" />

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/backend/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>

<body class="loginpage">

<?php echo $content ?>

<div class="loginfooter">
    Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.<br/>
        All Rights Reserved. Developed By <a target="_blank" href="http://markdesign.net/">Markdesign</a>.
</div>
</body>
</html>
