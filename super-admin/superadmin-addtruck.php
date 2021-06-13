<?php
include('superadmin-headertemplate.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"/>
            <!-- MAIN CONTENT-->
            
                <div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Added successfully!</center>
</div> 
<?php }?>
<?php if(isset($_GET['action']) && $_GET['action'] == "failed-email-already-exist")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Email already Exist Try New One...</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Add Truck Company</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Company Form</strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Company Name</label>
                                            <input type="text" id="company" placeholder="Enter your truck company name" class="form-control" name="companyname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Company Address</label>
                                            <input type="text" id="company" placeholder="Enter your truck company address" class="form-control" name="companyaddress" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner ID</label>
                                            <input type="text" id="company" placeholder="Enter truck company owner ID" class="form-control" name="companyownerid" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Name</label>
                                            <input type="text" id="company" placeholder="Enter truck company owner name" class="form-control" name="companyownername" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Contact Number</label>
                                            <input type="number" id="company" placeholder="Enter truck company owner contact number" class="form-control" name="companyownercontact" required>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Stations</label><br>
                                            <select  for="company" class="selectpicker form-control" multiple="multiple" name="petrolstations[]" required>
                                              <?php foreach ($result_tcps as $key) { ?>
                                              <option value="<?php echo $key['Id']; ?>"><?php echo $key['P_Name']; echo " | "; echo $key['P_Address']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Username</label>
                                            <input type="text" id="company" placeholder="Enter username" class="form-control" name="companyusername" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="Email" id="company" placeholder="Enter Email" class="form-control" name="companyemail" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Password</label>
                                            <input type="password" id="company" placeholder="Enter password" class="form-control" name="companypassword" required>
                                        </div>
                                                                                <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="btn_addtruckcompany">
                                            <i class="fa fa-search"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
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