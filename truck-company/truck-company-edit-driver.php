<?php 
require('../scripts/truck-company-assets.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Etruck & Forex | Truck Company</title>
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
                <a class="btn btn-success" href="truck-company-driver-details"><i class="mdi mdi-home mr-2"></i>Back to Truck Driver Details</a>
                <h1 class="text-primary mt-4">Edit Truck Driver Details</h1>
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
                    <?php foreach ($result_truckeditdriverdetails as $tedd) { ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="Up_Driver_Name" placeholder="Name" required value="<?php echo $tedd['Driver_Name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email</label>
                      <input type="Email" class="form-control" name="Up_Driver_Email" placeholder="Email" required value="<?php echo $tedd['Driver_Email']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact</label>
                      <input type="number" class="form-control" name="Up_Driver_Contact" placeholder="Contact" required value="<?php echo $tedd['Driver_Contact']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Address</label>
                      <input type="text" class="form-control" name="Up_Driver_Address" placeholder="Address" required value="<?php echo $tedd['Driver_Address']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Id-Card</label>
                      <input type="text" class="form-control" name="Up_Driver_Id_Card" placeholder="Id-Card" pattern="[a-zA-Z0-9_-\.]+" required value="<?php echo $tedd['Driver_Id_Card']; ?>">
                    </div>
                  <?php } ?>
                  <center>
                    <button type="submit" class="btn btn-success mr-2" name="BTN_Driver_Update">Update</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </center>
                  </form>
                </div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:../partials/_footer.html -->
       <?php include('tc-footer-template.php'); ?>