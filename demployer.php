

             <?php
             $pagetitle = "Dashboard";

                include ('demphead.php');

                include ('userauth.php');

                  // instance Post 
                  $jobobj = new Post;
                  $jobs = $jobobj->employerPostDash($_SESSION['myemployerid']);

             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashboard.php');  ?>

                </div>

                <div class="col-md-9">
                    <?php
                        $appliedobj = new Post;
                        $applied = $appliedobj->appliedcaregiverDash($_SESSION['myemployerid']);

                      ?>
                       <div class="row">
                         <div class="col-md-12">
                          <?php
                              if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                              }
                              
                            ?>
                          <div>
                              <h3>Your Job History</h3>
                            <table class="table table-bordered table-striped table-hover">
                              <tr>
                                <th>S/N</th>
                                <th>Date</th>
                                <th>Job Title</th>
                                <th>Open Date</th>
                                <th>Close Date</th>


                              </tr>

                              <tr>
                                
                                <?php
                                      $serial = 1;

                                      foreach ($jobs as $key => $value) {
                          

                                    ?>

                                <tr>
                                  <td><?php echo $serial; ?></td>
                                    <td><?php echo date('D, jS M Y',strtotime($value['post_date'])); ?></td>
                                <td>
                                  <?php echo $value['post_title']; ?>
                                </td>
                                <td>
                                  <?php echo date('D, jS M Y', strtotime($value['post_open'])); ?>
                                </td>
                                <td>
                                  <?php echo date('D, jS M Y', strtotime($value['post_close'])); ?>
                                </td>



                              </tr>

                              <?php
                                    $serial++;
                                  }

                                  ?>

                            </table>
                            <p style="text-align: right;"><a href="employerjobs.php">View more <i class="fas fa-arrow-right"></i></a></p>
                          </div>
                      </div>



                       </div>

                       <div class="row">
                         <div class="col-md-12">
                          
                           <div>
                             <h3>Your Applied Caregivers</h3>
                             <table class="table table-bordered table-striped table-hover">
                            <tr>
                              <th>S/N</th>
                              <th>Date</th>
                              <th>Job title</th>
                              <th>Names</th>
                              <th>Email</th>
                              <th>Phone Number</th>

                            </tr>

                            <?php
                                $serial =1;

                                foreach ($applied as $key => $value) {
                                 
                                
                            ?>

                              <tr>
                                <td><?php echo $serial; ?></td>
                                <td><?php echo date('D jS M Y', strtotime($value['applied_date'])); ?></td>
                                <td><?php echo $value['post_title']; ?></td>
                                <td><?php echo $value['caregiver_names']; ?></td>
                                <td><?php echo $value['applied_email']; ?></td>
                                <td><?php echo $value['applied_phone']; ?></td>
                                
                              </tr>


                            <?php
                                $serial++;

                              }

                              ?>

                          </table>

                          <p style="text-align: right;"><a href="appliedcaregivers.php">View more <i class="fas fa-arrow-right"></i></a></p>

                           </div>

                         </div>

                       </div>
                </div>

                </div>
  
  <?php

                include ('dempfoot.php');

                include ('postmodal.php');

             ?>