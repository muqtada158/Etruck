<?php
include('subadmin-headertemplate.php');
?>
    
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
                                    <h2 class="title-1">Add Petrol Station</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Petrol Station Form</strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Station Name</label>
                                            <input type="text" id="company" placeholder="Enter your petrol station name" class="form-control" name="station_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Station Address</label>
                                            <input type="text" id="company" placeholder="Enter your petrol station address" class="form-control" name="station_address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner ID</label>
                                            <input type="text" id="company" placeholder="Enter petrol station owner ID" class="form-control" name="station_ownerid" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Name</label>
                                            <input type="text" id="company" placeholder="Enter petrol station owner name" class="form-control" name="station_ownername" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Contact Number</label>
                                            <input type="number" id="company" placeholder="Enter petrol station owner contact number" class="form-control" name="station_ownercontact" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Username</label>
                                            <input type="text" id="company" placeholder="Enter username" class="form-control" name="station_ownerusername" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="email" id="company" placeholder="Enter email" class="form-control" name="station_owneremail" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Password</label>
                                            <input type="password" id="company" placeholder="Enter password" class="form-control" name="station_ownerpass" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Fuel Rate (Buying)</label>
                                            <input type="text" id="company" placeholder="Enter buying fuel rate" class="form-control" name="station_fuelrate" required>
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="btn_addstation">
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


<?php
include('subadmin-footertemplate.php');
?>