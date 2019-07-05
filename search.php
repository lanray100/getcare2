<?php

	include ('userauth.php');

	//var_dump($_POST);

	if (empty($_POST['find'])) {
		 
		 $posts = array();
	}else{

		// create object of the post class
	$postobj = new Post;
	$posts = $postobj->findPostings($_POST['find']);

	
	}
	
	?>

	<?php
		
		foreach ($posts as $key => $value) {
			
		?>

		<p><a href="dashjobdetails.php?postid=<?php echo $value['post_id'] ?>" style="color:black; text-decoration: none"><?php echo $value['post_title']." in ".$value['post_city']; ?></a></p>

	<?php
		}
	

?>