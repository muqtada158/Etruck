<?php include('tc-header-template.php'); 


?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == "Success")
    { ?>
<div class="alert alert-success" role="alert">
    <center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Generated successfully!
    </center>
</div>
<?php }?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == "deleted")
    { ?>
<div class="alert alert-success" role="alert">
    <center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Deleted successfully!
    </center>
</div>
<?php }?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == "Failed")
    { ?>
<div class="alert alert-danger" role="alert">
    <center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Failed!</strong> Something Went Wrong!
    </center>
</div>
<?php }?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == "Notenoughcapital")
    { ?>
<div class="alert alert-danger" role="alert">
    <center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Failed!</strong> You dont have enough cash in capital!
    </center>
</div>
<?php }?>
<link rel="stylesheet" href="vendors/select2/select2.min.css">
<div class="row">
    <div class="col-lg-4 grid-margin" >
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Generate Token</h4>
                <form class="forms-sample" method="Post">
                    <div class="form-group">
                        <label>Driver </label>
                        <select class="js-example-basic-single" style="width: 100%;" name="driver_detail" required>
                            <option value="" disabled selected hidden>Please Select Driver</option>
                            <?php foreach ($result_tokendriverdetails as $rtdd) { ?>
                            <option value="<?php echo $rtdd['Id']; ?>"><?php echo $rtdd['Driver_Name']; echo " | "; echo $rtdd['Driver_Plate_No']; ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Petrol Station</label>
                        <select class="js-example-basic-single" style="width: 100%;" name="petrolstaion_detail" required>
                            <option value="" disabled selected hidden>Please Select PetrolStation</option>
                            <?php foreach ($result_truckdetails as $rtsd) { ?>
                            <option value="<?php echo $rtsd['Id']; ?>"><?php echo $rtsd['P_Name']; echo " | "; echo $rtsd['P_Address']; ?></option>
                            <?php }  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Gas Litres</label>
                        <input type="text" class="form-control" name="gas_litres" placeholder="i.e 25" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Cash Amount</label>
                        <input type="text" class="form-control" name="cash_amount" placeholder="i.e 2500" required>
                    </div>
                    <center><button type="submit" class="btn btn-primary mr-2" name="Btn_generate">Generate Token</button></center>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 grid-margin" >
        <div class="card" >
            <div class="card-body" >
                <button type="submit" class="btn btn-warning mr-2" name="Btn_generate" id="btn_refresh" style="float: right;"title="Referesh table to view latest updates">Refresh Table</button>
                <h4 class="card-title">Token Details</h4>
                <div class="table-responsive" id="tt">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- for refresh -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
            $("#btn_refresh").click(function(){
                $("#tt").load("generate-token-table-data");
            });
    </script>  
<?php include('tc-footer-template.php'); ?>