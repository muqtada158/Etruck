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
                                    <h2 class="title-1">Manage Sub-Admin</h2>

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
                                <th>Role</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_callsubadmin as $rcs) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rcs['Owner_Id']; ?></td>
                                <td><?php echo $rcs['UserName']; ?></td>
                                <td><?php echo $rcs['Email']; ?></td>
                                <td><?php echo $rcs['PassWord']; ?></td>
                                <td style="text-align: center;"><a href="../scripts/delete-scripts?id=<?php echo $rcs['id']; ?>&action=dlt_subadmin" style="color: red"><i class="fa fa-trash fa-2x" style="color: red"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Role</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
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