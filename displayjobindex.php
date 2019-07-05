<?php

include ('userauth.php');

//var_dump($_POST);

    // create object of job class
    $postobj = new Post();

    if(isset($_POST['mystateid'])){
        $posts = $postobj->getFeaturedPost($_POST['mystateid']);
    }else{
        $posts = $postobj->getCaregiver();
    }
        


if (isset($posts)) {
    foreach ($posts as $key => $value) {
        
    
?>
    <div style="margin-bottom: 15px;">
        
    <a href="displayjobdetails.php?postid=<?php echo $value['post_id'] ?>" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h4 class="mb-1"><?php echo $value['post_title']; ?></h4>
                <small>Posted on <?php echo date('D,jS M Y', strtotime($value['post_date'])) ; ?></small>
        </div>
            <p class="mb-1"><?php echo substr($value['post_description'], 0, 300) ; ?> ... <u style="color: blue;">View more details</u>
            </p>
                    <small class="badge badge-primary"><?php echo $value['post_city']; ?></small>
    </a>
            


    </div>


<?php
    }

    }
?>


    