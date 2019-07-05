<div class="row">
	<div class="col-md-12">
		
		<div style="background-color: rgb(0,64,128); height: 400px;">
			<div style="margin-left: 15px;">
                    <p><!--- display profile photo--->
        				<?php 

          					//var_dump($_SESSION); 
          				if (empty($_SESSION['profilephoto'])) {
          				?>
          				<img src="images/avatar.png" alt="profile photo" class="img-fluid" width="150" height="150" style="margin: 10px 10px;"><br> 
          
        				<?php
          				  }else{
         				 ?>
         			 <img src="<?php echo $_SESSION['profilephoto'] ?> " class="img-fluid" width="150" height="150" style="margin: 10px 10px; border-radius: 20px;" alt="profile photo">
        			<?php
         				 }
         					 ?>
                    </p>
                    <h4 style="color: white;">Welcome <?php echo $_SESSION['employer_fname']; ?></h4>
                    <hr>
                    <p><a href="uploadadmin.php" class="ref"><i class="fas fa-upload"></i> Upload Photo</a></p>
                    <p><a href="tableforemployers.php" class="ref"><i class="fas fa-users"></i> Registered Employers</a></p>
                    <p><a href="tablesforcaregivers.php" class="ref"><i class="fas fa-users"></i> Registered Caregivers</a></p>
                    <p><a href="tableforjobs.php" class="ref"><i class="fas fa-newspaper"></i> Posted Jobs</p>
                    <p><a href="tableforappliedcaregiver.php" class="ref"><i class="fas fa-users"></i> Applied Caregivers</a></p>


                  </div>
            </div>
	</div>
	
</div>