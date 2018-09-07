<div class="outer-content">
			<div class="clear"></div>
			<div class="outer-inside-content">
				<div class="prelatif container">
						<div class="clear height-50"></div>
						<div class="clear visible-lg height-45"></div>
						<div class="top">
							<div class="left title-topsitel"><b>Life Group</b> at New Life Church</div>
							<div class="right breadcumb text-raleway margin-right-25">
								<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a>  &gt;  <a href="<?php echo CHtml::normalizeUrl(array('lifegroup/index')); ?>">Life Group</a> &gt; <?php echo $detail->title ?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="height-2"></div>
						<div class="lines-black"></div>
						<div class="clear height-35"></div>
						
						<div class="inside content-text">
							<div class="row">
								<div class="col-md-3">
									<div class="left-content">
										<div class="left b-previousdblog">
											<a href="<?php echo CHtml::normalizeUrl(array('lifegroup/index')); ?>" class="bt previous-blog" style="width: 80px;">&lt; Back</a>
										</div>
										<div class="clear height-20"></div>
											<h6 class="title-newsst">IN THIS GROUP</h6>
											<div class="clear height-5"></div>
											<div class="list-sect-blogs">
												<ul>
													<li><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detail', 'id'=> $_GET['id'], 'slug'=>Slug::create($detail->title) ) ); ?>">OVERVIEW</a></li>
													<li <?php echo ($this->action->id == 'detailinstagram')? 'class="active"': ''; ?>><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detailinstagram', 'id'=> $_GET['id'], 'slug'=>Slug::create($detail->title) )); ?>">INSTAGRAM</a></li>
												</ul>
												<div class="clear"></div>
											</div>

											<div class="clear height-35"></div>
											<h6 class="title-newsst">LIFE GROUPS</h6>
											<div class="clear height-5"></div>
											<div class="list-sect-blogs">
												<ul>
													<?php foreach ($data as $key => $dta_All): ?>
													<li <?php echo ($dta_All->id == $_GET['id'])? 'class="active"': ''; ?> ><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detail', 'id'=> $dta_All->id, 'slug'=>Slug::create($dta_All->title) )); ?>"><?php echo $dta_All->title ?></a></li>
													<?php endforeach ?>
												</ul>
												<div class="clear"></div>
											</div>



										<div class="clear"></div>
									</div>
								</div>
								<div class="col-md-9">
									<div class="right-content right w755">
											
											<div class="data-news-blog">
													<div class="item no-border">
														<div class="top">
															<h1 class="titlt"><?php echo $detail->title ?> INSTAGRAM</h1>
															<div class="clear height-15"></div>
														</div>
														<div class="clear height-15"></div>
														<div class="center">
															<?php if ($detail->instagram != ''): ?>
															<div id="data-instagram" class="list-instagram-lifegroup">
																
																<div class="clearfix"></div>
															</div>
															<?php else: ?>
															<p class="text-left">There are no content at the moment</p>
															<?php endif ?>
															

															<div class="clear height-25"></div>
														</div>

														<div id="instafeed" class="hidden"></div>
														<div class="clear"></div>
													</div>

												<div class="clear"></div>
											</div>

											<!-- <div class="clear height-40"></div> -->
											<div class="clear height-15"></div>
											
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear height-50"></div>
							<div class="clear height-15"></div>

							<div class="clear"></div>
						</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

	<div class="clear"></div>
</div>
<!-- Instafeed -->
<?php if ($detail->instagram != ''): ?>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/asset/js/instafeed.min.js"></script>
<script type="text/javascript">
    var feed = new Instafeed({
        get: 'tagged',
        tagName: '<?php echo $detail->instagram ?>',
        clientId: '3c03a0fd2a354ad59621aea34ceeb3be',
        // resolution : 'thumbnail',
        template: '<div class="item"><a href="{{link}}"><img class="img-responsive" src="{{image}}" /></a><br>  <div class="instagram_image_meta"><div class="likes instagram_image_meta_item"> <p><a class="icon-heart" href="{{link}}" target="_blank" title="{{caption}}" ><i class="icon-instalikes"></i> {{likes}}</a></p></div>          <div class="comments instagram_image_meta_item"> <p><a class="icon-bubble" href="{{link}}" target="_blank" title="{{caption}}" ><i class="icon-instacomment"></i> {{comments}}</a></p> </div> </div> </div>',
        after: function(){
             // $("#instafeed").owlCarousel();
             var isidataGal =  $('#instafeed').html();
             $("#data-instagram").html(isidataGal);
            },
    });

    feed.run();
</script>
<style type="text/css">
	#data-instagram{
		/*width: 100%;*/
		margin-right: -15px;
	}
	#data-instagram > .item{
		width: 143px;
		float: left;
		margin-bottom: 18px;
		margin-right: 9px;
		background-color: #FFF;
	}
	.list-instagram-lifegroup div .instagram_image_meta, 
	.wrap-owlgallery .owl-carousel div .instagram_image_meta, 
	#instafeed .instagram_image_meta{
		margin-top: -10px;
		vertical-align: middle;
		line-height: 29px;
		display: block;
	}
	.list-instagram-lifegroup div .instagram_image_meta .instagram_image_meta_item, 
	.wrap-owlgallery .owl-carousel div .instagram_image_meta .instagram_image_meta_item, 
	#instafeed .instagram_image_meta .instagram_image_meta_item{
		width: 30%;
		padding-bottom: 6px;
	}
</style>
<?php endif ?>