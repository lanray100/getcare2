          <?php
             $pagetitle = "Dashboard";

                include ('dcarehead.php');

                include_once ('userauth.php');

                $appliedobj = new Post();
                $applied = $appliedobj->appliedJobs($_SESSION['mycaregiverid']);

                // var_dump($applied);
             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                       <div>
                         <div>
                          <table class="table table-bordered table-striped table-hover">
                            <tr>
                              <th>S/N</th>
                              <th>Date</th>
                              <th>Job title</th>
                              <th>Job City</th>
                              
                              
                            </tr>

                            <?php


                                $serial =1;

                                foreach ($applied as $key => $value) {
                                  
                                
                            ?>

                              <tr>
                                <td><?php echo $serial; ?></td>
                                <td><?php echo date('D, jS M Y', strtotime($value['applied_date'])); ?></td>
                                <td><?php echo $value['post_title']; ?></td>
                                <td><?php echo $value['post_city']; ?></td>
                              </tr>


                            <?php
                                $serial++;
                              }

                              

                              ?>

                          </table>

                      </div>




                       </div>
                </div>

                </div>
  
  <?php

                include ('dcarefoot.php');

             ?>
  