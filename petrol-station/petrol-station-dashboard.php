<?php include('ps-header-template.php'); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "Password-Updated")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Password Updated !</center>
</div> 
<?php }?>
<div class="row">
            <div class="col-sm-6 mb-4 mb-xl-0">
              <div class="d-lg-flex align-items-center">
                <div>
                  <h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
                </div>
                
              </div>
            </div>
          </div>
					<div class="row">
						<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-8">
													<h3 class="font-weight-bold text-dark"><?php echo $Ps_Name; ?></h3>
													<p class="text-dark"><?php echo $Ps_Address; ?></p>
													<div class="d-lg-flex align-items-baseline mb-3">
														
													</div>
												</div>
											</div>
											<div class="row" style="text-align: center;">
												<div class="col-sm-6 mt-4 mt-lg-0">
													<div class="bg-success text-white px-4 py-4 card">
														<div class="row">
															<div class="col-sm-12">
																<h2>$
																	<?php echo $capitalforcash; ?>
																</h2>
																<p class="mb-0">Cash Capital </p>
															</div>
														</div>
													</div>
												</div>
											
												<div class="col-sm-6 mt-4 mt-lg-0">
													<div class="bg-danger text-white px-4 py-4 card">
														<div class="row">
															<div class="col-sm-12 pl-lg-5">
																<h2>
																Ltr <?php echo $capitalforlitre; ?>
																</h2>
																<p class="mb-0">Fuel Capital </p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
<?php include('ps-footer-template.php'); ?>