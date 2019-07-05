          
      <div style="background-color: rgb(0,64,128); height: 400px;">
          <div style="margin-left: 15px;">
              <div class="col-md-12">
        <!--- display profile photo--->
        <?php 

          //var_dump($_SESSION); 
          if (empty($_SESSION['profilephoto'])) {
          ?>
          <img src="images/avatar.png" alt="profile photo" class="img-fluid" width="150" height="150" style="margin: 10px 10px;"><br> 
          
        <?php
            }else{
          ?>
          <img src="<?php echo $_SESSION['profilephoto'] ?> " class="img-fluid" style="margin: 15px 40px; border-radius: 5px; width: 150px; height: 150px;" alt="profile photo">
        <?php
          }
          ?>

          
      
            </div>

                    <h4 style="color: white;">Welcome <?php echo $_SESSION['caregiver_fname']; ?> </h4>
                    
                    <p><a href="uploadphotocare.php" class="ref"><i class="fas fa-upload"></i> Upload Photo</a></p>
                    <p><a href="editcaregiverprofile.php?caregiverid=<?php echo $_SESSION['mycaregiverid']; ?>" class="ref"><i class="fas fa-user-edit"></i> Edit Profile</a></p>
                    <p><a href="joblisting.php" class="ref"><i class="fas fa-search"></i> Search For Jobs</a></p>
                    <p><a href="appliedjobs.php" class="ref"><i class="fas fa-newspaper"></i> Applied Jobs</a></p>
          </div>     

      </div>


      