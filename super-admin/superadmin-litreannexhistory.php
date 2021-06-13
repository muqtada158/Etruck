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
                                    <h2 class="title-1">Litre Annex History</h2>

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
                                <th>Station Name</th>
                                <th>Station Address</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th style="text-align: center;">Annex</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_litreannex as $rla) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rla['P_Name']; ?></td>
                                <td><?php echo $rla['P_Address']; ?></td>
                                <td><?php echo $rla['Date']; ?></td>
                                <td><?php echo $rla['Amount']; ?></td>
                                <td>
                                    <center>
                                    <div class="thumbnail">
                                      <a href="petrolstation-litre_annex_transactions/<?php echo $rla['Annex']; ?>" target="_blank">
                                        <i class="fa fa-camera-retro fa-2x" aria-hidden="true"></i>
                                        <!-- <img src="petrolstation-litre_annex_transactions/<?php echo $rla['Annex']; ?>"style="width:100px; border-radius: 5px;"> -->
                                      </a>
                                    </div>
                                    </center>
                                </td>
                                <td style="text-align: center;">
    <a href="../scripts/delete-scripts?id=<?php echo $rla['Id']; ?>&action=dlt_litreannexhistory&img=<?php echo $rla['Annex']; ?>">
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
                                <th>Amount</th>
                                <th style="text-align: center;">Annex</th>
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