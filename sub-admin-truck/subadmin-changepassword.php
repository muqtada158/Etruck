<?php
include('subadmin-headertemplate.php');
?>

<style type="text/css">
    .pop-up-dialog {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0,0,0,.7);
padding: 20px 20px;
z-index: 999;
overflow-x: hidden;
overflow-y: auto;
}
</style> 
<!-- for not go back -->
<script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
</script>  
<!-- for not go back -->

</script>
<div class="section__content section__content--p30">
<?php if(isset($_GET['action']) && $_GET['action'] == "success")
{ ?>
<div class="alert alert-success" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Success!</strong> Updated successfully!</center>
</div> 
<?php }?>
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php if ($validation == "No"){ ?>
                                 <div class="card" <?php //echo $pass_response_key; ?>>
                                    <div class="card-header">
                                        <strong>Change Password</strong>
                                    </div>
                                    <form method="Post">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Enter Old Password</label>
                                            <input type="Password" id="pass" name="checkpass" class="form-control" required>
                                        </div>
                                        <span style="color: red"><?php echo $messagecheck; ?></span>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="btn_checkpass">
                                            <i class="fa fa-search"></i> Submit
                                        </button>

                                    </div>
                                    </div>
                                </form>
                                </div>
                            <?php } ?>
                                <?php if ($validation == "Yes"){ ?>
                                <div class="card" <?php //echo $pass_old_key; ?>>
                                    <div class="card-header">
                                        <strong>Update Password</strong>
                                    </div>
                                    <form method="Post">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Enter New Password</label>
                                            <input type="Password" id="pass" name="new_pass" class="form-control" required>
                                        </div>
                                            <span style="color: red"><?php echo $messagecheck; ?></span>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-warning mr-2" name="btn_pass_new_up">
                                            <i class="fa fa-search"></i> Update
                                        </button>

                                    </div>
                                    </div>
                                </form>
                                </div> <?php } ?>
                            </div>
                        </div>      
            <!-- MAIN CONTENT END-->  








<?php
include('subadmin-footertemplate.php');
?>