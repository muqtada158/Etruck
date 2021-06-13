<?php
include('superadmin-headertemplate.php');
?>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #808080 ;
  color: white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>
<!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">

<?php if(isset($_GET['action']) && $_GET['action'] == "failed-file-extension-error")
{ ?>
<div class="alert alert-danger" role="alert">
<center>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Failed!</strong> File Extension Not Valid!</center>
</div> 
<?php }?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                              
                                <div class="overview-wrap">
                                    <h2 class="title-1">Add Cash Annex</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-md-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong><?php foreach ($result_tctransacioninlitre as $tctinlitre) { ?> 
                                                <h3> <?php echo $tctinlitre['TC_Name'] .' | '.$tctinlitre['TC_Address']; ?></h3>
                                            <?php } $idofps = $getid; ?></strong>
                                    </div>
                                    
                                        <div class="col-sm-12">
                                        <div class="tab">
                                          <button class="tablinks col-sm-6" onclick="openCity(event, 'Debit')">Debit ANNEX</button>
                                          <button class="tablinks col-sm-6" onclick="openCity(event, 'Credit')">Credit ANNEX</button>
                                        </div>
                                        </div>
                                        <div id="Debit" class="tabcontent" active>
                                          <center><h3 style="color: green">Debit ANNEX</h3></center>
                                          <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Date</label>
                                            <input type="Date" id="company" placeholder="Enter the Transaction Date" class="form-control" name="truckaddannexdate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Amount</label>
                                            <input type="number" id="company" placeholder="Enter the Amount" class="form-control" name="truckaddannexamount" required>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Annex</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="truckaddannex" class="form-control-file" required>
                                                </div>
                                            </div>                                        
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" name="btn_annexcashtruck">
                                            <i class="fa fa-search"></i> Submit Debit ANNEX
                                        </button>
                                        <button type="reset" class="btn btn-primary btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                    </div>
                                    </div>
                                    </form>
                                        </div>

                                        <div id="Credit" class="tabcontent">
                                          <center><h3 style="color: red">Credit ANNEX</h3></center>
                                          <form method="Post" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Date</label>
                                            <input type="Date" id="company" placeholder="Enter the Transaction Date" class="form-control" name="truckaddannexdatecredit" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Amount</label>
                                            <input type="number" id="company" placeholder="Enter the Amount" class="form-control" name="truckaddannexamountcredit" required>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Annex</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="truckaddannexcredit" class="form-control-file" required>
                                                </div>
                                            </div>                                        
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-danger btn-sm" name="btn_annexcashtruckcredit">
                                            <i class="fa fa-search"></i> Submit Credit ANNEX
                                        </button>
                                        <button type="reset" class="btn btn-primary btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                    </div>
                                    </div>
                                    </form>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- END MAIN CONTENT-->
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<?php include('superadmin-footertemplate.php'); ?>