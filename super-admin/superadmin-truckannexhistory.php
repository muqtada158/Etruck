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
                                    <h2 class="title-1">Truck Annex History</h2>

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
                                <th>Truck Co. Name</th>
                                <th>Truck Co. Address</th>
                                <th>Date</th>
                                <th>Debit Amount</th>
                                <th>Credit Amount</th>
                                <th>Annex</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_callannextruck as $tca) { 
                                 ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $tca['TC_Name']; ?></td>
                                <td><?php echo $tca['TC_Address']; ?></td>
                                <td><?php echo $tca['Date']; ?></td>
                                <td><?php echo $tca['Amount']; ?></td>
                                <td><?php echo $tca['Credit_Amount']; ?></td>
                                <td>
                                    <center>
                                    <div class="thumbnail">
                                      <a href="truck-annex-transactions/<?php echo $tca['Annex']; ?>" target="_blank">
                                        <i class="fa fa-camera-retro fa-2x" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    </center>
                                </td>
                                <td style="text-align: center;">
    <a href="../scripts/delete-scripts?id=<?php echo $tca['Id']; ?>&action=dlt_truckannexhistory&img=<?php echo $tca['Annex']; ?>">
                                <i class="fa fa-trash fa-2x" style="color: red"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Station Name</th>
                                <th>Station Address</th>
                                <th>Date</th>
                                <th>Debit Amount</th>
                                <th>Credit Amount</th>
                                <th>Annex</th>
                                <th style="text-align: center;">Action</th>
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