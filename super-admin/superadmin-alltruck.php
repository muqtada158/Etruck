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
<?php if(isset($_GET['action']) && $_GET['action'] == "updated")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Manage Truck Company</h2>

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
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Owner ID</th>
                                <th>Owner Name</th>
                                <th>Owner Contact</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Petrol Stations</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_managetruckcompany as $mtc) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $mtc['TC_Name']; ?></td>
                                <td><?php echo $mtc['TC_Address']; ?></td>
                                <td><?php echo $mtc['TC_Owner_Id']; ?></td>
                                <td><?php echo $mtc['TC_Owner_Name']; ?></td>
                                <td><?php echo $mtc['TC_Owner_Contact']; ?></td>
                                <td><?php echo $mtc['Email']; ?></td>
                                <!-- <td><?php echo $mtc['PassWord']; ?></td> -->
                                <td><a href="superadmin-edittruck-petrolstation?id-ps=<?php echo $mtc['Id']; ?>"><i class="fa fa-edit"style="color: orange"> </i></a> Stations</td>
                                <td style="text-align: center;"><a href="superadmin-edittruck?ownerid=<?php echo $mtc['TC_Owner_Id']; ?>"><i class="fa fa-edit"style="color: orange"> </i></a> | <a href="../scripts/delete-scripts?id=<?php echo $mtc['TC_Owner_Id']; ?>&action=dlt_truckcompany"><i class="fa fa-trash"style="color: red"></i></a></td>
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
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Petrol Stations</th>
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