

             <?php
             $pagetitle = "Dashboard";

             include ('userauth.php');

                include ('demphead.php');

             ?>

             <?php 

              $err = "";
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //var_dump($_POST);
                      
                      $job = Authentication::sanitizeInput($_POST['jobtitle']);
                      $desc = Authentication::sanitizeInput($_POST['desc']);
                      $req = Authentication::sanitizeInput($_POST['req']);
                      $city = Authentication::sanitizeInput($_POST['city']);
                      $stateid = Authentication::sanitizeInput($_POST['stateid']);
                      $opendate = Authentication::sanitizeInput($_POST['open']);
                      $closedate = Authentication::sanitizeInput($_POST['close']);
                      $postid = $_REQUEST['postid'];  // from the query

                      if (empty($job) || empty($desc) || empty($req) || empty($city) || empty($stateid) ) {
                        $err = "<small class='form-text text-danger'>Fill in the required input field</small>";
                      }

                      if (empty($err)) {
                        
                        $postobj = new Post;
                        $msg = $postobj->updatePosting($job,$desc,$req,$city,$stateid,$opendate,$closedate,$postid);

                      }
                      
              }

           ?>

             <div class="row">
                <div class="col-md-3">
                    <?php include ('sidedashboard.php'); 

                        $jobobj = new Post;
                        $jobs = $jobobj->getemployerPostDetails($_GET['postid']);

                        //var_dump($jobs);
                     ?>

                </div>

                <div class="col-md-9">
                       <div>
                         <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?postid=".$_GET['postid']); ?>">
                          <?php
                                 if (isset($job) || isset($desc) || isset($req) || isset($city) || isset($stateid)) {
                                            echo $err;
                                      }

                                    if(isset($msg)){ echo $msg;}
                                ?>
                              <label>Job Title</label><br>
                                  <input type="text" name="jobtitle" value="<?php echo $jobs['post_title']; ?>"> <br>

                                    <label>Job Description</label><br>
                                    <textarea cols="30" rows="5" class="form-control" name="desc"><?php echo $jobs['post_description']; ?></textarea><br>

                                        <label>Job Requirement</label><br>
                                        <textarea cols="30" rows="4" class="form-control" name="req"><?php echo $jobs['post_requirement']; ?></textarea><br>
                                        <div class="row">
                                            <div class="col-md-4">  
                                            <label>Open Date</label> <br>
                                            <input type="date" name="open" value="<?php echo $jobs['post_open']; ?>">  
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">  
                                            <label>Close Date</label> <br>
                                            <input type="date" name="close" value="<?php echo $jobs['post_close']; ?>">   
                                            </div>
                                        </div>
                                            <label>City</label> <br>
                                            <input type="text" name="city" value="<?php echo $jobs['post_city']; ?>"> <br>

                                              <?php
                                                $stateobj = new Authentication;
                                                $state = $stateobj->getState();

                                                ?>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">State</label>
                                            <select class="form-control" name="stateid" id="exampleFormControlSelect1">
                                                <option value="">Select a state</option>
                                                <?php
                                                    foreach ($state as $key => $value) {
                                                        $stateid = $value['state_id'];
                                                        $statename = $value['state_name'];
                                                        if ($_POST['stateid']) {
                                                        echo "<option value=\"$stateid\" selected='selected'>$statename</option>";

                                                    }else{
                                                        echo "<option value=\"$stateid\">$statename</option>";
                                                    }

                                                    }

                                                    ?>
                                                
                                          </select>
                                              <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Update Job</button>
                        </form>



                       </div>
                </div>

                </div>
  
  <?php

                include ('dempfoot.php');


             ?>