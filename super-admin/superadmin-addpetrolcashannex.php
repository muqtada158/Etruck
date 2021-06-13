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
<?php if(isset($_GET['action']) && $_GET['action'] == "failed-file-extension-error")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> File Extension Not Valid!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Add Cash Annex</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong><?php foreach ($result_pstransacioninlitre as $tpstinlitre) { ?> 
                                                <h3> <?php echo $tpstinlitre['P_Name'] .' | '.$tpstinlitre['P_Address']; ?></h3>
                                            <?php } $idofps = $getid; ?></strong>
                                    </div>
                                    <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Date</label>
                                            <input type="Date" id="company" placeholder="Enter the Transaction Date" class="form-control" name="addannexcashdate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Amount</label>
                                            <input type="number" id="company" placeholder="Enter the Amount" class="form-control" name="addannexcashamount" required>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Annex</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="addannexcashannex" class="form-control-file" required>
                                                </div>
                                            </div>                                        
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_annexcash">
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