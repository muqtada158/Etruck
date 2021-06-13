<?php
require('../scripts/sub-truck-company-assets.php');
  
  ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Driver</th>
                                <th>PetrolStation</th>
                                <th>Gas Litres</th>
                                <th>Cash Amount</th>
                                <th>Approved Litres</th>
                                <th>Approved Cash</th>
                                <th>Token</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;" id="tbody">
                            <?php
                                $count = 1;
                                foreach ($result_tokendata as $rtd) {  ?>
                            <tr id="table" >
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rtd['Token_Date']; ?></td>
                                <td><?php echo $rtd['Token_User']; ?></td>
                                <td><?php echo $rtd['Driver_Name']; echo ' | '; echo $rtd['Driver_Plate_No']; ?></td>
                                <td><?php echo $rtd['P_Name']; echo ' | '; echo $rtd['P_Address']; ?></td>
                                <td id="gas"><label class="badge badge-danger" style="font-size: 15px;"><?php echo $rtd['Token_Litres']; ?></label></td>
                                <td><label class="badge badge-danger" style="font-size: 15px;"><?php echo $rtd['Token_Cash']; ?></label></td>
                                <td><label class="badge badge-warning" style="font-size: 15px;"><?php echo $rtd['Token_Approved_Litres']; ?></label></td>
                                <td><label class="badge badge-primary" style="font-size: 15px;"><?php echo $rtd['Token_Approved_Cash']; ?></label></td>
                                <td><label class="badge badge-danger" style="font-size: 15px;"><?php echo $rtd['Token']; ?></label></td>
                                <td style="text-align: center;">
                                    <span id="status_token" style="float: left;">
                                    <?php 
                                        if($rtd['Status'] == "Approved"){
                                          $badge = 'success';
                                        }else{
                                          $badge = 'warning';
                                        } ?>

                                    <label  class="badge badge-<?php echo $badge; ?>" style="font-size: 15px;">
                                    <?php echo $rtd['Status']; ?>
                                    </label></span>
                                </td>
                                <td>
                                        <?php 
                                        if($rtd['Status'] == "Approved"){ ?>
                                          <button type="submit" class="btn btn-disabled mr-2" name="btn_dlt_token" disabled=""><i class="mdi mdi-delete-forever"></i></button>
                                       <?php }else{ ?>
                                        <form method="POST">
                                            <input type="hidden" name="token_id" value="<?php echo $rtd['Token']; ?>">
                                         <button type="submit" class="btn btn-danger mr-2" name="btn_dlt_token"><i class="mdi mdi-delete-forever mdi-24px"></i></button>
                                         </form>
                                       <?php } ?>
                                    
                                </td>
                            </tr>
                            <?php $count++; } ?>
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Driver</th>
                                <th>PetrolStation</th>
                                <th>Gas Litres</th>
                                <th>Cash Amount</th>
                                <th>Approved Litres</th>
                                <th>Approved Cash</th>
                                <th>Token</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                     <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>