<div class="outer-content">
			
			<div class="clear"></div>
			<div class="outer-inside-content">
				<div class="prelatif container">
						<div class="clear height-50"></div>
						<div class="clear visible-lg height-45"></div>
						<div class="top">
							<div class="left title-topsitel"><b><?php echo $this->dataHealing[$_GET['id']] ?></b></div>
							<div class="right breadcumb text-raleway margin-right-25">
								<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a>  &gt; <a href="<?php echo CHtml::normalizeUrl(array('healing/index')); ?>"><?php echo $this->dataHealing[$_GET['id']] ?></a> &gt; <b>Healing Moment Service</b>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear height-10"></div>
						<div class="height-2"></div>
						<div class="lines-black"></div>
						<div class="clear height-35"></div>
						
						<div class="inside content-text">
							<p class="center">This page is under construction, Please check back later.</p>
							<div class="row">
								<div class="col-md-4">
									
									<!-- <div class="left-ct-calendar w250">
										<div class="left-section-momenthealing">
											<div class="title-mhealing">HEALING MOMENT SECTIONS</div>
											<div class="clear height-10"></div>
											<div class="lines-grey"></div>	
											<div class="clear height-10"></div>
											<div class="height-2"></div>
											<ul class="list-left-healingmoment">
												<?php foreach ($this->dataHealing as $key => $value): ?>
												<li><a href="<?php echo CHtml::normalizeUrl(array('/healing/detail', 'id'=>$key, 'slug'=>Slug::create($value))); ?>"><?php echo $value ?></a></li>
												<?php endforeach ?>
											</ul>										

											<div class="clear"></div>
										</div>

										<div class="clear"></div>
									</div> -->

								</div>
								<div class="col-md-8">

									<div class="box-data-detail-healing-moment">
										<?php /*
										<div class="list-item-detail-hl-moment">
											<?php foreach ($data as $key => $value): ?>
												
												<div class="item <?php echo (($key+1) == count($data) )? 'last': ''; ?>">
													<div class="left w153">
														<div class="back-calnd-heal">
															<div class="text"><span class="day"><?php echo date('d', strtotime($value->date_input)) ?></span> <br>
																<?php echo date('M', strtotime($value->date_input)) ?> <br>
																<?php echo date('Y', strtotime($value->date_input)) ?></div>
														</div>
													</div>
													<div class="left w543">
														<div class="clear height-20"></div>
														<div class="title"><?php echo $value->title ?></div>
														<div class="clear height-20"></div>
														<div class="desc">
															<?php echo $value->content ?>
														</div>
														<div class="clear height-25"></div>
													</div>
													<div class="clear"></div>
												</div>
											<?php endforeach ?>
										</div>
										*/ ?>

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