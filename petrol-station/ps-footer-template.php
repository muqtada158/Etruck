<footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix" style="text-align: center;">
                <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php echo date("Y"); ?> <a href="#" target="_blank">ETRUCK</a>. All rights reserved.</span>
                <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline"></i></span> -->
              </div>
          </div>
        </footer>
        <!-- partial -->
     
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
    <script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <script src="../js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
    </script>


     <!-- for automatic hiding of alerts -->
    <script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(600, 0).slideUp(600, function(){
        $(this).remove(); 
    });
    }, 6000);
    </script>
  </body>
</html>