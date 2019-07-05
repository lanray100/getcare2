

             <?php
             $pagetitle = "Dashboard";

                include ('demphead.php');



                include_once ('userauth.php');

                    // instance Post 
                  $jobobj = new Post;
                  $jobs = $jobobj->getemployerPost($_SESSION['myemployerid']);

                  //var_dump($jobs);

             ?>


             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashboard.php'); 

                   ?>

                </div>

                <div class="col-md-9">
                       <div>
                        <?php
                              if (isset($_GET['msg'])) {
                                echo $_GET['msg'];
                              }
                              
                            ?>
                        <table class="table table-bordered table-striped">

                          <thead>
                              <th>S/N</th>
                              <th>Date</th>
                              <th>Job Title</th>
                              <th>City</th>
                              <th>Action</th>

                          </thead>

                             <div>

                          <?php
                            $serial = 1;
                        foreach ($jobs as $key => $value) {
                          

                        ?>

                          <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo date('D,jS M Y', strtotime($value['post_date'])); ?></td>
                            <td>
                              <?php echo $value['post_title']; ?>
                            </td>
                            <td>
                              <?php echo $value['post_city']; ?>
                            </td>
                            <td>
                              <a href="updatepost.php?postid=<?php echo $value['post_id'] ?>"><i class="fas fa-edit"></i> Edit</a><br>
                              <a href="employerdelete.php?postid=<?php echo $value['post_id'] ?>&title=<?php echo $value['post_title']; ?>"><i class="fa fa-eraser"></i> Unpublish</a>
                            </td>

                          </tr>


                        <?php
                          $serial++;
                        }

                        ?>
                          

                          </div>
                    </table>


                       </div>
                </div>

                </div>
  
  <?php

                include ('dempfoot.php');

                include ('postmodal.php');

             ?>