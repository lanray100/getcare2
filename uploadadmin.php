

             <?php
             $pagetitle = "Dashboard";

                include ('admindashhead.php');

                include ('userauth.php');

             ?>

             <?php 


              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
                  // echo "<pre>";
                  // echo print_r($_FILES);
                  // echo "</pre>";

                  // create object of users class
                 $employerobj = new Authentication;
                  $output = $employerobj->uploadProfileImage();
                }

              ?>


             <div class="row">
                <div class="col-md-3">
                 <?php include ('adminsidedashboard.php');  ?>
                </div>

                <div class="col-md-9">
                       <div>
                         <h1>Upload Profile Photo</h1>
                        <?php
                            if (isset($output)) {
                                   echo $output;
                             }   
                          ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
                      <div class="form-group">
                                         <label></label>
                            <input type="file" class="form-control" id="user" value="" name="profilephoto">
                                    <small id="say1" class="form-text text-danger"> </small>
                                   
                                        </div>
                             <button type="submit" name="submit" class="btn btn-success">Upload</button>
        
      </form>



                       </div>
                </div>

                </div>
  
  <?php

                include ('admindashfoot.php');


             ?>