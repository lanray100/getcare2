

             <?php
             $pagetitle = "Dashboard";

             include ('userauth.php');

                include ('demphead.php');

             ?>

             <?php 
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //var_dump($_POST);
                      
                      $job = Authentication::sanitizeInput($_POST['jobtitle']);
                      $desc = Authentication::sanitizeInput($_POST['desc']);
                      $req = Authentication::sanitizeInput($_POST['req']);
                      $city = Authentication::sanitizeInput($_POST['city']);
                      $stateid = Authentication::sanitizeInput($_POST['stateid']);
                      $opendate = Authentication::sanitizeInput($_POST['open']);
                      $closedate = Authentication::sanitizeInput($_POST['close']);
                      $employerid = $_SESSION['myemployerid'];

                      if (empty($job) || empty($desc) || empty($req) || empty($city) || empty($stateid) ) {
                        $err = "<small class='form-text text-danger'>Fill in the required input field</small>";
                      }

                      if (empty($err)) {
                        
                        $postobj = new Post;
                        $postobj->postJobs($job,$desc,$req,$city,$stateid,$opendate,$closedate,$employerid);

                      }
                      
              }

           ?>

             <div class="row">
                <div class="col-md-3">
                    <?php include ('sidedashboard.php');  ?>

                </div>

                <div class="col-md-9">
                       <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                         <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                          <?php
                                 if (isset($job) || isset($desc) || isset($req) || isset($city) || isset($stateid)) {
                                            echo $err;
                                      }
                                ?>
                          <h4>Getting Started</h4>
                              <label>Job Title</label><br>
                                  <input type="text" name="jobtitle" value="<?php if(isset($_POST['jobtitle'])){ echo $_POST['jobtitle'];} ?>"> <br>

                                    <label>Job Description</label><br>
                                    <textarea cols="30" rows="5" class="form-control" name="desc"><?php if(isset($_POST['desc'])){ echo $_POST['desc'];} ?></textarea><br>

                                        <label>Job Requirement</label><br>
                                        <textarea cols="30" rows="4" class="form-control" name="req"><?php if(isset($_POST['req'])){ echo $_POST['req'];} ?></textarea><br>
                                        <div class="row">
                                            <div class="col-md-4">  
                                            <label>Open Date</label> <br>
                                            <input type="date" name="open" value="<?php if(isset($_POST['open'])){ echo $_POST['open'];} ?>">  
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">  
                                            <label>Close Date</label> <br>
                                            <input type="date" name="close" value="<?php if(isset($_POST['close'])){ echo $_POST['close'];} ?>">   
                                            </div>
                                        </div>
                                            <label>City</label> <br>
                                            <input type="text" name="city" value="<?php if(isset($_POST['city'])){ echo $_POST['city'];} ?>"> <br>

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
                                              <button type="submit" class="btn btn-primary" style="margin: 15px;">Post Job</button>
                              </form>
                             </div> 
                          </div>
                       </div>
                </div>

           </div>

  
  <?php

                include ('dempfoot.php');

                include ('postmodal.php');

             ?>