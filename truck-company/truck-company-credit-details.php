<?php include('tc-header-template.php'); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Requested successfully!</center>
</div> 
<?php }?>
          <div class="row">
            <div class="col-lg-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Credit Request</h4>
                
                <form class="forms-sample" method="Post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Requested Amount</label>
                      <input type="text" class="form-control" name="TC_Requested_Amount" placeholder="i.e 25000" required>
                    </div>
                     <center><button type="submit" class="btn btn-warning mr-2" name="Btn_request">Request</button></center>
                  </form>
                  </div>
              </div>
            </div>
            <div class="col-lg-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <button type="submit" class="btn btn-warning mr-2" name="Btn_credit" id="btn_refresh_credit" style="float: right;"title="Referesh table to view latest updates">Refresh Table</button>
                  <h4 class="card-title">Credit Request Details</h4>
                  <div class="table-responsive" id="table_credit_details">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date of Request</th>
                                <th>Date of Approval</th>
                                <th>Credit Amount</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_truckcredit as $tc) {  ?>
                                <tr >
                                <td><?php echo $count; ?></td>
                                <td><?php echo $tc['Date']; ?></td>
                                <td><?php echo $tc['Date_Of_Approval']; ?></td>
                                <td><label class="badge badge-warning" style="font-size: 15px;"><?php echo $tc['Amount']; ?></label></td>
                                <td><label class="badge badge-success" style="font-size: 15px;"><?php echo $tc['Paid_Amount']; ?></label></td>
                                <td >
                                  <?php 
                                  if($tc['Status'] == "Paid"){
                                    $badge = 'success';
                                  }else{
                                    $badge = 'warning';
                                  } ?>
                                  <label id="" class="badge badge-<?php echo $badge; ?>" style="font-size: 15px;">
                                  <?php echo $tc['Action']; echo ' | '; echo $tc['Status']; ?>
                                  </label>
                                </td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date of Request</th>
                                <th>Date of Approval</th>
                                <th>Credit Amount</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>   

                  </div>
                </div>
              </div>
            </div>
        </div>
<!-- for refresh -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
            $("#btn_refresh_credit").click(function(){
                $("#table_credit_details").load("truck-company-credit-details-load-table");
            });
    </script>  
<?php include('tc-footer-template.php'); ?>