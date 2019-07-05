

             <?php
                  $pagetitle = "Dashboard";
                  
                include ('dcarehead.php');

                include ('userauth.php');

             ?>

             <?php
              //var_dump($_POST);

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['apply'] == 'Apply') {
                    
                    //var_dump($_POST);
                    $error = "";
                    $email = Authentication::sanitizeInput($_POST['email']);
                    $phone = Authentication::sanitizeInput($_POST['phone']);
                    $caregiverid = $_SESSION['mycaregiverid'];
                    $postid = $_REQUEST['postid'];
                    $posttitle = $_REQUEST['title'];
                    $employerid = $_REQUEST['id'];
                    $caregivernames = $_REQUEST['names'];
                    // $postid = $_SESSION['mypostid'];

                    if (empty($email) || empty($phone)) {
                        
                        $error = "<small class='form-text text-danger'>Fill in the required field</small>";
                    }

                    //var_dump($error);

                    if (empty($error)) {

                            $postobj = new Post;
                            $output = $postobj->sendApply($caregivernames,$email,$phone,$posttitle,$employerid,$postid,$caregiverid);

                            //var_dump($output);
                        }


                }

             ?>

             

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                    <div class="row">
      <div class="col-12">
    
      </div>
  </div>

  <div class="row">
  <div class="col-12">
    <?php

        // instance to get the applied caregiver details
                $caregiverobj = new Authentication();
                $details = $caregiverobj->getcaregiverDetails($_SESSION['mycaregiverid']);


                if (isset($output)) {
                                          echo $output;
                                        }

        ?>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="card card-body">

                                      <?php
                              if (isset($error)) {

                                  echo $error;
                              }
                          ?>
            
                      
                       <div class="row">
                          
                                <div class="col-md-2">
                                  <?php 

                                    if (empty($_SESSION['profilephoto'])) {
                                      ?>
                                      <img src="images/avatar.png" alt="profile photo" class="img-fluid" width="100" height="100" style="margin: 10px 10px;"><br> 
          
                                <?php
                                      }else{
                                      ?>
                                      <img src="<?php echo $_SESSION['profilephoto'] ?> " class="img-fluid" width="100" height="100" style="margin: 10px 10px; border-radius: 20px;" alt="profile photo">
                                  <?php
                                         }
                                      ?>
                                </div>

                                <div class="col-md-5">
                                  <p><b>Name : </b> <?php echo $details['caregiver_fname']." ".$details['caregiver_lname']; ?></p>
                                  <p><b>Skills : </b> <?php echo $details['caregiverinfo_worktype']; ?> </p>
                                  
                                </div>

                                <div class="col-md-5">
                                  <p><b>Location : </b> <?php echo $details['caregiverinfo_city']; ?> </p>
                                  <p><b>Gender : </b> <?php echo $details['caregiver_gender']; ?> </p>
                                  <p><b>Date of birth : </b> <?php echo date('jS F Y', strtotime($details['caregiverinfo_dob'])); ?> </p>
                                </div>
                              

                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                  <h4>Availablity and Experience</h4>
                                  <p><b>Where Do you work Presently : </b> <?php echo $details['caregiverinfo_work']; ?></p>
                                  <p><b>Days Available in a week : </b> <?php echo $details['caregiverinfo_available']; ?> </p>

                                </div>

                                <div class="col-md-6">
                                  <h4>Previous Work Experience</h4>
                                  <p><b>Company/Family Name : </b> <?php echo $details['caregiverinfo_past']; ?> </p>
                                  <p><b>Work Description : </b> <?php echo $details['caregiverinfo_worktype']; ?> </p>
                                </div>
                              

                            </div>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?postid=<?php echo $_GET['postid']; ?>" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" value="">
                                  </div>
                                </div>
                                    
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="">
                                  </div>
                                </div>
                              
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                  <label>Resume</label>
                                  <div class="form-group">
                                    <input type="file" name="resume" class="form-control" value="">
                                    <small>Upload only pdf files</small>
                                  </div>
                                </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                    <input type="submit" name="apply" value="Apply" class="btn btn-success" style="margin-top: 30px;">
                                    
                                  </div>
                                </div>
                              <div class="col-md-6">
                                <input type="hidden" name="postid" value="<?php echo $_GET['postid']; ?>">
                                <input type="hidden" name="title" value="<?php echo $_GET['title']; ?>">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <input type="hidden" name="names" value="<?php echo $details['caregiver_fname']." ".$details['caregiver_lname']; ?>">
                              </div>
                            </div>
               
            </form>
        </div>
      </div>

    </div>
  </div>
</div>
</div>


                </div>  

        </div>

             

<?php
    
    include ('dcarefoot.php');
?>
