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
                                    <h2 class="title-1">Manage Petrol Stations</h2>

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
                                <th>Owner ID</th>
                                <th>Owner Name</th>
                                <th>Owner Contact</th>
                                <th>Username</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Fuel Price(Buying)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                
                                $count = 1;
                                foreach ($result_managepetrol as $rmp) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rmp['P_Name']; ?></td>
                                <td><?php echo $rmp['P_Address']; ?></td>
                                <td><?php echo $rmp['Owner_Id']; ?></td>
                                <td><?php echo $rmp['Owner_Name']; ?></td>
                                <td><?php echo $rmp['Owner_Contact']; ?></td>
                                <td><?php echo $rmp['UserName']; ?></td>
                                <td><?php echo $rmp['Email']; ?></td>
                                <!-- <td><?php echo $rmp['PassWord']; ?></td> -->
                                <td><?php echo $rmp['P_Fuel_Price']; ?> <a href="superadmin-updatefuelprice?id=<?php echo $rmp['Id']; ?>"><i class="fa fa-edit" style="color: orange"></i></a></td>
                                <td style="text-align: center;"><a href="superadmin-editpetrolstation?id=<?php echo $rmp['Owner_Id']; ?>&action=edit"><i class="fa fa-edit" style="color: orange"></i></a> | <a href="../scripts/delete-scripts?id=<?php echo $rmp['Id']; ?>&action=dlt_petrolstation"><i class="fa fa-trash" style="color: red"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Station Name</th>
                                <th>Station Address</th>
                                <th>Owner ID</th>
                                <th>Owner Name</th>
                                <th>Owner Contact</th>
                                <th>Username</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Fuel Price(Buying)</th>
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