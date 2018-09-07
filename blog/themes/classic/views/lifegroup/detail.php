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
													<li class="active"><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detail', 'id'=> $_GET['id'], 'slug'=>Slug::create($detail->title) ) ); ?>">OVERVIEW</a></li>
													<li><a href="<?php echo CHtml::normalizeUrl(array('lifegroup/detailinstagram', 'id'=> $_GET['id'], 'slug'=>Slug::create($detail->title) )); ?>">INSTAGRAM</a></li>
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
															<h1 class="titlt"><?php echo $detail->title ?></h1>
															<div class="clear height-15"></div>
														</div>
														<div class="clear height-15"></div>
														<div class="center">
															<div class="pic"><img class="img-responsive" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(752,446, '/images/life/'.$detail->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="<?php echo Slug::create($detail->title); ?>" title="<?php echo Slug::create($detail->title); ?>" ></div>
																<div class="clear height-35"></div>
															<div class="desc">
																<?php echo $detail->content; ?>

																<div class="clear"></div>
															</div>
															<div class="clear height-25"></div>
														</div>

													</div>

												<div class="clear"></div>
											</div>

											<!-- <div class="clear height-40"></div> -->
											<div class="clear height-15"></div>
											
											<!-- <div class="b-othersblog-data">
												<div class="top">
													<div class="dtitle">Other Blogs</div>
												<div class="clear height-10"></div>
												</div>
												<div class="clear"></div>
												<div class="middle">
														<div class="clear height-20"></div>
														<div class="list">
															<div class="row">
																<div class="col-md-6">
																	<div class="item">
																		<div class="pic margin-right-10 left">
																			<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-news-pic2.jpg" alt="">
																		</div>
																		<div class="left text w265">
																			<p>&quot;Breathtaking&quot;: The White House Releases Its Climate Heavy Hitter on the Polar Vortex</p>
																			<div class="clear height-2"></div>
																			<span class="date">January 15, 2014</span>
																			<div class="clear height-2"></div>
																			<span class="ps">Ps. Irwan Alexander</span>
																		</div>
																		<div class="clear"></div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="item">
																		<div class="pic margin-right-10 left">
																			<img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/thumb-news-pic2.jpg" alt="">
																		</div>
																		<div class="left text w265">
																			<p>&quot;Breathtaking&quot;: The White House Releases Its Climate Heavy Hitter on the Polar Vortex</p>
																			<div class="clear height-2"></div>
																			<span class="date">January 15, 2014</span>
																			<div class="clear height-2"></div>
																			<span class="ps">Ps. Irwan Alexander</span>
																		</div>
																		<div class="clear"></div>
																	</div>
																</div>
															</div>
															<div class="clear"></div>
														</div>
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div> -->
											

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