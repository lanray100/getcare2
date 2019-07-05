 <?php
    

                include_once ('userauth.php');

                $appliedobj = new Post();
                $applied = $appliedobj->appliedcaregiverResume($_GET['appliedid']);

                //var_dump($applied);
             ?>



        <!--- display resume --->
        
          <iframe src="<?php echo $applied['applied_resume']; ?>" type="text/html" style="width: 1000px; height: 600px;" ></iframe>


