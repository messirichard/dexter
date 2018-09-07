<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
	<meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">
    <meta content='1 days' name='revisit-after'/>
    <meta content='Global' name='Distribution'/>
    <meta content='General' name='Rating'/>
    <meta content="<?php echo Yii::app()->name ?>" name='author'/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/comon.css" />

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/js/bootstrap.js"></script>  

    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/asset/images/favicon.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo Yii::app()->request->hostInfo . Yii::app()->request->baseUrl . '/' . Yii::app()->request->pathInfo ?>" />
    <?php if ($this->metaImage != ''): ?>
    <meta property="og:image" content="<?php echo ($this->metaImage); ?>" />
    <?php endif ?>
    <meta property="og:description" content="<?php echo CHtml::encode($this->metaDesc); ?>" />

    <!-- Analitycs -->

    <!-- Facebook App ID -->
    <meta property="fb:app_id" content="519924948074048" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/styles.css" />


</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=519924948074048";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php echo $content ?>
</body>
</html>