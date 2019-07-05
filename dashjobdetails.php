<?php
        $pagetitle = 'Dashboard';

            include ('dcarehead.php');

            include ('userauth.php');

            // create object of job class to have details about the job for application
    $postobj = new Post();
    $posts = $postobj->getpostedJobs($_GET['postid']);

             ?>

             <div class="row">
                <div class="col-md-3">
                  <?php include ('sidedashcare.php');  ?>

                </div>

                <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-12">
                        <div style="margin: 15px;">
                          <button class="btn btn-primary"><a href="joblisting.php" style="color: white; text-decoration: none;"><i class="fas fa-angle-left"></i> Back </a></button>
                        </div>
                      </div>
                  </div>
        <div class="row">
            <div class="col-md-12">
            <!-- Details about the job for application -->  
            <div>

    <h2><?php if(isset($posts['post_title'])){ echo $posts['post_title'];} ?></h2>
    <h5>Descriptions</h5>
    <p><?php if(isset($posts['post_description'])){ echo $posts['post_description'];} ?></p>
    <h5>Requirements</h5>
    <p><?php if(isset($posts['post_requirement'])){ echo $posts['post_requirement'];} ?></p>
    <h5>Opening Date</h5>
    <p><?php if(isset($posts['post_open'])){ echo date('D, jS M Y', strtotime($posts['post_open']));} ?></p>
    <h5>Closing Date</h5>
    <p><?php if(isset($posts['post_close'])){ echo date('D, jS M Y', strtotime($posts['post_close']));} ?></p>
    
    <form method="post" action="showappliedcaregivers.php?postid=<?php echo $_GET['postid']; ?>&title=<?php echo $_GET['title']; ?>&id=<?php echo $_GET['id']; ?>">
        
        <input type="hidden" name="postid" value="<?php if(isset($_GET['postid'])){ echo $_GET['postid']; } ?>">
        <input type="hidden" name="title" value="<?php if(isset($_GET['title'])){ echo $_GET['title']; } ?>">
        <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">
    <input type="submit" class="btn btn-success" name="apply" value="Apply For Job" style="margin-bottom: 20px;"> 

    </form>

    </div>
            </div>    
        </div>      
               </div>


                
    </div>

<?php include ('dcarefoot.php'); ?>




    