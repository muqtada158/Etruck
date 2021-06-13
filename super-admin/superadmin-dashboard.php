<?php
include('superadmin-headertemplate.php');
?>
        <div class="container" style="height: 100%;">
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
                                <h2 class="number"><?php echo $rowsforcalldr; ?></h2>
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
        </div> </div></div>
<style type="text/css">
    @media only screen and (min-width: 1000px) {
       .footer{
         position: fixed;
    width: 80%;
   bottom: 0;
   color: white;
   text-align: left; float: right;
       } 
    }

</style>
<div class="row footer">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © <?php echo date("Y"); ?> <a href="#" target="_blank">ETRUCK</a>. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- END MAIN CONTENT-->

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>
    <!-- for automatic hiding of alerts -->
    <script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
    }, 3000);
    </script>
    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
    </script>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>