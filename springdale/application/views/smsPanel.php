<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<div class="panel-tools">										
											<div class="dropdown">
											<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
												<i class="fa fa-cog"></i>
											</a>
											<ul class="dropdown-menu dropdown-light pull-right" role="menu">
												<li>
													<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
												</li>
												<li>
													<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
												</li>
												<li>
													<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
												</li>										
											</ul>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<div>   <p class="alert alert-danger"> Available SMS Balance = <?php echo $cbs;?></p>
										 <p class="alert alert-info"> NOte : This is the area you can Select Fields send message Option. If you want to Send Please click given buttons. <br>
										</div>
										<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/smssetting">
												<button class="btn btn btn-green  btn-block">
												
													SMS Setting  
												</button>
												</a>
											</div>
										<div class="col-sm-4"><a href="#">
												<button class="btn btn-blue  btn-block">
													
													Send Fee Reminder SMS
												</button>
												</a>
											</div>
										<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Announcement">
												<button class="btn  btn-purple btn-block">
												
													Send All Employee SMS
												</button>
												</a>
											</div>
											<br></br>
											<br></br>
										<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Greeting">
												<button class="btn btn-red btn-block">
													
													Send All Parent and Employee SMS 
												</button>
											</div>
										<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Parent%20Message">
												<button class="btn btn-yellow btn-block">
													
													Send All Parent SMS  
												</button>
												</a>
											</div>
										<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Notice">
												<button class="btn btn-orange btn-block">
													
													Send Individual Notice 
												</button>
												</a>
											</div>
											
											<br></br>
											<br></br>
									<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Greeting">
												<button class="btn btn-light-grey btn-block">
													
													Send to All 
												</button>
												</a>
											</div>	
									<div class="col-sm-4"><a href="<?php echo base_url(); ?>index.php/login/mobileNotice/classwise">
												<button class="btn btn-light-red btn-block">
													
													Send Class Wise SMS 
												</button>
												</a>
											</div>	
											<div class="col-sm-4">
												<button class="btn btn-azure btn-block">
													
													Schedule SMS 
												</button>
											</div>												
										
										
								</div>
								<!-- end: INLINE TABS PANEL -->
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
