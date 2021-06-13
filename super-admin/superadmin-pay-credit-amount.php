<?php
include('superadmin-headertemplate.php');
?>
<!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "successfully-paid")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
<?php if(isset($_GET['action']) && $_GET['action'] == "failed")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> U cant pay more than credit amount</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <a href="../super-admin/superadmin-truck-approved-request" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back </a>
                                </div>
                                <div class="overview-wrap">
                                <h2 class="title-1"><strong>Pay Credit Amount</strong> </h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <?php foreach ($result_paycredit as $rpc) {  ?>
                                        <h2 class="title-1">
                                            <?php echo $rpc['TC_Name']; ?> | <?php echo $rpc['TC_Address']; ?>
                                        </h2>
                                    </div>
                                <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <h3>Remaining Credit Amount =
                                            <?php $amount = $rpc['Amount'];
                                                $paidamount = $rpc['Paid_Amount'];
                                                $Remainingamount = $amount-$paidamount;
                                                echo $Remainingamount;
                                             ?>
                                        </h3>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Pay Credits</label>
                                            <input type="text" id="company" placeholder="" class="form-control" name="paycredits" required>
                                        </div>
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_paycredit">
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