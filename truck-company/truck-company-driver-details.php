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

          <div class="row">
            <div class="col-lg-4 grid-margin">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Driver</h4>
                  <form class="forms-sample" method="Post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="Driver_Name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email</label>
                      <input type="Email" class="form-control" name="Driver_Email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact</label>
                      <input type="number" class="form-control" name="Driver_Contact" placeholder="Contact" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Plate No</label>
                      <input type="text" class="form-control" name="Driver_Plate_No" placeholder="Plate No" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Address</label>
                      <input type="text" class="form-control" name="Driver_Address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Id-Card</label>
                      <input type="text" class="form-control" name="Driver_Id_Card" placeholder="Id-Card" pattern="[a-zA-Z0-9_-\.]+" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="Driver_Add">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                  </form>
                </div></div>
            </div>
            <div class="col-lg-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Drivers</h4>
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Plate NO</th>
                                <th>Address</th>
                                <th>ID-Card</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_truckdriverdetails as $mtc) {  ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $mtc['Driver_Name']; ?></td>
                                <td><?php echo $mtc['Driver_Email']; ?></td>
                                <td><?php echo $mtc['Driver_Contact']; ?></td>
                                <td><?php echo $mtc['Driver_Plate_No']; ?></td>
                                <td><?php echo $mtc['Driver_Address']; ?></td>
                                <td><?php echo $mtc['Driver_Id_Card']; ?></td>
                                <td style="text-align: center;"><a href="truck-company-edit-driver?id=<?php echo $mtc['Id']; ?>"><i class="mdi mdi-table-edit mdi-24px" style="color: orange;"> </i></a> <a href="../scripts/delete-scripts?id=<?php echo $mtc['Id']; ?>&action=dlt_truckdriver"><i class="mdi mdi-delete mdi-24px"style="color: red"></i></a></td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Plate NO</th>
                                <th>Address</th>
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