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
                                <h2 class="title-1"><strong>Update Truck Rate</strong> </h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <?php foreach ($result_uptcprice as $tcufp) {  ?>
                                        <h2 class="title-1">
                                            <?php echo $tcufp['TC_Name']; ?> | <?php echo $tcufp['TC_Address']; ?>
                                        </h2>
                                        <h2 class="title-1">Current Price =
                                            <?php echo $tcufp['TC_Rate']; ?>
                                        </h2>
                                        <?php } ?>
                                    </div>
                                <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Price</label>
                                            <input type="text" id="company" placeholder="" class="form-control" name="trucknewpricetxt" required>
                                        </div>
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_updatetruckrate">
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