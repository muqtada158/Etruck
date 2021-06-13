<?php
include('superadmin-headertemplate.php');
?>
    
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
                                    <a href="../super-admin/superadmin-allpetrolstation" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back </a>
                                </div>
                                <div class="overview-wrap">
                                    <h2 class="title-1">Update Petrol Station</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="card">
                                    <?php foreach($result_updateps as $upstation){ ?>    
                                    <div class="card-header" style="text-align: center;">
                                        <strong><?php echo $upstation['P_Name']; ?> | <?php echo $upstation['P_Address']; ?></strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Station Address</label>
                                            <input type="text" id="company" class="form-control" name="upstation_address" required value="<?php echo $upstation['P_Address']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Name</label>
                                            <input type="text" id="company" class="form-control" name="upstation_ownername" required value="<?php echo $upstation['Owner_Name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Owner Contact Number</label>
                                            <input type="number" id="company" class="form-control" name="upstation_ownercontact" required value="<?php echo $upstation['Owner_Contact']; ?>">
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="btn_upstation">
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
                            <div class="col-md-6">
                                 <div class="card">
                                     
                                    <div class="card-header" style="text-align: center;">
                                        <strong><?php echo $upstation['P_Name']; ?> | <?php echo $upstation['P_Address']; ?></strong>
                                    </div>

                                    <?php  } foreach($result_update1 as $upstation){ ?>   
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Username</label>
                                            <input type="text" id="company" class="form-control" name="upstation_ownerusernamecred" required value="<?php echo $upstation['UserName']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Password</label>
                                            <input type="text" id="company" class="form-control" name="upstaion_ownerpasscred" required value="<?php echo $upstation['PassWord']; ?>">
                                        </div>
                                        <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="btn_upstationcred">
                                            <i class="fa fa-search"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                        </div>
                                        
                                    </div>
                                <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
    <!-- MAIN CONTENT END-->  


<?php
include('superadmin-footertemplate.php');
?>