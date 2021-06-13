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
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                <!-- <h2 class="title-1"><strong>Update Fuel Price (Buying)</strong> </h2> -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        Update Email
                                    </div>
                                <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <?php foreach($result_callsadmindata as $superdata){  ?>
                                            <label for="company" class=" form-control-label">Email</label>
                                            <input type="text" id="company" placeholder="Email" class="form-control" value="<?php echo $superdata['Email']; ?>" name="txt_email" required>
                                            <?php } ?>
                                        </div>
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_updatesuperdata">
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