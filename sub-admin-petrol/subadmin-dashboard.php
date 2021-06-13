<?php
include('subadmin-headertemplate.php');
?>
        <div class="container">
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><?php echo $rowsforcalltruckcompany; ?></h2>
                                <span class="desc">Truck Companies</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-truck"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">5</h2>
                                <span class="desc">Truck Drivers</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-male-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php echo $rowsforcallps; ?></h2>
                                <span class="desc">Petrol Stations</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-gas-station"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo $rowsforcalltransbymonth; ?></h2>
                                <span class="desc">Token Generated This Month</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </div> 
<?php
include('subadmin-footertemplate.php');
?>