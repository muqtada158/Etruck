<?php require('../scripts/truck-company-assets.php'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
    } );
    </script>