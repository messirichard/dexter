<div class="back-header-resp">
    	<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">
		      	<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-dv-computers.png" alt="logo dv computers">
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">HOME</a></li>
				<li class="dropdown">
		          <a href="<?php echo CHtml::normalizeUrl(array('product/index')); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">e-STORE <span class="caret"></span></a>
		          <?php 
		          	$dataCatHeader = ViewCategory::model()->findAll('parent_id = 0 AND type = "category" AND language_id = :language_id ORDER BY SORT ASC', array(':language_id'=>$this->languageID));
		          ?>
		          <ul class="dropdown-menu" role="menu">

		           <?php foreach ($dataCatHeader as $key => $value): ?>
                    <li <?php if ($_GET['category'] == $value->id): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><?php echo $value->name ?></a></li>
                    <?php endforeach ?>

		          </ul>
		        </li>
				<li><a href="<?php echo CHtml::normalizeUrl(array('home/service')); ?>">SERVICES</a></li>
				<li><a href="<?php echo CHtml::normalizeUrl(array('home/howto')); ?>">HOW TO ORDER</a></li>
				<li><a href="<?php echo CHtml::normalizeUrl(array('home/about')); ?>">ABOUT US</a></li>
				<li><a href="<?php echo CHtml::normalizeUrl(array('home/contact')); ?>">CONTACT US</a></li>
		      </ul>

		      <div class="clear"></div>
		    </div><!-- /.navbar-collapse -->
		    <div class="clear"></div>
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="clear"></div>
		<div class="pad-bot-navbar"></div>
    </div>