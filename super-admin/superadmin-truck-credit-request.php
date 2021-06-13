<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
            
                <div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "approved")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Approved successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">New Credit Requests</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Requests</strong>
                                    </div>
                        <br>
                        <h3><center><?php echo $messagerequest; ?></center></h3>
    
                        <?php
                         foreach ($result_allrequest as $rar) { ?>
                        <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card text-center">
                              <div class="card-header">
                                Truck Company Credit Request
                              </div>
                              <div class="card-body">
                                
                                <?php echo $rar['Date']; ?>
                                <h5 class="card-title"><?php echo $rar['TC_Name']; ?> | <?php echo $rar['TC_Address']; ?></h5>
                                <p class="card-text"><?php echo $rar['Amount'];?></p>
                                
                              </div>
                              <form method="post">
                                <input type="text" name="idget" value="<?php echo $rar['Id']; ?>" hidden>
                              <div class="card-footer text-muted">
                                <input type="submit" name="btn_approve" class="btn btn-warning" value="Approve Request">
                              </div>
                              </form>
                            </div>
                        </div></div>
                        <?php } ?>



                                </div>
                            </div>
                        </div>
                     
            <!-- MAIN CONTENT END-->  


<?php
include('superadmin-footertemplate.php');
?>