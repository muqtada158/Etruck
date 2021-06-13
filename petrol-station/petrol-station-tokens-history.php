<?php include('ps-header-template.php'); ?>
          <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Token History</h4>
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Token</th>
                                <th>Date</th>
                                <th>Token User</th>
                                <th>Truck Company</th>
                                <th>Truck Driver Details</th>
                                <th>Requested Cash</th>
                                <th>Requested Litres</th>
                                <th>Approved Cash</th>
                                <th>Approved Litres</th>
                                <th>Token App User</th>
                                <th>Status</th>
                                <th>Print</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_tokenhistory as $th) {  ?>
                                <tr >
                                <td><?php echo $count; ?></td>
                                <td><label class="badge badge-danger" style="font-size: 15px;"><?php echo $th['Token']; ?></label></td>
                                <td><?php echo $th['Token_Date']; ?></td>
                                <td><?php echo $th['Token_User']; ?></td>
                                <td><?php echo $th['TC_Name']; ?></td>
                                <td><?php echo $th['Driver_Name']; ?></td>
                                <td><?php echo $th['Token_Cash']; ?></td>
                                <td><?php echo $th['Token_Litres']; ?></td>
                                <td><?php echo $th['Token_Approved_Cash']; ?></td>
                                <td><?php echo $th['Token_Approved_Litres']; ?></td>
                                <td><?php echo $th['Token_App_User']; ?></td>
                                <td><label class="badge badge-success" style="font-size: 15px;"><?php echo $th['Status']; ?></label></td>
                                <td><a href="print-token?token=<?php echo $th['Token']; ?>" target="_blank"><label class="badge badge-primary mdi mdi-printer" style="font-size: 15px;">Print</label></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Token</th>
                                <th>Date</th>
                                <th>Token User</th>
                                <th>Truck Company</th>
                                <th>Truck Driver Details</th>
                                <th>Requested Cash</th>
                                <th>Requested Litres</th>
                                <th>Approved Cash</th>
                                <th>Approved Litres</th>
                                <th>Token App User</th>
                                <th>Status</th>
                                <th>Print</th>
                            </tr>
                        </tfoot>
                    </table>   
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php include('ps-footer-template.php'); ?>