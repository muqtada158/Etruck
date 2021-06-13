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
                                    <h2 class="title-1">Truck Drivers</h2>

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Plate No</th>
                                <th>Address</th>
                                <th>ID-Card</th>
                                <th>Truck Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_Drivers as $rd) { 
                                 ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rd['Driver_Name']; ?></td>
                                <td><?php echo $rd['Driver_Email']; ?></td>
                                <td><?php echo $rd['Driver_Contact']; ?></td>
                                <td><?php echo $rd['Driver_Plate_No']; ?></td>
                                <td><?php echo $rd['Driver_Address']; ?></td>
                                <td><?php echo $rd['Driver_Id_Card']; ?></td>
                                <td><?php echo $rd['TC_Name']; ?></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Plate No</th>
                                <th>Address</th>
                                <th>ID-Card</th>
                                <th>Truck Company</th>
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