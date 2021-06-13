<?php 
require('../scripts/sub-petrol-station-assets.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Etruck & Forex | Sub Petrol Station</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/icon/logo 16x16.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel w-100  documentation">
        <div class="content-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 doc-header">
                <a class="btn btn-success" href="sub-petrol-station-search-token"><i class="mdi mdi-home mr-2"></i>Back to Petrol Station Tokens</a>
                <h1 class="text-primary mt-4">Review Token Details</h1>
              </div>
            </div>


            <div class="row doc-content">
              <div class="col-12 col-md-10 offset-md-1">
                <div class="col-12 grid-margin" id="doc-intro">
                  <br>
              <div class="card">
                <?php
if(isset($_GET['action']) && $_GET['action'] == "failed")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Something Went Wrong!</center>
</div> 
<?php }?>

                <div class="card-body">
                    <h4 class="card-title"></h4>
                  <form class="forms-sample" method="Post">
                    <?php foreach($result_tokendetails as $tdss) { ?>
                      <center>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Token </strong><br> <?php echo $tdss['Token']; ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Token-Date </strong><br> <?php echo $tdss['Token_Date']; ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Driver | PlateNo </strong><br> <?php echo $tdss['Driver_Name']; ?> | <?php echo $tdss['Driver_Plate_No']; ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Cash Requested </strong><br> <?php echo $tdss['Token_Cash']; ?> </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Litres Requested </strong><br> <?php echo $tdss['Token_Litres']; ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong> Fuel Rate </strong><br> <?php echo $Ps_fuelrate; ?></label>
                    </div>
                      <hr>
                    <div class="form-group col-8">
                      <label for="exampleInputUsername1"><strong>Cash Approved</strong></label>
                      <input type="text" class="form-control" name="cash_approved" placeholder="Cash" required value="<?php echo $tdss['Token_Cash']; ?>">
                    </div>
                    <div class="form-group col-8">
                      <label for="exampleInputUsername1"><strong>Litres Approved</strong></label>
                      <input type="text" class="form-control" name="litres_approved" placeholder="Litres" required value="<?php echo $tdss['Token_Litres']; ?>">
                    </div>
                    </center>
                  <center>
                    <button type="submit" class="btn btn-success mr-2" name="BTN_approve_token">Approve Token</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </center>
                <?php } ?>
                  </form>
                </div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:../partials/_footer.html -->
       <?php include('sub-ps-footer-template.php'); ?>