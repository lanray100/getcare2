

             <?php
                  $pagetitle = "Dashboard";
                  
                include ('dcarehead.php');

                include ('userauth.php');

                // instance to get the applied caregiver details
                $caregiverobj = new Authentication();
                $details = $caregiverobj->getcaregiverDetails($_SESSION['mycaregiverid']);

             ?>

             

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                    <div class="row">
      <div class="col-12">
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" style="text-align: center;">View Profile</a>
    </div>
      </div>
  </div>

  <div class="row">
  <div class="col-12">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="card card-body">
            <form>
                <div>
                     <form>
                         <h5>About You</h5><br>
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
                                  <h5>Availablity and Experience</h5>
                                  <p><b>Where Do you work Presently : </b> <?php echo $details['caregiverinfo_work']; ?></p>
                                  <p><b>Days Available in a week : </b> <?php echo $details['caregiverinfo_available']; ?> </p>

                                </div>

                                <div class="col-md-6">
                                  <h5>Previous Work Experience</h5>
                                  <p><b>Company/Family Name : </b> <?php echo $details['caregiverinfo_past']; ?> </p>
                                  <p><b>Work Description : </b> <?php echo $details['caregiverinfo_worktype']; ?> </p>
                                </div>
                              

                            </div>
                      </form>
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
