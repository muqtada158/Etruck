<?php include('ps-header-template.php'); ?>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Litre Annex History</h4>
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Annex</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            
                                
                                <?php
                                $count = 1;
                                foreach ($result_annexlitre as $ral) {  ?>
                                <tr >
                                <td><?php echo $count; ?></td>
                                <td><?php echo $ral['Date']; ?></td>
                                <td><label class="badge badge-success" style="font-size: 15px;"><?php echo $ral['Amount']; ?></label></td>
                                <td>
                                    <center>
                                    <div class="thumbnail">
                                      <a href="../super-admin/petrolstation-litre_annex_transactions/<?php echo $ral['Annex']; ?>" target="_blank">
                                        <i class="mdi mdi-camera mdi-24px" aria-hidden="true"></i>
                                      </a>
                                    </div>
                                    </center>
                                </td>
                                </tr>
                                <?php $count++; } ?>

                            
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Annex</th>
                            </tr>
                        </tfoot>
                    </table>   
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php include('ps-footer-template.php'); ?>