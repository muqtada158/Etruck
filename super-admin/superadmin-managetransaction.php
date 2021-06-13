<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
            
                

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Manage Transactions</h2>

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
                                <th style="text-align: center;">No</th>
                                <th>Station Name</th>
                                <th>Station Address</th>
                                <th>Owner Name</th>
                                <th style="text-align: center;">Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_managepetrol as $rmp) {  ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td><?php echo $rmp['P_Name']; ?></td>
                                <td><?php echo $rmp['P_Address']; ?></td>
                                <td><?php echo $rmp['Owner_Name']; ?></td>
                                <td style="text-align: center;"><a href="superadmin-pstransactionlitre?id=<?php echo $rmp['Id']; ?>">Litre</a> | <a href="superadmin-pstransactioncash?id=<?php echo $rmp['Id']; ?>">Cash</a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Station Name</th>
                                <th>Station Address</th>
                                <th>Owner Name</th>
                                <th style="text-align: center;">Transaction</th>
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