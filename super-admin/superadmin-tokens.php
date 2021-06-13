<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
            
                

                <div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "deleted")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Deleted successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tokens</h2>

                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Token Date</th>
                                <th>Truck Company</th>
                                <th>Driver</th>
                                <th>Petrol Station</th>
                                <th>Litres</th>
                                <th>Cash</th>
                                <th>Token</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_token as $rt) { 
                                 ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rt['Token_Date']; ?></td>
                                <td><?php echo $rt['TC_Name']; echo ' | '; echo $rt['TC_Address']; ?></td>
                                <td><?php echo $rt['Driver_Name']; echo ' | '; echo $rt['Driver_Plate_No']; ?></td>
                                <td><?php echo $rt['P_Name']; echo ' | '; echo $rt['P_Address']; ?></td>
                                <td><?php echo $rt['Token_Litres']; ?></td>
                                <td><?php echo $rt['Token_Cash']; ?></td>
                                <td style="color: red;"><?php echo $rt['Token']; ?></td>
                                <?php 
                                    if($rt['Status'] == "Approved"){
                                    $badge = 'green';
                                  }else{
                                    $badge = 'orange';
                                  } ?><td style="color: <?php echo $badge; ?>"><?php echo $rt['Status']; ?></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Token Date</th>
                                <th>Truck Company</th>
                                <th>Driver</th>
                                <th>Petrol Station</th>
                                <th>Litres</th>
                                <th>Cash</th>
                                <th>Token</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>   


                                    </div>
                                    <div class="col-lg-9">
                               
                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                     
            <!-- MAIN CONTENT END-->  


<?php
include('superadmin-footertemplate.php');
?>