<?php 
require('../scripts/sub-petrol-station-assets.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Etruck & Forex | Petrol Station</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
  <!-- base:css -->
  <style type="text/css">
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 13px 20px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    } 
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }
    
    #container {
      background-color: #dcdcdc;
    }

  </style>
</head>

<body>
<div class="container">
  <div class="row">
        <div class="col-xs-1"></div>
        <div class="receipt-main col-xs-10">
            <div class="row">
              <div class="col-xs-4"></div>
                <div class="">
                    <img class="img-responsive" alt="iamgurdeeposahan" src="../images/icon/logo.png" >
                </div>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid">
          <div class="col-xs-12 text-left">
            <div class="receipt-right">
              <?php foreach($result_tokendetails as $tdss) { ?>
              <h4><b>Driver : </b><?php echo $tdss['Driver_Name']; ?></h5>
              <h4><b>Plate No :</b> <?php echo $tdss['Driver_Plate_No']; ?></h5>
              <h4><b>Mobile :</b> <?php echo $tdss['Driver_Contact']; ?></h5>
              <h4><b>Email :</b> <?php echo $tdss['Driver_Email']; ?></h5>
              <h4><b>Address :</b> <?php echo $tdss['Driver_Address']; ?></h5>
            
            </div>
          </div>
          <div class="col-xs-12">
            <div class="receipt">
              <h1>Token # <?php echo $tdss['Token']; ?></h1>
            </div>
          </div>
        </div>
            </div>
      <?php } ?>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount / Litres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Cash Taken</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $tdss['Token_Approved_Cash']; ?> </td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Gas Litres Taken</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $tdss['Token_Approved_Litres']; ?> </td>
                        </tr>
                        <!-- <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Late Fees: </strong>
                            </p>
              <p>
                                <strong>Payable Amount: </strong>
                            </p>
              <p>
                                <strong>Balance Due: </strong>
                            </p>
              </td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> 500/-</strong>
                            </p>
              <p>
                                <strong><i class="fa fa-inr"></i> 1300/-</strong>
                            </p>
              <p>
                                <strong><i class="fa fa-inr"></i> 9500/-</strong>
                            </p>
              </td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid receipt-footer">
          <div class="col-xs-12 text-left">
            <div class="receipt-right">
              <p><b>Date :</b> 15 Aug 2016</p>
              <h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
            </div>
          </div>
          <!-- <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <h1>Signature</h1>
            </div>
          </div> -->
        </div>
            </div>
      
        </div>    
  </div>
</div>