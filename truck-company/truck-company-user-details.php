<?php include('tc-header-template.php'); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "updated")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Added successfully!</center>
</div> 
<?php }?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "deleted")
{ ?>
<div class="alert alert-warning" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Deleted successfully!</center>
</div> 
<?php }?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "alreadyexist")
{ ?>
<div class="alert alert-warning" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> Already exist try new one!</center>
</div> 
<?php }?>

          <div class="row">
            <div class="col-lg-4 grid-margin">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Sub-User</h4>
                  <form class="forms-sample" method="Post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Sub User Name</label>
                      <input type="text" class="form-control" name="Sub_Name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email</label>
                      <input type="Email" class="form-control" name="Sub_Email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Password</label>
                      <input type="text" class="form-control" name="Sub_Password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact</label>
                      <input type="number" class="form-control" name="Sub_Contact" placeholder="Contact" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Id-Card</label>
                      <input type="text" class="form-control" name="Sub_Id_Card" placeholder="Id-Card" pattern="[a-zA-Z0-9_-\.]+" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="Sub_User_Add">Add Sub-User</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </form>
                </div></div>
            </div>
            <div class="col-lg-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Sub-Users</h4>
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Contact</th>
                                <th>ID-Card</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_trucksubuserdetails as $mtc) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $mtc['Sub_User_Name']; ?></td>
                                <td><?php echo $mtc['Sub_User_Email']; ?></td>
                                <td><?php echo $mtc['Sub_User_Password']; ?></td>
                                <td><?php echo $mtc['Sub_User_Contact']; ?></td>
                                <td><?php echo $mtc['Sub_User_ID']; ?></td>
                                <td style="text-align: center;"><a href="../scripts/delete-scripts?id=<?php echo $mtc['Sub_User_ID']; ?>&action=dlt_subuser_truck"><i class="mdi mdi-delete mdi-24px"style="color: red"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Contact</th>
                                <th>ID-Card</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>   
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php include('tc-footer-template.php'); ?>