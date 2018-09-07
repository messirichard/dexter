<div class="outer-middle">
	<div class="prelatif container">
			<div class="fcs-wrap region h222 prelatif">
				<div class="ill-page-inside"><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/ill-contact2.jpg" alt="ill Contact cheetam salt"></div>
				<div class="clearfix"></div>
			</div>
			<div class="clear height-15"></div>
			<div class="height-1"></div>
			<div class="region inside-content prelatif">
				<div class="clear height-5"></div>
				<div class="height-2"></div>

				<div class="left left-content-ins margin-right-35">
					<div class="ins">
						<h2 class="title"><?php echo Yii::t('main', 'contact us') ?></h2>
						<div class="clear height-10"></div>
						<div class="lines-blue"></div>
						<div class="clear height-5"></div>

						<div class="menu-inside">
							<ul>
								<li><a href="<?php echo CHtml::normalizeUrl(array('home/contact', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'hubungi kami') ?></a></li>
								<li class="separator"></li>
								<li class="active"><a href="<?php echo CHtml::normalizeUrl(array('home/lokasikami', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'lokasi kami') ?></a></li>
								<li class="separator"></li>
							</ul>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="left right-content">
						<div class="clear height-20"></div>
						<div class="right breadcumb"><a href="<?php echo CHtml::normalizeUrl(array('home/index', 'lang'=>Yii::app()->language)); ?>"><?php echo Yii::t('main', 'home') ?></a> &gt; <b><?php echo Yii::t('main', 'lokasi kami') ?></b></div>
						<div class="clear height-25"></div>
						<div class="content-text">
							
							<div class="lokasi-block">
								<div class="row">
									<?php foreach ($data as $key => $value): ?>
									<div class="col-xs-4">
										<div class="item">
											<div class="title"><?php echo $value->title ?></div>
											<div class="clear height-25"></div>
											<p><?php echo nl2br(trim($value->content)) ?><br>
											<?php if ($value->peta_google != ''): ?>
											<span class="glyphicon glyphicon-search"></span> 
											<a href="<?php echo $value->peta_google ?>" target="_blank">Lihat peta</a>
											<?php endif ?>
											</p>
											<p>Phone&nbsp;&nbsp; &nbsp;: <?php echo $value->phone ?><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $value->phone2 ?><br />
Fax&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; : <?php echo $value->fax ?><br />
E-mail&nbsp;&nbsp; &nbsp;: <a href="mailto:<?php echo $value->email ?>"><?php echo $value->email ?></a></p>
										</div>
									</div>
									<?php if ((($key + 1) % 3) == 0): ?>
									<div class="clear height-20"></div>
									<?php endif ?>
									<?php endforeach ?>

								</div>
							</div>
							
							<div class="clear height-20"></div>
							<div class="clear"></div>
						</div>

					<div class="clearfix"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear height-10"></div>
			<div class="height-2"></div>
			
		<div class="clearfix"></div>
	</div>
	<div class="clear"></div>
</div>