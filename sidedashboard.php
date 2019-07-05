


<div style="background-color: rgb(0,64,128); height: 440px;">
  <div class="col-md-12">
      <div style="margin-left: 20px;">
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
  </div>
      <div class="col-md-12">
        <div style="margin-left: 10px;">
         <h4 style="color: white;">Welcome
            <?php
               echo $_SESSION['employer_fname'];
               ?>

          </h4>
            <hr>
          <p><a href="uploadphoto.php" class="ref"><i class="fas fa-upload"></i> Upload Photo</a></p>
          <p><a href="editemployer.php" class="ref"><i class="fas fa-user-edit"></i> Edit Profile</a></p>
            <p><a href="post.php" class="ref"><i class="fas fa-mail-bulk"></i> Post a Job</a></p>
            <p><a href="employerjobs.php" class="ref"><i class="fas fa-paper-plane"></i> Posted Jobs</a></p>
          <p><a href="appliedcaregivers.php" class="ref"><i class="fas fa-users"></i> Applied Caregivers</a></p>

        </div>
      </div>
    </div>