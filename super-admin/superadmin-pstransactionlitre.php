<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
            
                

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <a href="../super-admin/superadmin-managetransaction" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back </a>
                                </div>
                                <div class="overview-wrap">
                                    <?php foreach ($result_pstransacioninlitre as $tpstinlitre) { ?>
                                    <h2 class="title-1"><?php echo $tpstinlitre['P_Name'] .' | '.$tpstinlitre['P_Address']; ?></h2>
                                    
                                <div class="table-data__tool-right">
                                <a href="superadmin-addpetrolannex?id=<?php echo $getid; ?>"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>ADD ANNEX</button></a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-1"></div>
                             <!-- <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Total Litre</strong></span>
                                    <h2 class="number"><strong><?php echo  round($capitalforlitre, 2); ?></strong></h2>
                                    <div class="icon">
                                        <i class="zmdi zmdi-gas-station"></i>
                                    </div>
                                </div>
                            </div>  -->
                            <?php  $oldrate =  round($capitalforlitre, 2); ?>
                            <div class="col-md-6 col-lg-5">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Litre Spent</strong></span>
                                    <?php foreach ($result_calculatingspent_forps as $rcpfl) {   ?>
                                    <h2 class="number"><strong>
                                        <?php echo $spentforlitre = $rcpfl['SUM(Token_Approved_Litres)']; ?>
                                    </strong></h2>
                                    <div class="icon">
                                        <i class="zmdi zmdi-gas-station"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Litre Remaining</strong></span>
                                    <h2 class="number"><strong>
                                     <?php echo round($remainingforlitre, 2); ?>
                                        </strong></h2>
                                    <div class="icon">
                                        <i class="zmdi zmdi-gas-station"></i>
                                    </div>
                                    
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                                </div>
            </section>
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Date</th>
                                <th>Truck Company</th>
                                <th>Driver Name</th>
                                <th>Plate No</th>
                                <th>Token</th>
                                <th>Litres</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_pstransacionofdriverinlitre as $rmp) {  ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td><?php echo $rmp['Token_Date']; ?></td>
                                <td><?php echo $rmp['TC_Name']; ?></td>
                                <td><?php echo $rmp['Driver_Name']; ?></td>
                                <td><?php echo $rmp['Driver_Plate_No']; ?></td>
                                <td><?php echo $rmp['Token']; ?></td>
                                <td><?php echo $rmp['Token_Approved_Litres']; ?></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Date</th>
                                <th>Truck Company</th>
                                <th>Driver Name</th>
                                <th>Plate No</th>
                                <th>Token</th>
                                <th>Litres</th>
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