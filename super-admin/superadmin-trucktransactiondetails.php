<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
          
          <div class="section__content section__content--p30">
            <?php if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Added successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <a href="../super-admin/superadmin-trucktransaction" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back </a>
                                </div>
                                <div class="overview-wrap">
                                    <h2 class="title-1">Manage Transactions Truck Co.</h2>
                                    <div class="table-data__tool-right">
                                        <?php
                                        $idgetting = $_GET['id'];
                                         ?>
                                       <a href="superadmin-addtruckannex?id=<?php echo $idgetting; ?>"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>ADD ANNEX</button></a>
                                    </div>
                                </div>
<br>

                            </div>
                            <div class="col-md-12">
                            <?php foreach ($result_managetrucktrans as $mtc) {  ?>
                                    <h3 class="title-1">&nbsp -<?php echo $mtc['TC_Name']; ?>  |  <?php echo $mtc['TC_Address']; ?></h3>
                                <?php } ?>
                            </div>
                        </div>
                        <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-1"></div>
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Remaining Capital</strong></span>
                                    <h2 class="number"><strong><?php echo $capital; ?></strong></h2>
                                    <div class="icon">
                                        <i class="zmdi zmdi-balance-wallet"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Grand Total Amount</strong></span>
                                    <?php foreach ($result_calculatingspent as $rcp) {   ?>
                                    <h2 class="number"><strong>
                                    <?php echo $spent = $rcp['SUM(Token_Total_Amount)']; ?>
                                    </strong></h2>
                                    
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <span class="desc"><strong>Remaining</strong></span>
                                    <h2 class="number"><strong><?php echo $remaining = $capital-$spent; ?></strong></h2>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    
                                </div>
                            </div> -->
                            <?php } ?>
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
                                <th>Petrol Station Name</th>
                                <th>Driver Name</th>
                                <th>Plate No.</th>
                                <th>Token</th>
                                <th>Fuel Rate</th>
                                <th>Fuel</th>
                                <th>Cash</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_checktoken as $rc) {  
                                    $price = $rc['PS_Fuel_Price'];
                                    $truckfuel = $rc['Token_Approved_Litres'];
                                    $truckcash = $rc['Token_Approved_Cash'];
                                    ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td><?php echo $rc['Token_Date']; ?></td>
                                <td><?php echo $rc['P_Name']; ?></td>
                                <td><?php echo $rc['Driver_Name']; ?></td>
                                <td><?php echo $rc['Driver_Plate_No']; ?></td>
                                <td><?php echo $rc['Token']; ?></td>
                                <td style="text-align:center;"><?php echo $price; ?></td>
                                <td style="text-align:center;"><?php echo $truckfuel; ?></td>
                                <td style="text-align:center;"><?php echo $truckcash; ?></td>
                                <td style="text-align:center;color:orange"><strong><?php echo $rc['Token_Total_Amount']; ?></strong></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Date</th>
                                <th>Petrol Station Name</th>
                                <th>Driver Name</th>
                                <th>Plate No.</th>
                                <th>Token</th>
                                <th>Fuel Rate</th>
                                <th>Fuel</th>
                                <th>Cash</th>
                                <th>Total Amount</th>
                            </tr>
                        </tfoot>
                    </table>   


                                    </div>
                                    <div class="col-lg-9">
                               
                            </div>
                                        
                                    </div>
                                </div>
                            </div>
            <!-- MAIN CONTENT END-->  


<?php
include('superadmin-footertemplate.php');
?>