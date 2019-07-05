<?php
include_once ('header.php');

include ('userauth.php');

//var_dump($_POST);

    // create object of job class
    $postobj = new Post();
    $posts = $postobj->getpostedJobs($_GET['postid']);
?>
    <div class="container">
        <div style="margin-top: 100px;">
        <div class="row">
                      <div class="col-md-12">
                        <div style="margin: 15px;">
                          <button class="btn btn-primary"><a href="listingofjobs.php" style="text-decoration: none;" ><i class="fas fa-angle-left"></i> Back </a></button>
                        </div>
                      </div>
                  </div>
        <div class="row">
        <div class="col-md-12">
    <div >

    <h2><?php if(isset($posts['post_title'])){ echo $posts['post_title'];} ?></h2>
    <h5>Descriptions</h5>
    <p><?php if(isset($posts['post_description'])){ echo $posts['post_description'];} ?></p>
    <h5>Requirements</h5>
    <p><?php if(isset($posts['post_requirement'])){ echo $posts['post_requirement'];} ?></p>
    <h5>Opening Date</h5>
    <p><?php if(isset($posts['post_open'])){ echo date('D jS M Y', strtotime($posts['post_open']));} ?></p>
    <h5>Closing Date</h5>
    <p><?php if(isset($posts['post_close'])){ echo date('D jS M Y', strtotime($posts['post_close']));} ?></p>
            


        </div>
    </div>
 </div>
</div>
  </div>

<?php include_once ('footer.php'); ?>


    