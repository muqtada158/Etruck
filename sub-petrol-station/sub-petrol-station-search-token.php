<?php include('sub-ps-header-template.php'); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Requested successfully!</center>
</div> 
<?php }?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "Notenoughamount")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Truck Company is low on capital kindly contact truck company</center>
</div> 
<?php }?>
          <div class="row">
            <div class="col-lg-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Token</h4>
                
                <form class="forms-sample" method="get">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Token</label>
                      <input type="text" class="form-control" name="token" placeholder="Enter Token" required>
                    </div>
                     <center><button type="submit" class="btn btn-warning mr-2">Search</button></center>
                  </form>
                  </div>
              </div>
            </div>
            <div class="col-lg-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Token Details</h4>
                  
                      <?php  echo $tokenmessage;
                         foreach($result_tokendetails as $tdss) { ?>
                        <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card text-center">
                              <div class="card-header">
                              <Strong>  Token No <?php echo $tdss['Token']; ?>  </Strong>
                              </div>
                              <div class="card-body">
                                <?php echo $tdss['Token_Date']; ?>
                                <h5 class="card-title"><?php echo $tdss['Driver_Name']; ?> | <?php echo $tdss['Driver_Plate_No']; ?></h5>
                                <p class="card-text"> CASH = <?php echo $tdss['Token_Cash']; ?></p>
                                <p class="card-text"> LITRES = <?php echo $tdss['Token_Litres']; ?></p>
                              </div>
                              <form method="post" action="sub-petrol-station-token-review?token=<?php echo $tdss['Token']; ?>">
                              <div class="card-footer text-muted">
                                <input type="submit" name="btn_review_token" class="btn btn-warning" value="Review Token">
                              </div>
                              </form>
                            </div>
                        </div></div>
                        <?php } ?>
                </div>
              </div>
            </div>
        </div>
    
<?php include('sub-ps-footer-template.php'); ?>