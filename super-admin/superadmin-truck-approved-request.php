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
                                    <h2 class="title-1">Approved Credits</h2>

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
                                <th>Date Of Request</th>
                                <th>Date Of Approval</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Credited Amount</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_approvedrequest as $rar) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rar['Date']; ?></td>
                                <td><?php echo $rar['Date_Of_Approval']; ?></td>
                                <td><?php echo $rar['TC_Name']; ?></td>
                                <td><?php echo $rar['TC_Address']; ?></td>
                                <td style="color: red"><?php $amount = $rar['Amount'];
                                                $paidamount = $rar['Paid_Amount'];
                                                $Remainingamount = $amount-$paidamount;
                                                echo $Remainingamount;
                                             ?></td>
                                <td style="color: orange"><?php echo $rar['Paid_Amount']; ?></td>
                                <td><?php echo $rar['Status']; ?></td>
                                <td><a href="superadmin-pay-credit-amount?id=<?php echo $rar['Id'];; ?>" style="color: green">Pay <i class="fa fa-envelope" aria-hidden="true"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Date Of Request</th>
                                <th>Date Of Approval</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Credited Amount</th>
                                <th>Paid Amount</th>
                                <th>Status</th>
                                <th>Action</th>
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