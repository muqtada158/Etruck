<?php
include('superadmin-headertemplate.php');
?>
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
                                    <h2 class="title-1">Update Truck Company</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="card">
                                    <?php foreach($result_managetrucktrans as $uptruck){ ?>
                                    <div class="card-header" style="text-align: center;">
                                        <strong><?php echo $uptruck['TC_Name']; ?> &nbsp | &nbsp <?php echo $uptruck['TC_Address']; ?></strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Company Address</label>
                                            <input type="text" id="company" class="form-control" name="upcompanyaddress" required value="<?php echo $uptruck['TC_Address']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Name</label>
                                            <input type="text" id="company" class="form-control" name="upcompanyownername" required value="<?php echo $uptruck['TC_Owner_Name']; ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Contact Number</label>
                                            <input type="number" id="company" class="form-control" name="upcompanyownercontact" required value="<?php echo $uptruck['TC_Owner_Contact']; ?>">
                                        </div>                        
                                        <div class="card-footer">
                                        <button class="btn btn-warning btn-sm" name="btn_uptruckcompany">
                                            <i class="fa fa-search"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <?php foreach($result_managetrucktranscred as $uptrucks){ ?>
                                    <div class="card-header"style="text-align: center;">
                                        <strong><?php echo $uptruck['TC_Name']; ?> &nbsp | &nbsp <?php echo $uptruck['TC_Address']; ?></strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="email" id="company" class="form-control" name="upcompanyemail" required value="<?php echo $uptrucks['Email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Password</label>
                                            <input type="text" id="company" class="form-control" name="upcompanypassword" required value="<?php echo $uptrucks['PassWord']; ?>">
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-warning btn-sm" name="btn_uptruckcompanycred">
                                            <i class="fa fa-search"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                     
            <!-- MAIN CONTENT END-->  
<?php
include('superadmin-footertemplate.php');
?>