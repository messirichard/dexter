<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="panel 3 dimensi, cutting panel CNC,  cutting CNC pada aluminium composite panel, cutting CNC pada MDF, cutting CNC pada triplex, cutting CNC pada gypsum, cutting CNC pada akrilik">
	<meta name="description" content="Dexter CNC Cutting & Custom Sign Works menghadirkan layanan jasa pemotongan computerized (CNC) yang sangat presisi dan memiliki keunggulan dari pemotongan laser dalam hal biaya dan fleksibilitas bahan yang dapat digunakan. Dalam aplikasinya, Dexter melayani aneka pengolahan bahan dasar partisi / penyekat ruangan modern, grill panel dinding, pelapis bangunan aluminium composite panel, letter dan logo 3 dimensi (sign works), hingga cutting sticker.x">

    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/css/font-awesome-4.2.0/css/font-awesome.min.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-3/js/bootstrap.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
    <?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
        'target'=>'',
        'config'=>array(),
        )
    ); ?>

    <?php echo $this->setting['google_tools_webmaster']; ?>
    <?php echo $this->setting['google_tools_analytic']; ?>
    <?php if ($this->setting['purechat_status'] == '1'): ?>
    <?php echo $this->setting['purechat_code'] ?>
    <?php endif ?>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../images/styles.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../images/media.styles.css" type="text/css" media="screen" />

    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/cufon.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/font/myriadpro_400-myriadpro_600-myriadpro_italic_400-myriadpro_italic_600.font.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/font/neosans_400-neosans_700-neosans_italic_400-neosans_italic_700.font.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        Cufon.replace('.myriadpro, .text-cont-inside ul li', {
            fontFamily: 'myriadpro',
            hover: true,
            trim: 'simple',
        });
        Cufon.replace('.myriadproad', {
            fontFamily: 'myriadpro',
            hover: true,
            trim: 'advanced',
        });
        Cufon.replace('.myriadproad_footer', {
            fontFamily: 'myriadpro',
            hover: true,
            trim: 'advanced',
            textShadow: '#FFF 1px 1px',
        });
        Cufon.replace('.neosans', {
            fontFamily: 'neosans',
            hover: true,
            trim: 'simple',
        });
    </script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/fancy/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/fancy/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/../js/fancy/jquery.fancybox.css" media="screen" />
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-45731129-11', 'dextercut.com');
      ga('send', 'pageview');
    </script>
</head>
    <?php echo $content ?>
</html>