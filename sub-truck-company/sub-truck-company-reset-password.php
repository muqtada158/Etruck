<?php 
require('../scripts/sub-truck-company-assets.php');
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
                <a class="btn btn-success" href="sub-truck-company-dashboard"><i class="mdi mdi-home mr-2"></i>Back to Truck Company Dashboard</a>
                <h1 class="text-primary mt-4">Reset Password</h1>
              </div>
            </div>


            <div class="row doc-content">
              <div class="col-12 col-md-10 offset-md-1">
                <div class="col-12 grid-margin" id="doc-intro">
                  <br>
              <div class="card" <?php echo $mykey ?> >
                <div class="card-body">
                    <h4 class="card-title"></h4>
                  <form class="forms-sample" method="Post">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong>Enter your old password</strong></label>
                      <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                    </div>

                  <center>
                    <button type="submit" class="btn btn-danger mr-2" name="BTN_Old_Pass">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </center>
                  </form>
                </div></div>
<?php
if(isset($_GET['action']) && $_GET['action'] == "notmatched")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Password Not Matched!</center>
</div> 
<?php }?>
                <div class="card" <?php echo $mynewkey ?> >
                <div class="card-body">
                    <h4 class="card-title"></h4>
                  <form class="forms-sample" method="Post">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1"><strong>Enter your New password</strong></label>
                      <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                    </div>

                  <center>
                    <button type="submit" class="btn btn-warning mr-2" name="BTN_new_Pass">Update</button>
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
       <?php include('sub-tc-footer-template.php'); ?>