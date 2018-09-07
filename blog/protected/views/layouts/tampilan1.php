<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//tampilan/main'); ?>
<div class="wfull">
	<div class="container">
		<div class="toppic-cont">
			<img src="<?php echo Yii::app()->baseUrl ?>/images/toppic/top-1.jpg" />
		</div>
		<div class="fcs-shadow"></div>
		<div class="container-dalam">
			<div class="menu-left">
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>$this->menuTitle,
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'menu-left-list'),
				));
				echo '&nbsp';
				$this->endWidget();
			?>
			</div>
			<div class="content-dalam-right">
				<?php echo $content ?>
			</div>
		</div>
		
	</div>	
</div>
<?php $this->endContent(); ?>