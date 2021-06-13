<?php
include('superadmin-headertemplate.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"/>

           <!-- MAIN CONTENT-->
            
                <div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "updated")
{ ?>
<div class="alert alert-warning" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <a href="../super-admin/superadmin-alltruck" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back </a>
                                </div>
                                <div class="overview-wrap">
                                    <h2 class="title-1">Update Truck Company -Petrolstations</h2>
                                </div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    
                                    <div class="card-header"style="text-align: center;">
                                        <strong>Update Petrol Stations for Truck Company</strong>
                                    </div>
                                   
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Stations</label><br>
                                            <select  for="company" class="selectpicker form-control" multiple="multiple" name="petrolstations[]" required>
                                              <?php 
                                              foreach ($result_tcps as $key) { ?>
                                              <option value="<?php  echo $key['Id']; ?>"><?php echo $key['P_Name']; echo " | "; echo $key['P_Address']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-warning btn-sm" name="btn_uptruckPS" type="submit">
                                            <i class="fa fa-search"></i> Update
                                        </button>
                                        </div>
                                        
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                     <hr>
                     <h2>Set Petrol Station Fuel Price</h2>
                     <div class="row">

                        <div class="col-md-4">
                                 <div class="card">
                                    <div class="card-header"style="text-align: center;">
                                        <strong>PetrolStations | Address </strong>
                                    </div>
                                    <?php $countt = 1; 
                                    for($i=0; $i <$count; $i++){   
                                    foreach($resultcheck[$i] as $upt ){ ?>
                                    <div class="card-header"style="text-align: center;">
                                    <?php echo $countt.' - ';  echo $upt['P_Name']; ?> &nbsp | &nbsp <?php echo $upt['P_Address']; echo " <h4> Fuel Price = ".$upt['PS_Fuel_Price']."</h4> ";?>
                                    </div>
                                    <?php $countt++;  }} ?>
                                </div>
                            </div>
                     <div class="col-md-8">

                                 <div class="card">
                                    <div class="card-header"style="text-align: center;">
                                        <strong>Update Petrol Stations Fuel Price</strong>
                                    </div>
                                   
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block ">
                                        <div class="form-group col-md-6">
                                            <label for="company" class=" form-control-label">Petrol Station</label><br>
                                            <select name="ps_id" id="select" class="form-control "required style="height: calc(2.25rem + 10px);">
                                            <option value="" hidden>Please Select Petrol Station</option>
                                              <?php 
                                              foreach ($result_truckdetailsforupdate as $rtdu) { ?>
                                              <option value="<?php  echo $rtdu['Id']; ?>"><?php echo $rtdu['P_Name']; echo " | "; echo $rtdu['P_Address']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="company" class=" form-control-label">Fuel Price</label><br>
                                            <input type="text" class=" form-control" name="fuelpricefortruck" placeholder="Enter Fuel Price" />
                                        </div>
                                        <div class="col-md-2" style="padding-top: 25px;">
                                        <button class="btn btn-warning btn-sm" name="btn_upfueltruck" type="submit">
                                            <i class="fa fa-search"></i> Update
                                        </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
            <!-- MAIN CONTENT END-->  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<?php
include('superadmin-footertemplate.php');
?>