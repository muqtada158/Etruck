<?php include('sub-tc-header-template.php'); 

?>
<div>
	<?php
if(isset($_GET['action']) && $_GET['action'] == "Password-Updated")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Paswword Updated !</center>
</div> 
<?php }?>
                  <h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
                </div>
					<div class="row">
						<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-8">
													<?php foreach($result_truckcompanydetails as $key) { ?>												
													<h3 class="font-weight-bold text-dark"><?php echo $key['TC_Name']; echo " | "; echo  $_SESSION['username'];?></h3>
													<p class="text-dark"><?php echo $key['TC_Address']; ?></p>
													<?php } ?>
													<div class="d-lg-flex align-items-baseline mb-3">
														
													</div>
												</div>
											</div>
											<div class="row" style="text-align: center;">
												<div class="col-sm-12 mt-6 mt-lg-0">
													<div class="bg-success text-white px-4 py-4 card">
														<div class="row">
															<div class="col-sm-12 pl-lg-5">
																<h2>$<?php echo $TC_Capital; ?>
																</h2>
																<p class="mb-0">Cash Capital</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						<div class="col-sm-12 flex-column d-flex stretch-card">
							<div>
			                  <h3 class="text-dark font-weight-bold mb-2">Your Petrol Stations!</h3>
			                </div>
							<div class="row">
								<?php foreach($result_truckdetails as $key1) { ?>	
								<div class="col-lg-2 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											
											<h2 class="text-dark mb-2 font-weight-bold"><?php 
												echo $key1['P_Name'];
												 ?>
											</h2>
											<h4 class="card-title mb-2"><?php 
												echo $key1['P_Address']; ?></h4>

										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					
					
							</div>	
















<?php include('sub-tc-footer-template.php'); ?>