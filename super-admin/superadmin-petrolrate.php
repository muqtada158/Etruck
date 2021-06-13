<?php
include('superadmin-headertemplate.php');
?>
            <!-- MAIN CONTENT-->
            
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Edit Petrol Station Rates</h2>
                                </div>


                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Rate Form</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Petrol Pump Name</label>
                                            <input type="text" id="company" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Current Rate</label>
                                            <input type="text" id="company" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Rate</label>
                                            <input type="text" id="company" placeholder="" class="form-control">
                                        </div>
                                        
                                        
                                       <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-refresh"></i> Reset
                                        </button>
                                    </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- MAIN CONTENT END-->  


<?php
include('superadmin-footertemplate.php');
?>