          <?php
             $pagetitle = "Dashboard";

                include ('demphead.php');

                include_once ('userauth.php');

                $appliedobj = new Post();
                $applied = $appliedobj->appliedCaregivers($_SESSION['myemployerid']);

                //var_dump($applied);
             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashboard.php');  ?>

                </div>

                <div class="col-md-9">
                       <div>
                         <div>
                          <table class="table table-bordered table-striped table-hover">
                            <tr>
                              <th>S/N</th>
                              <th>Date</th>
                              <th>Job title</th>
                              <th>Names</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Resume</th>
                              <th> Details </th>

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
                                <td><a href="resume.php?appliedid=<?php echo $value['applied_id'] ?>" target="_blank">View Resume</a></td>
                                <td><a href="detailsappliedcaregivers.php?caregiverid=<?php echo $value['caregiver_id'] ?>"><i class="fas fa-eye"></i> View more details </a></td>
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

                include ('dempfoot.php');


             ?>
  