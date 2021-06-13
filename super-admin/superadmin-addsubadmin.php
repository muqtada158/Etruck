<?php
include('superadmin-headertemplate.php');
?>
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
<?php if(isset($_GET['action']) && $_GET['action'] == "failed")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Something Went Wrong!</center>
</div> 
<?php }?>
<?php if(isset($_GET['action']) && $_GET['action'] == "emailalreadyexist")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Email already exist try new one!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Add Sub-Admin</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Sub-Admin Form</strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Role</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="sub_role" id="select" class="form-control" required>
                                                        <option hidden selected>Please select</option>
                                                        <option value="Truck-Sub-Admin">Truck Company Sub-Admin</option>
                                                        <option value="Petrol-Sub-Admin">Petrol Station Sub-Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Username</label>
                                            <input type="text" id="company" placeholder="Enter sub-admin username" class="form-control" name="sub_username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="Email" id="company" placeholder="Enter sub-admin email" class="form-control" name="sub_email" required>
                                        </div> 
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Password</label>
                                            <input type="Password" id="company" placeholder="Enter sub-admin password" class="form-control" name="sub_password" required>
                                        </div>                                        
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_addsubadmin">
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
                    </div>
                </div>
<!-- END MAIN CONTENT-->
<?php include('superadmin-footertemplate.php'); ?>